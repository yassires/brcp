<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class HomeController extends Controller
{
    public function welcome()
    {
        $cars = Car::all();
        // $car_id=Car::id();
        return view('welcome',compact('cars'));
    }
}
