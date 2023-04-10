@extends('layouts.master')

@section('content')
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
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade me-auto" id="addCar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Car</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('cars.store')}}" method="POST">
                <div class="form-group">
                    <label for="">Brand</label>
                    <input type="text" name="brand"
                    id="" class="form-control"
                    placeholder="brand">
                </div>
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" name="name"
                    id="" class="form-control"
                    placeholder="name">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="" id="">
                        <option value="" selected disabled>Can you select the Category</option>
                        <option value="1">Diesle</option>
                        <option value="2">Gasoline</option>
                        <option value="3">Electric</option>
                        <option value="4">Hybrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Price for rent</label>
                    <input type="number" name="price_r"
                    id="" class="form-control"
                    placeholder="500$">
                </div>
                <div class="form-group">
                    <label for="">Availability</label>
                    <input type="number" name="availability"
                    id="" class="form-control"
                    placeholder="500$">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    
@endsection