<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UsersController;
use GuzzleHttp\Promise\Create;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CarController::class, 'index']);
Route::Resource('/cars', CarController::class);
Route::post('/cars', [CarController::class,'index'])->name('cars.index');
Route::Resource('/reservation', ReservationController::class);
Route::get('/reservation/{id}/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::get('/user/{id}/profile', [UsersController::class, 'show'])->name('users.profile');




Route::middleware([
    'admin',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::group(['middleware' => 'admin'], function () {
//     Route::get('/dashboard', 'DashboardController@index');
// });