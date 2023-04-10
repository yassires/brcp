<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    //

    public function index()
    {
        $car = Car::with('Brand','Category')->get();
        return view('admins.dashboard', compact('car'));
    }
}
