<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RatingController extends Controller
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
    public function create($reservationId)
    {
        if (Auth::user()) {
            $house = DB::table('houses')
                ->join('reservations', 'houses.id', '=', 'reservations.house_id')
                ->where('reservations.id', '=', $reservationId)
                ->select(
                    'reservations.created_at',
                    'houses.address',
                    'houses.name',
                    'houses.image_path',
                    'houses.id AS house_id',
                    'reservations.id AS reservation_id'
                )
                ->first();
            return view('ratings.create', ['house' => $house]);
        } else {
            return view('fallback.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request, $houseId, $reservationId)
    {
        $request->validate([
            'rating' => ['required', 'in:1,2,3,4,5'],
            'title' => ['required', 'max:50'],
            'comment' => ['required', 'max:200'],
        ]);

        Rating::create([
            'excerpt' => $request->title,
            'remark' => $request->comment,
            'rating' => $request->rating,
            'house_id' => $houseId,
            'user_id' => Auth::user()->id,
            'reservation_id' => $reservationId,
        ]);

        return Redirect::route('account.dashboard', Auth::user()->id)
            ->with([
                'status' => 'Success!',
                'message' => 'You have successfully rated your reservation!'
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
