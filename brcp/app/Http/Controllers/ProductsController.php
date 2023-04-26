<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();
        // $a_brands = Products::whereAvailable(1)->get();


        return view('products.index')->with([
            'products' => $products,
            'title' => "All Products"
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
     * @param  \App\Http\Requests\StoreProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);

        $name = '';
        $file = $request->image;
        $name = $file->getClientOriginalName();
        $file->move(public_path('images'), $name);

        Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'image' => 'images/' . $name,
        ]);
        return redirect()->route('admins.products')->withSuccess('Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Products::find($id);
        $products = Products::all();
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsRequest  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        $products = Products::find($request->id);
        $image = $products->image;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
            $image = 'images/' . $name;
        }
        // dd($products, $request->all());

        ($products->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'image' => $image
        ]));
        return redirect()->route('admins.products')->withSuccess('product updated  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $products = Products::find($id);
        // return $id;
        $products->delete();
        return redirect()->route('admins.products')->withSuccess('Product deleted  successfully');
    }
}
