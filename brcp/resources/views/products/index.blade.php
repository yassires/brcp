@extends('layouts.master')
@section('title')
    Products
@endsection

@section('content')


<div>
  
    {{-- message --}}
   <div class="">
        <div class="col-md-6 mx-auto my-4">
            @include('includes.messages')
        </div>
    </div>
    {{-- message --}}
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
  
  
       <div class="container-fluid pb-5">
          
              <h1>{{$title}}</h1>
  
        
          <div class="p-3 d-flex justify-content-end">
              <input type="text" class="px-1 border border-none" placeholder="Search product name & description" id="search-box" onkeyup="searchCards()">
          </div>
          <div class="">
            <div class="row " id="cars">
              @foreach($products as $product)
              <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 pb-4">
                <form action="{{route('cart.store')}}" method="POST">
                    @csrf
                     <!-- Card-->
                  <div class="card rounded shadow border-0">
                      <div class="card-body p-4">
                          <img src="{{asset($product->image)}}" alt="" class="img-fluid d-block mx-auto mb-3 card_photo" />
                          <h3 class="text-dark text-decoration-none">{{ $product->name }}</h3>
                          <h6>Model : {{ $product->description }}</h6>
                          <h6>Price : {{ $product->price }}</h6>
                          <h6>Fuel Type : {{ $product->quantity }}</h6>
                          <div class="d-flex justify-content-between pt-2">
                                  <ul class="list-inline small">
                                      <button type="submit" class="btn btn-light border-secondary"><i class="fa-solid fa-cart-shopping"></i></button>
                                  </ul>
                                  <input name="product_id" type="hidden" value="{{$product->id}}">
                          </div>
                      </div>
                  </div>
                </form>
                 
              </div>
              @endforeach
          </div>
          </div>
          
          
          <script>
          function searchCards() {
            var input = document.getElementById("search-box").value.toLowerCase();
            var cards = document.querySelectorAll("#cars .card");
          
            for (var i = 0; i < cards.length; i++) {
              var brandName = cards[i].querySelector('.card-body h3').textContent.toLowerCase();
              var modelName = cards[i].querySelector('.card-body h6:first-of-type').textContent.toLowerCase();
              
              if (brandName.indexOf(input) > -1 || modelName.indexOf(input) > -1) {
                cards[i].style.display = "";
              } else {
                cards[i].style.display = "none";
              }
            }
          }
          </script>
              
      </div>
  </div>
@endsection