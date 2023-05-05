<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Reservation;
use App\Models\House;
use Carbon\Carbon;

class ReservationController extends Controller
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
    public function create(Request $request)
    {
            $users = User::all();
            return view('house.reserve-create', ['users' =>  $users, 'house_id' => $request -> house_id]);
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
            'user_id'=>Auth::user()->id,
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
