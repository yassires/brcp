@extends('layouts.master')
@section('title')
   RBCP | Edit Brand
@endsection

@section('content')
    <div class="container-fluid">
        <h1>EDIT</h1>
        <div class="row my-5">
            <div class="col-md-12 mx-auto">
                <div class="card bg-light">
                    <h3 class="card-header">
                        Edit  Brand
                    </h3>
                    <div class="card-body">
                        <form action="{{route('Brands.update',$brand->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            {{method_field('put')}}
                            <input type="hidden" name="id" value="{{$brand->id}}">
                            <div class="form-group">
                                <label for="">name</label>
                                <input type="text" name="name"
                                value="{{$brand->name}}"
                                id="" class="form-control"
                                placeholder="name" required>
                            </div>
                            <div class="form-group">
                                <img src="/{{$brand->image}}" width="100" height="100" alt="" class="img-fluid rounded">
                                <label for="">Image</label>
                                <input type="file" name="image"
                                id="" class="form-control"
                                >
                            </div>
                            <div class="modal-footer my-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection