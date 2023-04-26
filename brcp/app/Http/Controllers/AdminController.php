<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Products;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class   AdminController extends Controller
{
    //
    public function rep()
    {
        $car = Car::with('Brand','Category')->get();
        $brand = Brand::all();
        $product = Products::all();
        
        return [$car,$brand,$product];
    }
    public function index()
    {

        // return 45;
        $car = Car::with('Brand','Category')->get();
        $brand = Brand::all();
        $product = Products::all();
        $users= User::all();
        $reservation = Reservation::all();
        // dd($users);
        return view('admins.dashboard', compact('car','brand','product','users','reservation'));
       
    }
    public function show(){
        $users = User::all();
        return view('admins.dashboard' , compact('users'));
    }
    public function carShow()
    {
        $car = Car::with('Brand','Category')->get();
        // dd($car);
        $brand = Brand::all();
        $product = Products::all();
        
        return view('admins.dash_cars', compact('car','brand','product'));
    }
    public function productShow()
    {
        $product = Products::all();
        return view('admins.dash_products', compact('product'));
    }
    public function brandShow()
    {
        $brand = Brand::all();
        return view('admins.dash_brands', compact('brand'));
    }
    public function userShow()
    {
        $users = User::all();
        return view('admins.dash_users', compact('users'));
    }

    public function reservationShow()
    {
        $reservations = Reservation::all();
        return view('admins.dash_reservations', compact('reservations'));
    }
}
