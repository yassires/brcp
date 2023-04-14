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
        $car = Car::with('Brand','Category')->get();
        $brand = Brand::all();
        $product = Products::all();
        $user= User::count();
        $reservation = Reservation::all();
        return view('admins.dashboard', compact('car','brand','product','user','reservation'));
    }
    public function show(){
        return view('admins.dashboard');
    }
    public function carShow()
    {
        $car = Car::with('Brand','Category')->get();
        $brand = Brand::all();
        $product = Products::all();
        return view('admins.dash_cars', compact('car','brand','product'));
    }
    public function productShow()
    {
        // $rep = $this->rep();
        // $car = Car::with('Brand','Category')->get();
        // $brand = Brand::all();
        $product = Products::all();
        return view('admins.dash_products', compact('product'));
    }
    public function brandShow()
    {
        // $rep = $this->rep();
        // $car = Car::with('Brand','Category')->get();
        $brand = Brand::all();
        // $product = Products::all();
        return view('admins.dash_brands', compact('brand'));
    }
}
