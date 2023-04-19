<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
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



Route::get('/', [HomeController::class, 'welcome']);
Route::Resource('/cars', CarController::class);
Route::get('/cars/type/{pg}', [CarController::class, 'index'])->name('cars.type');

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

Route::put('/user/profile/{id}', [UserController::class, 'update'])->name('update_profile');

Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('admins.dashboars');

Route::get('/login', [UserController::class, 'login'])->name('users.login');
Route::post('/auth', [UserController::class, 'auth'])->name('users.auth');
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
Route::get('/register', [UserController::class, 'registr'])->name('users.register');
Route::post('/register', [UserController::class, 'register'])->name('users.register');

// Route::group(['middleware' => ['role:Admin']],function(){
//     Route::get('/admin', [AdminController::class, 'index'])->name('admins.index');
//     Route::get('/admin/cars', [AdminController::class, 'carShow'])->name('admins.cars');
//     Route::get('/admin/products', [AdminController::class, 'productShow'])->name('admins.products');
//     Route::get('/admin/brands', [AdminController::class, 'brandShow'])->name('admins.brands');
// });

Route::get('/admin', [AdminController::class, 'index'])->name('admins.index')->middleware('permission:view dashboard');
Route::get('/admin/cars', [AdminController::class, 'carShow'])->name('admins.cars')->middleware('permission:view dashboard');
Route::get('/admin/products', [AdminController::class, 'productShow'])->name('admins.products')->middleware('permission:view dashboard');
Route::get('/admin/brands', [AdminController::class, 'brandShow'])->name('admins.brands')->middleware('permission:view dashboard');
Route::get('/admin/users', [AdminController::class, 'userShow'])->name('admins.users')->middleware('permission:view dashboard');

Route::get('admin/users/{user}',[UserController::class,'showOne'])->name('show.users');
Route::put('role/',[UserController::class,'assignRole'])->middleware('permission:view dashboard')->name('assign.role');
