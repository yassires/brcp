<x-dash>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> --}}

<div class="row column1">
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa fa-user" style="color: #252525;"></i>
             </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">{{$user}}</p>
                <p class="head_couter">Users</p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa-solid fa-car" style="color: #252525;"></i>
            </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">{{count($car)}}</p>
                <p class="head_couter">Cars</p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa-solid fa-bag-shopping" style="color: #252525;"></i>
             </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">{{count($product)}}</p>
                <p class="head_couter">Products</p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa-regular fa-copyright" style="color: #252525;"></i>
             </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">{{count($brand)}}</p>
                <p class="head_couter">Brands</p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa-solid fa-file-invoice" style="color: #252525;"></i>
             </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">{{count($reservation)}}</p>
                <p class="head_couter">Reservations</p>
             </div>
          </div>
       </div>
    </div>
 </div>






   





    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    // $(document).ready(function () {
    // $('#example2').DataTable();
    // $('#example3').DataTable();
    // });
    // function toggleSidebar() {
    //     var sidebar = document.getElementById("messi");
    //     sidebar.classList.toggle("active-messi");
    // }
    // document.getElementById('toggle-side-bar').addEventListener("click", function() {
    //     // document.getElementById("demo").innerHTML = "Hello World";
    //     console.log('messi');
    //     toggleSidebar();
    // });
  </script>

</x-dash>