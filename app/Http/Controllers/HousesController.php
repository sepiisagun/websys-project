<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Str;

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
        foreach ($houses as $key => $house) {
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


        // 'image_path' => $this->storeImage($request),
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('house.show', [
            'item' => House::findOrFail($id)
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
            'house' => House::find($id)
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

    // Use function below to store images
    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . Str::replace('/\s+/', '_', $request->name) . '.' . $request->file_input->extension();
        $request->file_input->move(public_path('img'), $newImageName);

        return $newImageName;
    }
}
