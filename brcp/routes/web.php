<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\Products;
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
Route::post('/cars', [CarController::class, 'index'])->name('cars.index');

Route::post('/add/cars', [CarController::class, 'store'])->name('cars.store');

Route::Resource('/reservation', ReservationController::class);
Route::get('/reservation/{id}/create', [ReservationController::class, 'create'])->name('reservations.create');
// Route::delete('/reservation/{resrvationId}/delete', [ReservationController::class, 'deleteUserResrvation'])->name('reservation.delete');


Route::Resource('/Brands', BrandController::class);
Route::put('/Brands', [BrandController::class, 'update'])->name('brands.update');
Route::post('/add/brands', [BrandController::class, 'store'])->name('brands.store');

Route::Resource('/products', ProductsController::class);
Route::put('/products/{id}', [ProductsController::class, 'update'])->name('Products.update');
Route::post('/add/products', [ProductsController::class, 'store'])->name('products.store');


Route::get('/user/{id}/profile', [UserController::class, 'show'])->name('users.profile');

Route::get('/admin/dashboard',[AdminController::class,'show'])->name('admins.dashboars_a');

Route::get('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/auth', [UserController::class, 'auth'])->name('users.auth');
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
Route::get('/register', [UserController::class, 'registr'])->name('users.register');
Route::post('/register', [UserController::class, 'register'])->name('users.register');


Route::middleware([
    'admin',
])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admins.index');
});

// Route::group(['middleware' => 'admin'], function () {
//     Route::get('/dashboard', 'DashboardController@index');
// });