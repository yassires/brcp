<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('styles')
    <title>@yield('title')</title>
    
    <!-- BEGIN parsley css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/doc/assets/docs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css">
    <!-- END parsley css-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  </head>
    <link rel="stylesheet" href="{{asset('css/welcome_style.css')}}" />

    <body>
      <header class="text-center mb-5" style="height: 8vh;">
          <nav class="navbar navbar-expand-lg ">
          <div class="container d-flex">
            <a class="navbar-brand" href="/"><img src="{{asset('css/img/1.png')}}" class="" width="80" alt="" /> </a>
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
      </header>
      
        <div class="">
            <div class="col-md-6 mx-auto my-4">
                @include('includes.messages')
            </div>
        </div>
        @yield('content')
        <!-- BEGIN parsley js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- END parsley js-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>   
     @yield('scripts')
</body>
</html>