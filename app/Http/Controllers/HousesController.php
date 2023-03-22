<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class HousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::paginate(12);
        foreach($houses as $key=>$house) {
            $rating = Rating::where('house_id', $house->id)->avg('rating');
            $houses[$key]->rating = $rating;
        }

        return view('house.index', ['houses' => $houses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create add form
        $users = User::all();
        return view('house.house-create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $house = House::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'user_id' => Auth::user()->id
            // 'image_path' => $request->image_path
        ]);
        $houses = House::paginate(12);
        foreach($houses as $key=>$house) {
            $rating = Rating::where('house_id', $house->id)->avg('rating');
            $houses[$key]->rating = $rating;
        }

        return view('house.index', ['houses' => $houses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avgRating = Rating::where('avgRating', $id);
        return view('house.show',[
            'house' => House::findOrFail($id),
            'ratings' => Rating::where('house_id', $id)->get(),
            'avgRating' => $avgRating
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('house.house-edit', [
            'house' => House::where('id', $id)->first()
        ]);
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
        $house = House::find($id);
        $avgRating = Rating::where('avgRating', $id);

        $house->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'capacity' => $request->capacity,
            'price' => $request->price
        ]);

        return view('house.show', [
            'house' => $house, 
            'avgRating' => $avgRating
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        House::destroy($id);

        return redirect(route('house.index'))->with('message', 'House has been deleted.');
    }
}
