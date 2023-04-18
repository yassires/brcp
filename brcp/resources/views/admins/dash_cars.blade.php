<x-dash>
   {{---------Cars table---------}}
   <div class="row my-4">
    <div class="col-md-12">
        <div class="form-group">
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addCar">
                <i class="fa fa-plus"></i>
            </button>
        </div>
        <div class="card">
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
                                <img src="{{asset($car->image)}}"
                                width="60"
                                height="60"
                                class="img-fluid rounded"
                                alt=" car image">
                            </td>
                            <td class="d-flex flex-row justify-content-center">
                                <div class="pe-3">
                                    <a href="{{route('cars.edit',$car->id)}}" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></a>
                                </div>
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
                        @foreach ($brand as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                        
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
                    <input type="number" name="price_rent"
                    id="" class="form-control"
                    placeholder="500$">
                </div>
                <div class="form-group">
                    <label for="">Price for sell</label>
                    <input type="number" name="price_sell"
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
</x-dash>    