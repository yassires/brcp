<x-dash>
    @section('title')
    Dashboard | Cars        
    @endsection

  {{---------Cars table---------}}
   
   {{-- message --}}
   <div class="">
    <div class="col-md-6 mx-auto my-4">
        @include('includes.messages')
    </div>
    </div>
    {{-- message --}}


<div class="my-4  w-100">
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
            <div class="overflow-auto">
                <table class="table" id="example2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Car</th>
                        <th>Pick-up Date</th>
                        <th>Drop-off Date</th>
                        <th>Price</th> 
                        <th>Created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservation as $reservation)
                    <tr>
                        <td>{{$reservation->id}}</td>
                        <td>{{$reservation->user->name}}</td>
                        <td>{{$reservation->car->name}}</td>
                        <td>{{$reservation->rent_date_start}}</td>
                        <td>{{$reservation->rent_date_end}}</td>
                        <td>{{$reservation->price_rent}}</td>
                        <td>{{$reservation->created_at}}</td>

                        <td class="d-flex flex-row justify-content-center">
                            <div class="pe-3">
                                <a href="{{route('reservations.edit',$reservation->id)}}" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></a>
                            </div>
                            <form action="{{route('reservations.destroy',$reservation->id)}}" method="POST">
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


<!-- Modal -->
<div class="modal fade me-auto" id="editReservation" tabindex="-1" aria-labelledby="editReservation" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="editReservation">edit reservation</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body ">
        <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group pt-2">
                <label for="">Availability</label>
                <select class="form-control" name="available" id="">
                    <option value="1" selected disabled>Select an option</option>
                    <option value="1">Available</option>
                    <option value="0">Reserved</option>
                </select>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning">Edit</button>
              </div>
        </form>
    </div>
    
  </div>
</div>
</div>

</x-dash> 