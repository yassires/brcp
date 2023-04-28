<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $pg)
    {
        // return "sososososo";
        if ($pg == "0") {
            $cars = Car::with('Brand', 'Category')->where('sell_rent', 0)->get();
        } else if ($pg == "1") {
            $cars = Car::with('Brand', 'Category')->where('sell_rent', 1)->get();
        } else {
            return abort(404);
        }


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
            'sell_rent' => 'required',
            'image' => 'required',
        ]);
        // dd($request->all());
        $name = '';
        $file = $request->image;
        $name = $file->getClientOriginalName();
        $file->move(public_path('images'), $name);

        Car::create([
            'name' => $request->name,
            'brand_id' =>   $request->brand,
            'category_id' => $request->category,
            'color' => $request->color,
            'price_rent' => $request->price_rent,
            'price_sell' => $request->price_sell,
            'available' => $request->available,
            'sell_rent' => $request->sell_rent,
            'image' => '/images/' . $name,
        ]);
        return redirect()->route('admins.cars')->withSuccess('Car added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        $car_l = Car::limit(4)->get();
        return view('cars.show', compact('car','car_l'));
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
        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
            $image = 'images/' . $name;
        }
        // dd($request->image);

        $car->update([
            'brand' => $request->brand,
            'name' => $request->name,
            'category' => $request->category,
            'price_rent' => $request->price_rent,
            'price_sell' => $request->price_sell,
            'available' => $request->available,
            'image' => $image
        ]);
        return redirect()->route('admins.cars')->withSuccess('Car updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
        $car->delete();
        return redirect()->route('admins.cars')->withSuccess('Car deleted  successfully');
    }
}