<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="{{asset('css/welcome_style.css')}}" />
    <title>test</title>
  </head>
  <body>
<header class="text-center mb-5" style="height: 8vh;">

    <nav class="navbar navbar-expand-lg ">
      <div class="container d-flex">
        <a class="navbar-brand" href="#"><img src="{{asset('css/img/1.png')}}" class="" width="80" alt="" /> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-end " id="navbarSupportedContent">
          <ul class="navbar-nav  mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            @auth
                <li class="nav-item">
                  @if (Auth::user()->is_admin == 1)
                    
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
  </header>
<section>
  <div class="container-fluid">
     <h1>Profile</h1>
  </div>
 
     <div class="row my-4 container">
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
    <div >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
</section>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

