@extends('layouts.master')

@section('content')
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card text-left">
                <img class="card-img-top" src="{{asset(Auth::user()->image)}}" style="width: 200px;margin:auto;padding-top:10px;border-radius:10%;" alt="">
                <div class="card-body" style="margin:auto">
                    <h4 class="card-title text-black">{{Auth::user()->name}}</h4>
                    <p class="card-text d-flex flex-row align-items-center">
                        <span class="badge bg-primary">Email : {{Auth::user()->email}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3>Reservations</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Pick-up date</th>
                        <th>Drop-off date</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // dd(auth()->user()->Reservation)
                    @endphp
                        @foreach ($cars as $reservation)
                            <tr>
                                <td>{{$reservation->brand}}</td>
                                <td>{{$reservation->category}}</td>
                                <td>{{$reservation->pick_up_date}}</td>
                                <td>{{$reservation->drop_of_date}}</td>
                                <td>{{$reservation->price}}</td>
                                <td>
                                    <form method="post" action="{{route('reservation.destroy',[$reservation->id])}}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td> 
                            </tr>
                            
                        @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

    {{-- update user info --}}
    <div style="padding-left:130px ">
        <div class="container">
            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profile Information</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('update_profile',[$id])}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <img src="{{asset(auth()->user()->image)}}" style="width: 80px;margin:auto;padding:10px;border-radius:20%;">
                                    <input type="file" name="image" id="image" class="form-control" required>
                                </div>
                                <div class="form-group py-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}" required>
                                </div>
                                <div class="form-group py-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{auth()->user()->email}}" required>
                                </div>
                                <div class="form-group py-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group py-3">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control ">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection