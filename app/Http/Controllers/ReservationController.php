<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Reservation;
use App\Models\House;
use Carbon\Carbon;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('reservations.index', [
            'reservations' => Reservation::where('user_id', Auth::user()->id)
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $house = House::find($request->house_id);
        return view('reservations.create', ['house' => $house]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'check_in' => ['required'],
            'check_out' => ['required'],
            'guest_count' => ['required', 'numeric', 'between:1,15']
        ]);

        // Return create view if validation fails
        if ($validator->fails()) {
            return Redirect::route('reserve.create')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'status' => 'Attention!',
                    'message' => 'Invalid values.'
                ]);
        }

        $reservation = Reservation::create([
            'check_in' => Carbon::createFromFormat('d/m/Y', $request->check_in)->format('Y-m-d'),
            'check_out' => Carbon::createFromFormat('d/m/Y', $request->check_out)->format('Y-m-d'),
            'guest_count' => $request->guest_count,
            'house_id' => $request->house_id,
            'user_id' => Auth::user()->id,
            'amount' => $request->amount
        ]);

        // Redirect to house view with details of new record
        return Redirect::route('account.dashboard', [
            'id' => Auth::user()->id,
        ])
            ->with([
                'status' => 'Success!',
                'message' => 'You have reserved a house.'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkin($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = "ONGOING";
        $reservation->save();
        return Redirect::route('reserve.show',  $reservation->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = "ENDED";
        $reservation->check_out = Carbon::now()->setTimezon('Asia/Manila')->toDateString();
        $reservation->save();
        return Redirect::route('reserve.show',  $reservation->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = "CANCELLED";
        $reservation->save();
        return Redirect::route('reserve.show', $reservation->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.show', ['house' => House::findOrFail($reservation->house_id), 'reservation' => $reservation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approvalRequests()
    {
        if (!Auth::user()) return view('fallback.index');
        $user = Auth::user();
        if ($user->role === "RENTER") {
            $reservations = DB::table('reservations')
                ->join('houses', 'reservations.house_id', '=', 'houses.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where([
                    ['houses.user_id', '=', $user->id],
                    ['approval_status', '=', 'PENDING']
                ])
                ->select('houses.name', 'users.first_name', 'users.last_name', 'reservations.check_in', 'reservations.check_out', 'reservations.amount', 'reservations.guest_count', 'reservations.id')
                ->paginate(10);
            return view('requests.approval-requests', ['reservations' => $reservations]);
        }
    }

    public function approveRequest($id)
    {
        $reservations = Reservation::find($id);

        $reservations->approval_status = "APPROVED";
        $reservations->save();
        return Redirect::route('reserve.approvalRequests')
            ->with([
                'status' => 'Success!',
                'message' => 'You have just approved a new reservation.'
            ]);
    }

    public function rejectRequest($id)
    {
        $reservations = Reservation::find($id);

        $reservations->approval_status = "REJECTED";
        $reservations->save();
        return Redirect::route('reserve.approvalRequests')
            ->with([
                'status' => 'Attention!',
                'message' => 'You have just rejected a reservation request.'
            ]);
    }

    public function requestCount()
    {
        $reservations = null;
        if (!Auth::user()) return view('fallback.index');
        $user = Auth::user();
        if ($user->role === "RENTER") {
            $reservations = DB::table('reservations')
                ->join('houses', 'reservations.house_id', '=', 'houses.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where([
                    ['houses.user_id', '=', $user->id],
                    ['approval_status', '=', 'PENDING']
                ])
                ->count();
        }
        return Response($reservations);
    }
}
