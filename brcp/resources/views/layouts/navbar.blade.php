<nav class="navbar navbar-expand-lg pt-5">
    <div class="container d-flex">
      <a class="navbar-brand" href="#"><img src="css/img/1.png" class="" width="80" alt="" /> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-end " id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active " aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active border-bottom" aria-current="page" href="#">Buy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active border-bottom" aria-current="page" href="#">Rent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active border-bottom" aria-current="page" href="#">Products</a>
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