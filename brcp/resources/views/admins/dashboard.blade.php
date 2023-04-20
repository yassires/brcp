<x-dash>
@section('title')
    Dashboard
@endsection
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
                <p class="total_no">{{count($users)}}</p>
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

{{---------tables---------}}
<div class="row flex-wrap my-4  w-100">
   {{---------Cars table---------}}

   <div class="col-md-8 pb-5">
      
       <div class="card shadow ">
         <h2 class="p-4">Recent Cars</h2>
           @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="card-body">
               <div class="overflow-auto">
                   <table class="table" id="example2">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Brand</th>
                           <th>Category</th>
                           <th>Name</th>
                           <th>price for rent</th>
                           <th>price for sell</th> 
                           <th>Availability</th> 
                           <th>image</th> 
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($car as $car)
                       <tr>
                           <td>{{$car->id}}</td>
                           <td>{{$car->Brand->name}}</td>
                           <td>{{$car->Category->name}}</td>
                           <td>{{$car->name}}</td>
                           <td>{{$car->price_rent}}</td>
                           <td>{{$car->price_sell}}</td>
                           <td>
                               @if ($car->available)
                                   <span class="badge bg-success">
                                       Available
                                   </span>
                               @else
                                   <span class="badge bg-warning">
                                       Reserved
                                   </span>
                               @endif
                           </td>
                           <td>
                               <img src="{{asset($car->image)}}"
                               width="60"
                               height="60"
                               class="img-fluid rounded"
                               alt=" car image">
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
               </div>
               
           </div>
       </div>
   </div>

   
   {{-- Users table --}}
   <div class="col-md-4">
      
      <div class="card shadow">
         <h2 class="p-4">Recent Users </h2>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="card-body">
              <table class="table" id="example1">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Role</th>
                          <th>image</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                      <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{ $user->getRoleNames()[0]}}</td>
                          <td>
                              <img src="{{asset($user->image)}}"
                              width="60px"
                              height="60px"
                              class="img-fluid rounded"
                              alt="">
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>


   {{---------Product table---------}}
   <div class="col-md-6">
      <div class="card shadow">
         <h2 class="p-4">Recent Products</h2>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="card-body">
              <div class="overflow-auto">
                  <table class="table" id="example3">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Price</th> 
                          <th>Description</th> 
                          <th>Quantity</th> 
                          <th>image</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($product as $product)
                      <tr>
                          <td>{{$product->id}}</td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->price}}</td>
                          <td>{{$product->description}}</td>
                          <td>{{$product->quantity}}</td>
                          <td>
                              <img src="{{asset($product->image)}}"
                              width="60px"
                              height="60px"
                              class="img-fluid rounded"
                              alt="">
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              </div>
              
          </div>
      </div>
  </div>

</div>


</x-dash>