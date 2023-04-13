@extends('layouts.master')

@section('content')
    <div class="row my-4">
                @if ($errors->any())
                    <div class="alert alert-danger decoration-none">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <div class="col-md-8 mx-auto">
            <div class="card border shadow-sm">
                <h3 class="card-header">Book Up</h3>
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card">
                            <h3 class="card-header">{{$car->Brand->name}}</h3>
                            <div class="card-body">
                                {{-- @dd($car) --}}
                                    <div class="media mb-2">
                                        <div class="media-content">
                                            <img src="{{asset($car->image)}}" class="img-fluid rounded-cercle" alt="" width="200px">
                                            
                                        </div>
                                        <div class="madia-body">
                                            <h3 class="text-info">
                                                <a href="{{route('cars.show',$car->id)}}" class="btn ">
                                                    {{$car->name}}  
                                                </a>
                                            </h3>
                                            <p class="d-flex flex-row justify-content-center align-items-center">
                                                <span class="badge bg-danger mx-1">category: {{$car->Category->name}}</span>
                                                {{-- <span class="badge bg-primary mx-1">Price for Sell: {{$car->price_sell}} $</span> --}}
                                                <span class="badge bg-primary mx-2">Price for Rent: {{$car->price_rent}} $</span>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('reservation.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="rent_date_start">Pick-up date</label>
                            <input type="date" name="rent_date_start" id=""
                                class="form-control" placeholder="Pick-up date...">
                        </div>
                        <div class="form-group my-2">
                            <label for="rent_date_end">Drop-off date</label>
                            <input type="date" name="rent_date_end" id=""
                                class="form-control" placeholder="Drop-off date...">
                            <input type="hidden" name="car_id" value="{{$car->id}}">
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
@endsection