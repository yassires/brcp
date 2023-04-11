@extends('layouts.master')

@section('content')
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card text-left">
                <img class="card-img-top" src="{{asset(Auth::user()->image)}}" style="width: 200px;margin:auto;padding-top:10px" alt="">
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
                                    <form action="{{route('reservation.delete',[$reservation->id,$reservation->car_id])}}" >
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td> 
                            </tr>
                            
                        @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    
@endsection