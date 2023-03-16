<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\ProfileController;
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
    foreach($houses as $key=>$house) {
        $rating = Rating::where('house_id', $house->id)->avg('rating');
        $houses[$key]->rating = $rating;
    }
    return view('homepage.index', ['houses' => $houses]);
})->name('homepage');

Route::get('/dashboard', function () {
    return view('homepage.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/house')->group(function(){
    Route::get('/create', [HousesController::class, 'create']) ->name('house.create');
    Route::get('/listings', [HousesController::class, 'index']) -> name('house.index');
    Route::get('/{id}', [HousesController::class, 'show']) ->name('house.show');
    Route::get('/edit/{id}', [HousesController::class, 'edit']) ->name('house.edit');
});

require __DIR__.'/auth.php';

Route::fallback(FallbackController::class);