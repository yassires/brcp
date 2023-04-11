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
        $cars = Car::with('Brand', 'Category')->paginate(5);
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
            'title' => "All Cars"
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
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $this->validate($request, [
            'brand' => 'required',
            'name' => 'required',
            'category' => 'required',
            'price_rent' => 'required',
            'price_sell' => 'required',
            'available' => 'required',
            'image' => 'required',
        ]);

        $name = '';
        $file = $request->image;
        $name = $file->getClientOriginalName();
        $file->move(public_path('images'), $name);

        Car::create([
            'brand' => $request->brand,
            'name' => $request->name,
            'category' => $request->category,
            'price_rent' => $request->price_rent,
            'price_sell' => $request->price_sell,
            'available' => $request->available,
            'image' => '/images/' . $name,
        ]);
        return redirect()->route('admins.index')->withSuccess('Car added successfully');
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
        $cars = Car::with('brand', 'category')->findOrFail($car->id);
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        //
        $this->validate($request, [
            'brand' => 'required',
            'name' => 'required',
            'category' => 'required',
            'price_rent' => 'required',
            'price_sell' => 'required',
            'available' => 'required',
        ]);
        $image = $car->image;
        if($request->hasFile('image')){
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
            $image = '/images/'.$name;
        }
        
        $car->update([
             'brand' => $request->brand,
            'name' => $request->name,
            'category' => $request->category,
            'price_rent' => $request->price_rent,
            'price_sell' => $request->price_sell,
            'available' => $request->available,
            'image' => $image
        ]);
        return redirect()->route('admins.index')->withSuccess('Car updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
        $car->delete();
        return redirect()->route('admins.index')->withSuccess('Car deleted  successfully');

    }
}
