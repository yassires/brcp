@extends('layouts.master')
@section('content')

@if (auth()->user())

    
{{-- <div class="container-fluid">
    <h2>Car Details</h2>
</div> --}}
<div class="tb shadow-lg">
    <div class="row m-0">
      <div class="col-lg-7 pb-5 pe-lg-5">
        <div class="row">
          <div class="col-12 p-5">
            <img class="img" src="{{asset($car->image)}}" alt="" />
          </div>
          <div class="row m-0 bg-light">
            <div class="col-md-4 col-6 ps-30 pe-0 my-4">
              <p class="text-muted">Brand</p>
              <p class="h5">{{$car->Brand->name}}</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Model</p>
              <p class="h5 m-0">{{$car->name}}</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Category</p>
              <p class="h5 m-0">{{$car->Category->name}}</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Color</p>
              <p class="h5 m-0">{{$car->color}}</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Availability</p>
              @if ($car->available == 1)
                  <p class="h5 m-0">Availabale</p>
              @else
                <p class="h5 m-0">Reserved</p>
              @endif
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 p-0 ps-lg-4">
        <div class="row m-0">
          <div class="col-12 px-4">
            <div class="d-flex align-items-end mt-4 mb-2">
                @if ($car->sell_rent == 0)
                    <p class="h4 m-0"><span class="pe-1">Book Up</span></p>
                @else
                     <p class="h4 m-0"><span class="pe-1">Buy</span></p>
                @endif
             
            </div>
            <div class="d-flex justify-content-between mb-3">
                @if ($car->sell_rent == 0)
                    <p class="textmuted fw-bold">Price / day</p>
                    <div class="d-flex align-text-top ">
                        <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4">{{$car->price_rent}}</span>
                    </div>
                @else
                    <p class="textmuted fw-bold">Price</p>
                    <div class="d-flex align-text-top"><span class="fas fa-dollar-sign mt-1 pe-1 fs-14"></span><span class="h4">{{$car->price_sell}}</span></div>
                @endif
              
            </div>
          </div>
          <div class="col-12 px-0">
            <div class="row bg-light m-0">
              <div class="col-12 px-4 my-4">
                <p class="fw-bold">Your Information</p>
              </div>
              <div class="col-12 px-4">
                <div class="d-flex mb-4">
                  
                      
                            <div class="card-body">
                                <form action="{{route('reservation.store')}}" method="POST" id="create-reservation" data-parsley-validate>
                                    @csrf
                                    <div class="d-flex flex-wrap pb-3">
                                      @if ($car->sell_rent == 1)
                                        <span class="me-5 pb-3">
                                          <p class="text-muted">Name</p>
                                        <input class="form-control text-muted" name="name" type="text" placeholder="Name" required/>
                                        </span>
                                        <span class="pe-2">
                                            <p class="text-muted">Email</p>
                                            <input class="form-control text-muted" name="email" type="email" placeholder="Something@test.com" required/>
                                        </span>
                                        <span class="pe-5">
                                            <p class="text-muted">Phone</p>
                                            <input class="form-control text-muted" name="phone" type="tel" placeholder="0......." required/>
                                        </span>
                                        <span class="pe-5">
                                            <p class="text-muted">Address</p>
                                            <input class="form-control text-muted" name="address" type="text" placeholder="something ....." required/>
                                        </span>
                                        <span class="pe-5">
                                            <p class="text-muted">Message</p>
                                            <input class="form-control text-muted" name="message" type="text" placeholder="Say something to the Seller" required/>
                                        </span>
                                        <input type="hidden" name="car_id" value="{{$car->id}}">
                                      @endif
                                    </div>   
                                    @if ($car->sell_rent == 0)
                                      <div class="d-flex pb-3">
                                          <div class="form-group pe-5">
                                                  <p for="rent_date_start" class="text-muted">Pick-up date</p>
                                                  <input type="date" name="rent_date_start" id=""
                                                      class="form-control" placeholder="Pick-up date..." required>
                                          </div>
                                              
                                          
                                          <div class="form-group ">
                                              <p for="rent_date_end" class="text-muted">Drop-off date</p>
                                              <input type="date" name="rent_date_end" id=""
                                                  class="form-control" placeholder="Drop-off date..." required>
                                              <input type="hidden" name="car_id" value="{{$car->id}}">
                                          </div>
                                      </div>
                                           
                                    @endif
                                    {{-- submit button --}}
                                          <div class="row">
                                            <div class="col-12">
                                                      @if ($car->available)
                                                              @if ($car->sell_rent == 0)
                                                                              @auth
                                                                                  <div>
                                                                                      <button  type="submit" class="btn btn-primary">
                                                                                          To Book<span class="fas fa-arrow-right ps-2"></span>
                                                                                      </button>
                                                                                  </div>
                                                                              @else
                                                                                  <div>
                                                                                      <a href="{{route('users.login')}}" class="btn btn-primary">
                                                                                          To Book
                                                                                      </a>
                                                                                  </div>
                                                                              @endauth
                                                                              
                                                              @else
                                                                              
                                                                              @auth
                                                                                  <div>
                                                                                      <button type="submit" class="btn btn-primary">
                                                                                          Contact Seller<span class="fas fa-arrow-right ps-2"></span>
                                                                                      </button>
                                                                                  </div>
                                                                              @else
                                                                                  <div>
                                                                                      <a href="{{route('users.login')}}" class="btn btn-primary">
                                                                                          Contact Seller
                                                                                      </a>
                                                                                  </div>
                                                                              @endauth
                                                                              
                                                              @endif           
                                                      @else
                                                      <span class="badge bg-warning ">
                                                        Out of stock
                                                      </span>
                                                      @endif
                                            </div>
                                          </div>
                                    {{-- submit button --}}

                                </form>
                            </div>

                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap");

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      /* padding: 5px; */
      /* background-color: gray; */
    }

    .tb {
      /* margin: 20px auto; */
      /* max-width: 1000px; */
      background-color: white;
      padding: 0;
      min-height: 100vh;
    }

    .form-control {
      height: 25px;
      width: 150px;
      border: none;
      border-radius: 0;
      font-weight: 800;
      padding: 0 0 5px 0;
      background-color: transparent;
      box-shadow: none;
      outline: none;
      border-bottom: 2px solid #ccc;
      margin: 0;
      font-size: 14px;
    }

    .form-control:focus {
      box-shadow: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
    }

    .form-control2 {
      font-size: 14px;
      height: 20px;
      width: 55px;
      border: none;
      border-radius: 0;
      font-weight: 800;
      padding: 0 0 5px 0;
      background-color: transparent;
      box-shadow: none;
      outline: none;
      border-bottom: 2px solid #ccc;
      margin: 0;
    }

    .form-control2:focus {
      box-shadow: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
    }

    .form-control3 {
      font-size: 14px;
      height: 20px;
      width: 30px;
      border: none;
      border-radius: 0;
      font-weight: 800;
      padding: 0 0 5px 0;
      background-color: transparent;
      box-shadow: none;
      outline: none;
      border-bottom: 2px solid #ccc;
      margin: 0;
    }

    .form-control3:focus {
      box-shadow: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
    }

    p {
      margin: 0;
    }

    .img {
      width: 100%;
      height: 100%;
      object-fit: fill;
    }

    .text-muted {
      font-size: 10px;
    }

    .textmuted {
      color: #6c757d;
      font-size: 13px;
    }

    .fs-14 {
      font-size: 14px;
    }

    .btn.btn-primary {
      width: 100%;
      height: 55px;
      border-radius: 0;
      padding: 13px 0;
      background-color: black;
      border: none;
      font-weight: 600;
    }
    .btn.btn-secondary {
      width: 100%;
      height: 55px;
      border-radius: 0;
      padding: 13px 0;
      background-color: #f15a59;
      border: none;
      font-weight: 600;
    }

    .btn.btn.btn-secondary:hover .fas {
      transform: translateX(10px);
      transition: transform 0.5s ease;
    }
    .btn.btn-primary:hover .fas {
      transform: translateX(10px);
      transition: transform 0.5s ease;
    }

    .fw-900 {
      font-weight: 900;
    }

    ::placeholder {
      font-size: 12px;
    }

    .ps-30 {
      padding-left: 30px;
    }

    .h4 {
      font-family: "Work Sans", sans-serif !important;
      font-weight: 800 !important;
    }

    .textmuted,
    h5,
    .text-muted {
      font-family: "Poppins", sans-serif;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

@else
  <div class="flex justify-content-center align-items-center">
      <h1>Page Not Found</h1>
   
  </div>
    
@endif
@endsection

