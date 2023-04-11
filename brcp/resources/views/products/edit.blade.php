@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12 mx-auto">
                <div class="card bg-light">
                    <h3 class="card-header">
                        Edit a Car
                    </h3>
                    <div class="card-body">
                        <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name"
                                value="{{$product->name}}"
                                id="" class="form-control"
                                placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price"
                                value="{{$product->price}}"
                                id="" class="form-control"
                                placeholder="500$">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description"
                                value="{{$product->description}}"
                                id="" class="form-control"
                                placeholder="something">
                            </div>
                            <div class="form-group my-3">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity"
                                value="{{$product->quantity}}"
                                id="" class="form-control"
                                placeholder="123">
                            </div>
                            <div class="form-group">
                                <img src="/{{$product->image}}" width="100" height="100" alt="" class="img-fluid rounded">
                                <label for="">Image</label>
                                <input type="file" name="image"
                                id="" class="form-control"
                                >
                            </div>
                            <div class="modal-footer my-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection