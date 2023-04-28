@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js">
@section('content')
    <div class="container-fluid">
     <h1>Profile</h1>
  </div>
     <div class="row my-4 container">
        <div class="col-md-4">
            <div class="card text-left">
                <img class="card-img-top" src="{{asset(Auth::user()->image)}}" style="width: 100px;margin:auto;padding-top:10px;border-radius:40%;" alt="">
                <div class="card-body" style="margin:auto">
                    <h4 class="card-title text-black">{{Auth::user()->name}}</h4>
                    <p class="card-text d-flex flex-row align-items-center">
                        <span class="badge bg-primary">Email : {{Auth::user()->email}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8 ">
            <h3>Reservations</h3>
            <div class="overflow-auto">
                <table class="table ">
                <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Pick-up date</th>
                        <th>Drop-off date</th>
                        <th>Price</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($cars as $reservation)
                            <tr>
                                <td>{{$reservation->brand}}</td>
                                <td>{{$reservation->category}}</td>
                                <td>{{$reservation->pick_up_date}}</td>
                                <td>{{$reservation->drop_of_date}}</td>
                                <td>{{$reservation->price}}</td>
                                <td>{{$reservation->status}}</td>
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
            
            @foreach ($cars as $reservation)
                @if ($reservation->status == "Accepted")
                    <div class="alert alert-success alert-dismissible" role="alert">
                            Your Reservations has been Accepted , You can go pick-up the Car
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    {{-- update user info --}}
    <div >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profile Information</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('update_profile',[$id])}}" enctype="multipart/form-data" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <img src="{{asset(auth()->user()->image)}}" style="width: 80px;margin:auto;padding:10px;border-radius:20%;">
                                    <input type="file" name="image" id="image" class="form-control">
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
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group py-3">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection

