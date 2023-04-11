@extends('layouts.master')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}">
@section('content')
<div class="row column1">
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa fa-user yellow_color"></i>
             </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">2500</p>
                <p class="head_couter">Welcome</p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa-solid fa-clock red_color"></i>
            </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">123.50</p>
                <p class="head_couter">Average Time</p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa fa-cloud-download green_color"></i>
             </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">1,805</p>
                <p class="head_couter">Collections</p>
             </div>
          </div>
       </div>
    </div>
    <div class="col-md-6 col-lg-3">
       <div class="full counter_section margin_bottom_30">
          <div class="couter_icon">
             <div> 
                <i class="fa-solid fa-comment red_color"></i>
             </div>
          </div>
          <div class="counter_no">
             <div>
                <p class="total_no">54</p>
                <p class="head_couter">Comments</p>
             </div>
          </div>
       </div>
    </div>
 </div>
    <div class="row my-4">
        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addCar">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
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
                                <th>Action</th>
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
                                    <img src="{{$car->image}}"
                                    width="60"
                                    height="60"
                                    class="img-fluid rounded"
                                    alt="">
                                </td>
                                <td class="d-flex flex-row justify-content-center">
                                    <a href="{{route('cars.edit',$car->id)}}" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></a>
                                    <form action="{{route('cars.destroy',$car->id)}}" method="POST">
                                        @csrf
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade me-auto" id="addCar" tabindex="-1" aria-labelledby="addCar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addCar">Add Car</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Brand</label>
                    <select class="form-control" name="brand" id="">
                        <option value="" selected disabled>Can you select the Brand</option>
                        <option value="1">Tesla</option>
                        <option value="2">Porsche</option>
                        <option value="3">Mercedes</option>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" name="name"
                    id="" class="form-control"
                    placeholder="name">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category" id="">
                        <option value="" selected disabled>Can you select the Category</option>
                        <option value="1">Diesle</option>
                        <option value="2">Gasoline</option>
                        <option value="3">Electric</option>
                        <option value="4">Hybrid</option>
                    </select>   
                </div>
                <div class="form-group">
                    <label for="">Color</label>
                    <input type="text" name="color"
                    id="" class="form-control"
                    placeholder="white">
                </div>
                <div class="form-group">
                    <label for="">Price for rent</label>
                    <input type="number" name="price_r"
                    id="" class="form-control"
                    placeholder="500$">
                </div>
                <div class="form-group">
                    <label for="">Price for sell</label>
                    <input type="number" name="price_s"
                    id="" class="form-control"
                    placeholder="500$">
                </div>
                <div class="form-group">
                    <label for="">Availability</label>
                    <select class="form-control" name="available" id="">
                        <option value="" selected disabled>Select an option</option>
                        <option value="1">Available</option>
                        <option value="0">Reserved</option>
                    </select>   
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image"
                    id="" class="form-control"
                    >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
    

@endsection