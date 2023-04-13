<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //

    public function index()
    {
        $car = Car::with('Brand','Category')->get();
        $brand = Brand::all();
        $product = Products::all();
        return view('admins.dashboard', compact('car','brand','product'));
    }
    public function show(){
        return view('admins.dashboard_a');
    }
}
