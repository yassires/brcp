<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();
        $a_brands = Brand::whereAvailable(1)->get();


        return view('cars.index')->with([
            'cars' => $brands,
            'title' => "All Brands"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);

        $name = '';
        $file = $request->image;
        $name = $file->getClientOriginalName();
        $file->move(public_path('images'), $name);

        Brand::create([
            'name' => $request->name,
            'image' => 'images/' . $name,
        ]);
        return redirect()->route('admins.index')->withSuccess('Brand added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        $brands = Brand::all();
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
        // dd($request,$brand);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $brand = Brand::find($request->id);
        $image = $brand->image;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
            $image = 'images/' . $name;
        }

        $brand->update([
            'name' => $request->name,
            'image' => $image
        ]);
        return redirect()->route('admins.index')->withSuccess('Brand updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $brand = Brand::find($id);
        // return $id;
        // dd($brand);
        $brand->delete();
        return redirect()->route('admins.index')->withSuccess('Brand deleted  successfully');
    }
}
