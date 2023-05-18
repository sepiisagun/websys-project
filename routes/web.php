<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Models\House;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $houses = House::inRandomOrder()->take(4)->get();
    foreach ($houses as $key => $house) {
        $rating = Rating::where('house_id', $house->id)->avg('rating');
        $houses[$key]->rating = $rating;
    }
    return view('homepage.index', ['houses' => $houses]);
})->name('homepage');

Route::middleware(['auth','nocache'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// House Related Routes
Route::get('/house/listings', [HousesController::class, 'index'])->name('house.index');
Route::get('/house/search', [HousesController::class, 'search'])->name('house.search');
Route::get('/house/filter', [HousesController::class, 'filter'])->name('house.filter');
Route::resource('/house', HousesController::class);

//Reservation Related Routes
Route::post('/reserve/create', [ReservationController::class, 'create'])->name('reserve.create');
Route::patch('/reserve/{id}/checkin', [ReservationController::class, 'checkin'])->name('reserve.checkin');
Route::patch('/reserve/{id}/checkout', [ReservationController::class, 'checkout'])->name('reserve.checkout');
Route::patch('/reserve/{id}/cancel', [ReservationController::class, 'cancel'])->name('reserve.cancel');
Route::patch('/reserve/{id}/approverequest', [ReservationController::class, 'approveRequest'])->name('reserve.approveRequest');
Route::patch('/reserve/{id}/rejectrequest', [ReservationController::class, 'rejectRequest'])->name('reserve.rejectRequest');
Route::get('/reserve/count', [ReservationController::class, 'requestCount'])->name('reserve.count');
Route::resource('/reserve', ReservationController::class);


// Rating Related Routes
Route::get('/house/rate/{reservationId}', [RatingController::class, 'create'])->name('house.rate');
Route::post('/rate/{houseId}/{reservationId}', [RatingController::class, 'store'])->name('rate.submit');
Route::resource('rate', RatingController::class);

// Account Related Routes
Route::middleware(['auth','nocache'])->group(function(){
Route::get('/dashboard/{id}', [UserController::class, 'show'])->name('account.dashboard');
Route::get('/transaction', [UserController::class, 'showTransaction'])->name('account.showTransaction');
Route::get('/transaction/generate', [UserController::class, 'generateTransaction'])->name('account.generateTransaction');
Route::get('/transaction/search', [UserController::class, 'search'])->name('account.searchTransaction');
Route::get('/settings/{id}', [UserController::class, 'edit'])->name('account.settings');
Route::get('/search', [UserController::class, 'search'])->name('account.search');
});

// Transaction Related Routes
Route::middleware(['auth','nocache'])->group(function(){
    Route::get('/transaction', [UserController::class, 'showTransaction'])->name('account.showTransaction');
    Route::get('/transaction/generate', [UserController::class, 'generateTransaction'])->name('account.generateTransaction');;
});

// Approval Request Related Routes
Route::middleware(['auth','nocache'])->group(function(){
    Route::get('/approvalrequests', [ReservationController::class, 'approvalRequests'])->name('reserve.approvalRequests');
});

Route::middleware(['auth','nocache'])->group(function(){
    Route::prefix('/account')->group(function () {
        Route::get('/edit/credentials/{id}', [UserController::class, 'editCredentials'])->name('account.editCredentials');
        Route::get('/edit/user/{id}', [UserController::class, 'editUserInfo'])->name('account.editInfo');
        Route::patch('/update/credentials', [UserController::class, 'updateCredentials'])->name('account.updateCredentials');
        Route::patch('/update/user', [UserController::class, 'updateUserInfo'])->name('account.updateInfo');
    });
});

Route::resource('account', UserController::class);

require __DIR__ . '/auth.php';

Route::fallback(FallbackController::class)->name('fallback');
