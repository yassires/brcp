<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex">
        
            <div>
               <a class="navbar-brand ps-3" href="{{route('admins.index')}}">Dashboard</a>
       
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
            </div>
            
            
       
            <div  class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav  mb-2 mb-lg-0 ">
                <li class="nav-item  dropdown">
                 <div class="d-flex">
                    <a class="navbar-brand ps-3" href="/">Home</a>
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{auth()->user()->name}}
                    </a>
                 </div>
                 <div class="dropdown">
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                      <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('users.profile',auth()->user()->id)}}">My Account</a>
                      </li>
                      <li class="nav-item pe-2">
                        <form action="{{route('users.logout')}}" method="POST">
                          @csrf
                          <button class="p-2 rounded bg-transparent border-0 text-danger">Logout</button>
                        </form>               
                      </li>
                    </ul>
                  </div>
                
                  {{-- <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                      <li class="nav-item">
                          <a class="nav-link text-white" href="{{route('users.profile',auth()->user()->id)}}">My Account</a>
                      </li>
                      <li class="nav-item pe-2">
                          <form action="{{route('users.logout')}}" method="POST">
                              @csrf
                              <button  class="p-2 rounded bg-transparent border-0 text-danger" >Logout</button>
                            </form>               
                      </li>
                  </ul> --}}
                </li>
                
              </ul>
        </div>
       
    </nav>
    

    <div class="container-fluid">
        <button id="toggle-side-bar" style="position: fixed;bottom: 20px; left:20px; padding:10px; background-color:#343a40; z-index:10000" class="btn btn-link d-block d-md-none " type="button" >
            <i class="fas fa-bars"></i>
            {{-- ssss --}}
        </button>
        <div class="row">

            <nav class="col-md-2 d-none d-md-block bg-light sidebar  " id="messi">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item h2">
                            <a class="nav-link active" href="{{route('admins.index')}}">
                                <i class="fas fa-chart-line"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item h1">
                            <a class="nav-link" href="{{route('admins.cars')}}">
                                <i class="fas fa-car"></i> Cars
                            </a>
                        </li>
                        <li class="nav-item h1">
                            <a class="nav-link " href="{{route('admins.products')}}">
                                <i class="fas fa-shopping-bag"></i> Products
                            </a>
                        </li>
                        <li class="nav-item h1">
                            <a class="nav-link" href="{{route('admins.brands')}}">
                                <i class="far fa-copyright"></i> Brands
                            </a>
                        </li>
                        @hasanyrole('Admin')
                        <li class="nav-item h1">
                            <a class="nav-link" href="{{route('admins.users')}}">
                                <i class="fa-solid fa-users"></i> Users
                            </a>
                        </li>
                        @endhasanyrole
                        
                        @hasanyrole('Manager')
                        <li class="nav-item h1">
                            <a class="nav-link" href="{{route('admins.reservations')}}">
                                <i class="fa-solid fa-users"></i> Reservations
                            </a>
                        </li>
                        @endhasanyrole
                    </ul>
                </div>
                
            </nav>
            
            

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                    <h1 class="h2">@yield('page-title')</h1>
                </div>
                {{$slot}}
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>

    <script>
const dropdownMenu = document.querySelector('.dropdown-menu');
const dropdownToggle = document.querySelector('.dropdown-toggle');

dropdownToggle.addEventListener('click', () => {
  dropdownMenu.classList.toggle('show');
});

document.addEventListener('click', (event) => {
  if (!dropdownToggle.contains(event.target)) {
    dropdownMenu.classList.remove('show');
  }
});

        function toggleSidebar() {
            var sidebar = document.getElementById("messi");
            sidebar.classList.toggle("active-messi");
        }
        document.getElementById('toggle-side-bar').addEventListener("click", function() {
            // document.getElementById("demo").innerHTML = "Hello World";
            console.log('messi');
            // toggleSidebar();
            var sidebar = document.getElementById("messi");
            sidebar.classList.toggle("active-messi");
            sidebar.classList.toggle("d-none");
        });
    </script>


</body>
</html>