<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="{{asset('css/welcome_style.css')}}" />
    <title>RBCP</title>
  </head>
  <body>
    <div class="">
      
      <header class="text-center mb-5">

        <nav class="navbar navbar-expand-lg pt-5">
          <div class="container d-flex">
            <a class="navbar-brand" href="#"><img src="css/img/1.png" class="" width="80" alt="" /> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  justify-content-end " id="navbarSupportedContent">
              <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active " aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active border-bottom" aria-current="page" href="/cars/type/1">Buy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active border-bottom" aria-current="page" href="/cars/type/0">Rent</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active border-bottom" aria-current="page" href="/products">Products</a>
                </li>
                @auth
                <li class="nav-item">
                 
                  @if(auth()->user()->hasAnyRole(['Admin', 'Manager']))
                    
                      <a class="nav-link border-bottom border-primary" href="{{route('admins.index')}}">
                        Dashboard
                      </a>
                  
                  @else
                      <a class="nav-link" href="{{route('users.profile',auth()->user()->id)}}">
                        {{auth()->user()->name}}
                      </a>
                  @endif
                  
                </li>
                <li class="nav-item">
                  <form action="{{route('users.logout')}}" method="POST">
                    @csrf
                    <button  class="nav-link bg-transparent border-0" >Logout</button>
                  </form>
                </li>
                
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{route('users.register')}}">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('users.login')}}">Login</a>
                </li>
           @endauth
              </ul>
            </div>
          </div>
        </nav>

        <section class="pt-lg-5 pb-lg-5 justify-content-start">
          <div class="justify-content-start container pt-5">
            <h1 class="display-2 fw-semibold text-start">Rent Or Buy A Car</h1>
            <p class="text-start display-2 fw-semibold">Travel <span class="text-danger">Endless </span></p>
            <p class="fs-4 text-start"> No reservation costs. Great rates.Find What You Need actually.</p>

           
            <div class="d-flex">
              <div class="pe-3">
                <button class="btn btn-light btn_rent border-danger px-5 fw-semibold py-2 ">Contact Us</button>
              </div>
  
              <button class="btn btn-danger px-5 fw-semibold py-2">Rent Now</button>
            </div>
          </div>
          
          
        </section>
      </header>

      
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

      <!-- First Row-->
      <div class="d-grid justify-content-center text-center pt-5">
        <h5 class="text-danger">BEST SERVICES</h5>
        <h2 class="font-weight-bold mb-2">Most Popular Car Rental Deals</h2>
        <p class="font-italic text-muted mb-5">Explore below our best car services experience like never before</p>
      </div>

      <div class="row pb-5 mb-4 container-fluid">

        @foreach($cars as $car)
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <!-- Card-->
            <div class="card rounded shadow border-0">
                <div class="card-body p-4">
                <img src="{{asset($car->image)}}" alt="" class="img-fluid d-block mx-auto mb-3 card_photo" />
                <h3><a  class="text-dark text-decoration-none">{{ $car->Brand->name }}</a></h3>
                <h6>Model : {{ $car->name }}</h6>
                <h6>Price : {{ $car->price_sell }}</h6>
                <h6>Fuel Type : {{ $car->Category->name }}</h6>
                <div class="d-flex justify-content-between pt-2">
                  @if ( $car->sell_rent == 0 )
                      <ul class="list-inline small">
                      <button type="button" class="btn btn-danger "><a class="text-white text-decoration-none" href="{{route('cars.show',$car->id)}}">Rent Now</a></button>
                      </ul>
                  @else
                      <ul class="list-inline small">
                      <button type="button" class="btn btn-light border-secondary"><a class="text-dark text-decoration-none" href="{{route('cars.show',$car->id)}}">Buy</a></button>
                      </ul>
                  @endif
                </div>
                </div>
            </div>
            </div>
        @endforeach
      </div>

       <!-- Second Row-->
       <div class="d-grid justify-content-center text-center pt-5">
        <h5 class="text-danger">WHY CHOOSE US</h5>
        <h2 class="font-weight-bold mb-2">Best Car Rental / Sell Services</h2>
        <p class="font-italic text-muted mb-5">We provide Best classic  services as below</p>
      </div>


      <div class="d-flex flex-wrap">
        <div class="section3" style="width: 760px;height: 300px ;background-image: url(css/img/Tesla_Model_3.png); background-size: cover; background-position: center; background-repeat: no-repeat;">
        </div>
        <div>
          <ul class="mb-5">
            <li><h4>24/7 Customer Support</h3></li>
            <li><p>We keep our valued customers happy and provide 24/7 customer support</p></li>
          </ul>
          <ul class="mb-5">
            <li><h4>Best Price Guarantee</h4></li>
            <li><p>We are committed for the best prices and ensure you for it</p></li>
          </ul>
          <ul class="mb-5">
            <li><h4>All locations in Morocco</h4></li>
            <li><p>We provide our services at each and every place all over Casablanca</p></li>
          </ul>
        </div>
      </div>


      <!-- third Row-->
      <div class="d-flex flex-wrap justify-content-center align-items-center" style="width: 100%;min-height: 100% ;background-image: url(img/audi_r8.jpg);background-color: grey; background-blend-mode: multiply; background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="p-4 iframe_r" >
          <iframe class="rounded"  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13497.578261617813!2d-8.5216487!3d32.2474646!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdaefdd4fcbbdbc1%3A0x846cbd9f328a7bdb!2sYOUCODE!5e0!3m2!1sfr!2sma!4v1681313432494!5m2!1sfr!2sma"></iframe>
        </div>
        <div class="py-3">
          <!-- Contact us -->
          <form class="bg-white bg-opacity-75 p-3 rounded ">
            <h3 class="ps-5">Contact Us</h3>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-2">
              <label for="Subject" class="form-label">Subject</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
              <label for="Message" class="form-label">Message</label>
              <input type="text" class="form-control" id="Message">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  <footer class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>Copyright © 2023
            <a href="#" class="text-white">Your Company Name</a>
          </p>
        </div>
        <div class="col-md-6">
          <ul class="list-inline text-md-right">
            <li class="list-inline-item">
              <a href="#" class="text-white">Terms of Use</a>
            </li>
            <li class="list-inline-item">
              <a href="#" class="text-white">Privacy Policy</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
</html>
