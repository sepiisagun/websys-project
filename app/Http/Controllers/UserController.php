<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user->role === "RENTER") {
            $houses = House::where('user_id', $id)->get();
            return view('account.renter', ['houses' => $houses]);
        } else {
            $upcomingReservations = DB::table('reservations')
                ->join('houses', 'reservations.house_id', '=', 'houses.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where('users.id', '=', $user->id)
                ->where('check_in', '>', Carbon::now()->toDateString())
                ->select('reservations.*', 'houses.*')
                ->get();
            $pastReservations = DB::table('reservations')
                ->join('houses', 'reservations.house_id', '=', 'houses.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->leftJoin('ratings', 'reservations.id', '=', 'ratings.reservation_id')
                ->where('users.id', '=', $user->id)
                ->where('check_out', '<', Carbon::now()->toDateString())
                ->select('reservations.*', 'houses.*', 'ratings.id AS rating', 'reservations.id AS reservation_id')
                ->get();
            return view('account.rentee', [
                'upcomingReservations' => $upcomingReservations,
                'pastReservations' => $pastReservations,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('account.edit');
    }

    public function editCredentials($id)
    {

        return view('account.editCredentials', [
            'user' => DB::table('users')
                ->where('id', $id)
                ->select('email')
                ->first(),
        ]);
    }

    public function editUserInfo($id)
    {
        return view('account.editUserInfo', ['user' => User::find($id)]);
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
        //
    }

    /**
     * Updates the user login credentials
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateCredentials(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
            'new_password_confirmation' => ['required', 'same:new_password'],
        ]);

        User::where('id', Auth::user()->id)
            ->update([
                'password' => Hash::make($request->new_password),
            ]);

        return Redirect::route('account.editCredentials', $user->id)->with('status', 'Password Updated!');
    }

    /**
     * Updates the user information
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserInfo(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        $user->save();

        return Redirect::route('account.editInfo', $user->id)->with('status', 'User Info Updated!');
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
}
