<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('styles')
    <title>BRCP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand " href="/">   
              <img src="{{asset('img/logo/1.png')}}" alt="" style="width: 100px" >
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
               @auth
                    <li class="nav-item">
                      @if (Auth::user()->is_admin == 1)
                          <a class="nav-link" href="{{route('dashboard')}}">
                            {{auth()->user()->name}}
                          </a>
                      @else
                          <a class="nav-link" href="{{route('users.profile',auth()->user()->id)}}">
                            {{auth()->user()->name}}
                          </a>
                      @endif
                      
                    </li>
                    <li class="nav-item">
                      <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button  class="nav-link" >Logout</button>
                      </form>
                    </li>
                  @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
               @endauth
              </ul>
            </div>
          </div>
        </nav>
      </div>
        <div class="row">
            <div class="col-md-6 mx-auto my-4">
                @include('includes.messages')
            </div>
        </div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>