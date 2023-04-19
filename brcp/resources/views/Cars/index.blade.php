@extends('layouts.master')

@section('content')
<div>
    <!-- First Row-->
    <div class="d-grid justify-content-center text-center ">
        <h5 class="text-danger">BRANDS</h5>
    </div>
      <!------------ Cars Brands----------- -->
      <div class="pb-5">
        <div class="d-flex flex-wrap justify-content-center justify-content-around text-decoration-none">
          <div><img src="{{asset('css/img/ford_logo.png')}}" width="85" class="object-fit-co ntain img-fluid rounded photo mb-2" alt=""/></div>
          <div><img src="{{asset('css/img/Tesla_logo.png')}}" width="85" class="object-fit-contain img-fluid rounded photo" alt="" /></div>
          <div><img src="{{asset('css/img/bmw_logo.png')}}" width="85" class="object-fit-contain img-fluid rounded photo" alt="" /></div>
          <div><img src="{{asset('css/img/Mercedes.png')}}" width="85" class="object-fit-contain img-fluid rounded photo" alt="" /></div>
          <div><img src="{{asset('css/img/dacia_logo.png')}}" width="85" class="object-fit-contain img-fluid rounded photo" alt="" /></div>
          <div><img src="{{asset('css/img/vendor-2.png')}}" width="85" class="object-fit-contain img-fluid rounded photo" alt="" /></div>
          <div><img src="{{asset('css/img/vw_logo.png')}}" width="85" class="object-fit-contain img-fluid rounded photo" alt="" /></div>
        </div>
      </div>
      <!------------ Cars Brands----------- -->


     <div class="container-fluid">
        
            <h1>All Cars</h1>
            <div class="">
                <form action="get" class="bg-white border border-black">
                <input type="text" class="px-1 border border-none" placeholder="Search Car brand & Model" id="myInput" onkeyup="search()">
                <i class="fa-solid fa-magnifying-glass px-1"></i>
                </form>
            </div>
      
        
        <div class="row">
            @foreach($cars as $car)
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <!-- Card-->
            <div class="card rounded shadow border-0" id="cars">
                <div class="card-body p-4">
                <img src="{{asset($car->image)}}" alt="" class="img-fluid d-block mx-auto mb-3 card_photo" />
                <h3 class="text-dark text-decoration-none">{{ $car->Brand->name }}</h3>
                <h6>Model : {{ $car->name }}</h6>
                <h6>Price : {{ $car->price_sell }}</h6>
                <h6>Fuel Type : {{ $car->Category->name }}</h6>
                <div class="d-flex justify-content-between pt-2">
                    <ul class="list-inline small">
                    <button type="button" class="btn btn-danger "><a class="text-white text-decoration-none" href="{{route('reservations.create',$car->id)}}">Rent Now</a></button>
                    </ul>
                    <ul class="list-inline small">
                    <button type="button" class="btn btn-light border-secondary">Buy</button>
                    </ul>
                </div>
                </div>
            </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
   
@endsection
