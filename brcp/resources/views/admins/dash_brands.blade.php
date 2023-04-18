 <x-dash>
 {{---------Brands table---------}}
 <div class="row my-4">
    <div class="col-md-12">
        <div class="form-group">
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addBrand">
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
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>image</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>
                                <img src="{{asset($brand->image)}}"
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
                                    <a href="{{route('Brands.edit',$brand->id)}}" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></a>
                                </div>
                                <form action="{{route('Brands.destroy',$brand->id)}}" method="POST">
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


    <!--Brand Modal -->
    <div class="modal fade me-auto" id="addBrand" tabindex="-1" aria-labelledby="addbrand" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addBrand">Add Brand</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('Brands.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">name</label>
                        <input type="text" name="name"
                        id="" class="form-control"
                        placeholder="name">
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
