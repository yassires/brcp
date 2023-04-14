@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($cars as $car)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ $car->image }}" alt="Car Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }}</h5>
                            {{-- <p class="card-text">{{ $car->description }}</p> --}}
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Model: {{ $car->Category->name }}</li>
                                <li class="list-group-item">Brand: {{ $car->Brand->name }}</li>
                                <li class="list-group-item">Price: {{ $car->price_sell }}</li>
                            </ul>
                            <a href="#" class="btn btn-primary mt-3">Buy Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
