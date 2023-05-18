<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use App\View\Components\RenteeTable;
use PDF;


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
     * @param  \Illuminate\Http\Request  $request
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $user = Auth::user();

        $houses = DB::table('houses')
            ->where('user_id', $user->id)
            ->where('name', 'like', "%$search%")
            ->paginate(10);

        return view('account.renter_table', ["houses" => $houses])->render();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user() || $id != Auth::user()->id) return view('fallback.index');
        $user = User::find($id);
        if ($user->role === "RENTER") {
            $houses = DB::table('houses')
                ->where('user_id', $id)
                ->paginate(10);
            $reservationRequest = DB::table('reservations')
                ->join('houses', 'reservations.house_id', '=', 'houses.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where([
                    ['houses.user_id', '=', $user->id],
                    ['approval_status', '=', 'PENDING']
                ])
                ->count();

            $recentRated = Rating::join('houses', 'ratings.house_id', '=', 'houses.id')
                                ->where([
                                    ['houses.user_id', $id],
                                    ['ratings.created_at', '>' , Carbon::now()->subDays(2)]
                                ])
                                ->select('ratings.house_id')
                                ->get();

            $message = ['status' => [], 'message' => [], 'link' => [], 'linkName' => [], 'id' => []];
            if (count($recentRated) > 0){
                array_push($message['status'], 'Notice:');
                array_push($message['message'], "You have ". count($recentRated) ." new ratings for your house.");
                if (count($recentRated) == 1) {
                    array_push($message['link'], 'house.show');
                    array_push($message['id'], $recentRated[0]->house_id);
                } else {
                    array_push($message['link'], 'reserve.index');
                }
                array_push($message['linkName'], 'Check it here');
            }
            if ($reservationRequest > 0){
                array_push($message['status'], 'Notice:');
                array_push($message['message'], "You have $reservationRequest pending reservation requests.");
                array_push($message['link'], 'reserve.approvalRequests');
                array_push($message['linkName'], 'Check it here');
            }
            foreach($message as $key => $item){
                session()->flash($key, $item);
            }
 
            return view('account.renter', [
                'houses' => $houses
                ]);
        } else {

                $reservationApproved = DB::table('reservations')
                                        ->join('houses', 'reservations.house_id', '=', 'houses.id')
                                        ->join('users', 'reservations.user_id', '=', 'users.id')
                                        ->where([
                                            ['reservations.user_id', '=', $user->id],
                                            ['approval_status', '=', 'APPROVED'],
                                            ['reservations.status', '=', 'PENDING'],
                                        ])
                                        ->select('reservations.id')
                                        ->whereDate('reservations.updated_at', '>' , Carbon::now()->subDays(2))
                                        ->get();
                $reservationRejected = DB::table('reservations')
                                        ->join('houses', 'reservations.house_id', '=', 'houses.id')
                                        ->join('users', 'reservations.user_id', '=', 'users.id')
                                        ->where([
                                            ['reservations.user_id', '=', $user->id],
                                            ['approval_status', '=', 'REJECTED'],
                                        ])
                                        ->select('reservations.id')
                                        ->whereDate('reservations.updated_at', '>' , Carbon::now()->subDays(2))
                                        ->get();
                $recentEnded = DB::table('reservations')
                                        ->join('houses', 'reservations.house_id', '=', 'houses.id')
                                        ->join('users', 'reservations.user_id', '=', 'users.id')
                                        ->where([
                                            ['reservations.user_id', '=', $user->id],
                                            ['approval_status', '=', 'APPROVED'],
                                            ['reservations.status', '=', 'ENDED'],
                                        ])
                                        ->whereDate('reservations.updated_at', '>' , Carbon::now()->subDays(2))
                                        ->select('reservations.id')
                                        ->get();

                $message = ['status' => [], 'message' => [], 'link' => [], 'linkName' => [], 'id' => []];
                if (count($reservationApproved) > 0){
                    array_push($message['status'], 'Notice:');
                    array_push($message['message'], "You have ". count($reservationApproved) ." approved reservation requests.");
                    if (count($reservationApproved) == 1) {
                        array_push($message['link'], 'reserve.show');
                        array_push($message['id'], $reservationApproved[0]->id);
                    } else {
                        array_push($message['link'], 'reserve.index');
                    }
                    array_push($message['linkName'], 'Check it here');
                }
                if (count($reservationRejected) > 0){
                    array_push($message['status'], 'Attention!');
                    array_push($message['message'], "You have ". count($reservationRejected) ." rejected reservation requests.");
                    if (count($reservationRejected) == 1) {
                        array_push($message['link'], 'reserve.show');
                        array_push($message['id'], $reservationRejected[0]->id);
                    } else {
                        array_push($message['link'], 'reserve.index');
                    }
                    array_push($message['linkName'], 'Check it here');
                }
                if (count($recentEnded) > 0) {
                    $noRatings = [];
                    foreach ($recentEnded as $item) {
                        if (Rating::find($item->id) == null) {
                            array_push($noRatings, $item->id);
                        }
                    }
                    if (count($noRatings) > 0) {
                        array_push($message['status'], 'Notice:');
                        array_push($message['message'], "You have ". count($noRatings) ." past reservation without ratings.");
                        if (count($noRatings) == 1) {
                            array_push($message['link'], 'house.rate');
                            array_push($message['id'], $noRatings);
                        } else {
                            array_push($message['link'], 'reserve.index');
                        }
                        array_push($message['linkName'], 'Rate it here!');
                    };

                }
                foreach($message as $key => $item){
                    session()->flash($key, $item);
                }


                $pendingReservations = DB::table('reservations')
                                        ->join('houses', 'reservations.house_id', '=', 'houses.id')
                                        ->join('users', 'reservations.user_id', '=', 'users.id')
                                        ->where([
                                            ['users.id', '=', $user->id],
                                            ['reservations.approval_status', '=', 'PENDING']
                                        ])
                                        ->select('reservations.*', 'houses.*')
                                        ->take(5)
                                        ->get();
                $upcomingReservations = DB::table('reservations')
                                        ->join('houses', 'reservations.house_id', '=', 'houses.id')
                                        ->join('users', 'reservations.user_id', '=', 'users.id')
                                        ->where([
                                            ['users.id', '=', $user->id],
                                            ['check_in', '>', Carbon::now()->toDateString()],
                                            ['reservations.approval_status', '=', 'APPROVED'],
                                            ['reservations.status', '=', 'PENDING'],
                                        ])
                                        ->select('reservations.*', 'houses.*')
                                        ->take(5)
                                        ->get();
                $pastReservations = DB::table('reservations')
                                        ->join('houses', 'reservations.house_id', '=', 'houses.id')
                                        ->join('users', 'reservations.user_id', '=', 'users.id')
                                        ->leftJoin('ratings', 'reservations.id', '=', 'ratings.reservation_id')
                                        ->where([
                                            ['users.id', '=', $user->id],
                                            ['check_out', '<', Carbon::now()->toDateString()],
                                            ['reservations.approval_status', '=', 'APPROVED'],
                                            ['reservations.status', '=', 'ENDED']
                                        ])
                                        ->select('reservations.*', 'houses.*', 'ratings.id AS rating', 'reservations.id AS reservation_id')
                                        ->orderBy('reservations.check_out', 'desc')
                                        ->take(5)
                                        ->get();
                return view('account.rentee', [
                    'pendingReservations' => $pendingReservations,
                    'upcomingReservations' => $upcomingReservations,
                    'pastReservations' => $pastReservations,
                ]);
            // }
        }
    }

    public function showTransaction()
    {
        if (!Auth::user()) return view('fallback.index');
        $user = Auth::user();
        if ($user->role === "RENTER") {
            $reservations = DB::table('reservations')
                ->join('houses', 'reservations.house_id', '=', 'houses.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where('houses.user_id', '=', $user->id)
                ->select('reservations.id', 'reservations.amount', 'reservations.status', 'reservations.check_in', 'houses.name', 'users.first_name', 'users.last_name')
                ->paginate(10);
            return view('account.showTransactions', ['reservations' => $reservations]);
        } else {
        }
    }

    public function searchTransaction(Request $request)
    {
        $search = $request->input('search');
        $user = Auth::user();

        $reservations = DB::table('reservations')
                ->join('houses', 'reservations.house_id', '=', 'houses.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where('houses.user_id', '=', $user->id)
                ->where('name', 'like', "%$search%")
                ->paginate(10);

        return view('account.renter_table', ["reservations" => $reservations])->render();
    }

    // public function generateTransaction(int $id)
    public function generateTransaction()
    {
        $houses = DB::table('reservations')
        ->join('houses', 'reservations.house_id', '=', 'houses.id')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->where('houses.user_id', '=', Auth::user()->id)
        ->select('reservations.id', 'reservations.amount', 'reservations.status', 'reservations.check_in', 'houses.name', 'users.first_name', 'users.last_name')
        ->get();

        $data = [
            'houses' => $houses
        ];

        $pdf = PDF::loadView('pdf.transaction-pdf', $data);
        return $pdf->download('transaction.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (Auth::user()) {
            return view('account.edit');
        } else {
            return view('fallback.index');
        }
    }

    public function editCredentials($id)
    {
        if (Auth::user()) {
            return view('account.editCredentials', [
                'user' => DB::table('users')
                    ->where('id', $id)
                    ->select('email')
                    ->first(),
            ]);
        } else {
            return view('fallback.index');
        }
    }

    public function editUserInfo($id)
    {
        if (Auth::user()) {
            return view('account.editUserInfo', ['user' => User::find($id)]);
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

        return Redirect::route('account.editCredentials', $user->id)
            ->with([
                'status' => 'Success!',
                'message' => 'Your password has been updated!'
            ]);
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
        // Create validation and validate $request
        $validator = Validator::make($request->all(), [
            'first_name' => ['sometimes', 'required', 'string', 'max:255'],
            'last_name' => ['sometimes', 'required', 'string', 'max:255'],
            'phone_number' => ['sometimes', 'required', 'numeric', 'digits:11'],
            'address' => ['sometimes', 'required', 'string', 'max:255'],
            'image_path' => ['sometimes', 'required', 'mimes:jpeg,png,jpg']
        ]);

        // Return edit view if validation fails
        if ($validator->fails()) {
            return Redirect::route('account.editInfo')
                ->withErrors($validator)
                ->withInput()
                ->with([
                    'status' => 'Attention!',
                    'message' => 'Invalid Values!'
                ]);
        }

        // Get user record
        $user = User::find(Auth::user()->id);

        // Re-assign form values to user record
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->image_path = $request->image_path ? $this->storeImage($request) : $user->image_path;

        // Check if there are changes between record and form value
        if ($user->isDirty()) {
            // Save values if there are changes
            $user->save();

            // Return to dashboard with updated values
            return Redirect::route('account.dashboard', $user->id)
                ->with([
                    'status' => 'Success!',
                    'message' => 'You have edited your personal info.'
                ]);
            // If no changes, return
        } else {
            return Redirect::route('account.settings', $user->id)
                ->with([
                    'status' => 'Notice',
                    'message' => 'You have not made any changes to your info.'
                ]);
        }
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
        // Generate new image name using unique number + user info
        $newImageName = uniqid() . '-' . $request->last_name . '_' . Str::replace(' ', '_', $request->first_name) . '.' . $request->image_path->extension();
        // Store image in public/img folder
        $request->image_path->move(public_path('img'), $newImageName);

        return $newImageName;
    }
}
