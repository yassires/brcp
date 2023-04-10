<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cars = Car::with('Brand','Category')->paginate(5);
        $a_cars = Car::whereAvailable(1)->get();

        // if ($request->search !== null) {
        //     $car = Car::where('brand', '=', $request->search)
        //     ->orderByDesc('created_at')
        //     ->get();
        //     dd($car);
        //     return view('cars.index')->with([
        //         'cars' => $car,
        //         'title' =>"Result found for : ".$request->search
        //     ]);
        // } else {
             return view('cars.index')->with([
            'cars' => $cars,
            'title' =>"All Cars"
        ]);
        // }
        
       
        

    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
