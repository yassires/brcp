@extends('layouts.master')
@section('title')
   RBCP | Edit Car
@endsection
@section('content')
    <div class="container-fluid">
        <h1>EDIT</h1>
        <div class="row my-5">
            <div class="col-md-12 mx-auto">
                <div class="card bg-light">
                    <h3 class="card-header">
                        Edit  Car
                    </h3>
                    <div class="card-body">
                        <form action="{{route('cars.update',$car->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="form-control" name="brand" id="">
                                    <option value="" selected disabled>Can you select the Brand</option>
                                    <option value="1" {{$car->Brand->name == 'Tesla' ? 'selected' : ''}}>Tesla</option>
                                    <option value="2" {{$car->Brand->name == 'Porsche' ? 'selected' : ''}}>Porsche</option>
                                    <option value="3" {{$car->Brand->name == 'Mercedes' ? 'selected' : ''}}>Mercedes</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="">name</label>
                                <input type="text" name="name"
                                value="{{$car->name}}"
                                id="" class="form-control"
                                placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="category" id="">
                                    <option value="" selected disabled>Can you select the Category</option>
                                    <option value="1" {{$car->Category->name == 'Diesle' ? 'selected' : ''}}>Diesle</option>
                                    <option value="2" {{$car->Category->name == 'Gasoline' ? 'selected' : ''}}>Gasoline</option>
                                    <option value="3" {{$car->Category->name == 'Electric' ? 'selected' : ''}}>Electric</option>
                                    <option value="4" {{$car->Category->name == 'Hybrid' ? 'selected' : ''}}>Hybrid</option>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label for="">Color</label>
                                <input type="text" name="color"
                                value="{{$car->color}}"
                                id="" class="form-control"
                                placeholder="white">
                            </div>
                            <div class="form-group">
                                <label for="">Price for rent</label>
                                <input type="number" name="price_rent"
                                value="{{$car->price_rent}}"
                                id="" class="form-control"
                                placeholder="500$">
                            </div>
                            <div class="form-group">
                                <label for="">Price for sell</label>
                                <input type="number" name="price_sell"
                                value="{{$car->price_sell}}"
                                id="" class="form-control"
                                placeholder="500$">
                            </div>
                            <div class="form-group">
                                <label for="">Availability</label>
                                <select class="form-control" name="available" id="">
                                    <option value="" selected disabled>Select an option</option>
                                    <option value="1" {{$car->available ? 'selected' : ''}}>Available</option>
                                    <option value="0" {{!$car->available ? 'selected' : ''}}>Reserved</option>
                                </select>   
                            </div>
                            <div class="form-group">
                                <img src="{{asset($car->image)}}" width="100" height="100" alt="" class="img-fluid rounded">
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