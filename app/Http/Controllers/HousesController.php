<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        if (Auth::user()) {
            $users = User::all();
            return view('house.house-create', compact('users'));
        } else {
            return view('fallback.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create validation and validate $request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100', 'unique:' . House::class],
            'description' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'numeric', 'between:1,15'],
            'price' => ['required', 'numeric', 'gt:0'],
            'image_path' => ['required', 'mimes:jpeg,png,jpg']
        ]);
        // Return create view if validation fails
        if ($validator->fails()) {
            return Redirect::route('house.create')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'status' => 'Attention!',
                    'message' => 'Invalid values.'
                ]);
        }

        // Create house record
        $house = House::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'user_id' => Auth::user()->id,
            'image_path' => $this->storeImage($request),
        ]);

        // Redirect to house view with details of new record
        return Redirect::route('house.show', [
                                'house' => $house,
                            ])
                            ->with([
                                'status' => 'Success!',
                                'message' => 'You have listed a new house.'
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
        $avgRating = Rating::where('house_id', $id)->avg('rating');
        return view('house.show', [
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
        if (Auth::user()) {
            return view('house.house-edit', [
                'house' => House::find($id)
            ]);
        } else {
            return view('fallback.index');
        }
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
        // Create validation and validate $request
        $validator = Validator::make($request->all(), [
            'description' => ['sometimes', 'required', 'string', 'max:255'],
            'address' => ['sometimes', 'required', 'string', 'max:255'],
            'capacity' => ['sometimes', 'required', 'numeric', 'between:1,15'],
            'price' => ['sometimes', 'required', 'numeric', 'gt:0'],
            'image_path' => ['sometimes', 'required', 'mimes:jpeg,png,jpg']
        ]);

        // Return edit view if validation fails
        if ($validator->fails()) {
            return Redirect::route('house.edit', $id)
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'status' => 'Attention!',
                    'message' => 'Invalid values.'
                ]);
        }

        // Get house record
        $house = House::find($id);
        $avgRating = Rating::where('house_id', $id)->avg('rating');

        // Re-assign form values to house record
        $house->description = $request->description;
        $house->address = $request->address;
        $house->capacity = $request->capacity;
        $house->price = $request->price;
        $house->image_path = $request->image_path ? $this->storeImage($request) : $house->image_path;

        // Check if there are changes between record and form value
        if($house->isDirty()) {
            // Save values if there are changes
            $house->save();

            // Return house view with updated details
            return Redirect::route('house.show', [
                                'house' => $house,
                                'avgRating' => $avgRating
                            ])
                            ->with([
                                'status' => 'Success!',
                                'message' => 'Your house details has been changed.'
                            ]);
        } else {
            // If no changes, return to dashboard
            return Redirect::route('account.dashboard', Auth::user()->id)
                            ->with([
                                'status' => 'Notice:',
                                'message' => 'You have not made any changes to your listed house.'
                            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($request, $id);
        $house = House::find($id);
        if ($request->deleteProceed == $house->name) {
            House::destroy($id);

            return Redirect::route('account.dashboard', Auth::user()->id)
                            ->with([
                                'status' => 'Success!',
                                'message' => 'House has been deleted.'
                            ]);
        } else {
            return Redirect::route('account.dashboard', Auth::user()->id)
                ->with([
                    'status' => 'Attention!',
                    'message' => 'Deletion of record failed. Delete confirmation validation incorrect!'
                ]);
        }
        
    }

    // Use function below to store images
    private function storeImage($request)
    {
        // Generate new image name using unique number + user info
        $newImageName = uniqid() . '-' . Str::replace('/\s+/', '_', $request->name) . '.' . $request->image_path->extension();
        // Store image in public/img folder
        $request->image_path->move(public_path('img'), $newImageName);

        return $newImageName;
    }
}
