<x-dash>
    @section('title')
        Dashboard | Products        
    @endsection
    {{---------Products table---------}}
    
    <div class="">
        <div class="col-md-6 mx-auto my-4">
            @include('includes.messages')
        </div>
    </div>
    <div class="my-4">
        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addProduct">
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
                                <th>Action</th>
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
                                <td class="d-flex flex-row justify-content-center">
                                    {{-- @php
                                        dd($brand->id);
                                    @endphp --}}
                                    <div class="pe-3">
                                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning "><i class="fa fa-edit"></i></a>
                                    </div>
                                    
                                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
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
    </div>

    <!-- Products Modal -->
    <div class="modal fade me-auto" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addProduct">Add Product</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name"
                        id="" class="form-control"
                        placeholder="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price"
                        id="" class="form-control"
                        placeholder="500$" step="any" required>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description"
                        id="" class="form-control"
                        placeholder="Description....." required>
                    </div>

                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity"
                        id="" class="form-control"
                        placeholder="12.." required>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image"
                        id="" class="form-control"
                        required>
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