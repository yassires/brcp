<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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
Route::get('/user/{id}/profile', [UserController::class, 'show'])->name('users.profile');


Route::get('/login',[UserController::class,'login'])->name('users.login');
Route::post('/auth',[UserController::class,'auth'])->name('users.auth');
Route::post('/logout',[UserController::class,'logout'])->name('users.logout');
Route::get('/register',[UserController::class,'registr'])->name('users.register');
Route::post('/register',[UserController::class,'register'])->name('users.register');
Route::get('/admin',[AdminController::class,'index'])->name('admins.index');


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