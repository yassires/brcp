@extends('layouts.master')

@section('content')
<div class="row my-4">
    <div class="col-md-4">
        <div class="card bg-light border border-primary">
            <h3 class="card-header">
                Search
            </h3>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="Search">Search</label>
                        <input type="text" name="search" id="" class="form-control" placeholder="Search...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border border-primary">
            <h3 class="card-header">{{$car->Brand->name}}</h3>
            
            <div class="card-body">
                    <div class="media mb-2">
                        <div class="media-middle">
                            <img src="{{asset($car->image)}}" class="img-fluid rounded-cercle" alt="" width="200px">
                            
                        </div>
                        <div class="madia-body">
                            <h3 class="text-info">
                                <a href="{{route('cars.show',$car->id)}}" class="btn">
                                    {{$car->name}}
                                </a>
                            </h3>
                            <p class="d-flex flex-row justify-content-center align-items-center">
                                <span class="badge bg-danger mx-1">category: {{$car->Category->name}}</span>
                                <span class="badge bg-primary mx-1">Price for Sell: {{$car->price_sell}} $</span>
                                <span class="badge bg-primary mx-2">Price for Rent: {{$car->price_rent}} $</span>
                                @if ($car->available)
                                    
                                    @auth
                                        <div>
                                            <a href="{{route('reservations.create',$car->id)}}" class="btn btn-primary">
                                                To Book
                                            </a>
                                        </div>
                                    @else
                                        <div>
                                            <a href="{{route('users.login')}}" class="btn btn-primary">
                                                To Book
                                            </a>
                                        </div>
                                    @endauth
                                @else
                                    <span class="badge bg-warning ">
                                        Reserved
                                    </span>  
                                @endif
                                
                            </p>
                        </div>
                    </div>
                   
                
            </div>
        </div>
    </div>
</div>
    
@endsection