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
    
    <div class="card shadow">
        <h1 class="p-4">Reservations</h1>
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
                        <th>Status</th> 
                        <th>Created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        {{-- @php
                            dd($reservation->user->name);
                        @endphp --}}
                        <td>{{$reservation->id}}</td>
                        <td>{{$reservation->user->name}}</td>
                        <td>@if ($reservation->car){{$reservation->car->name}}@else Car Unavailable @endif</td>
                        <td>{{$reservation->rent_date_start}}</td>
                        <td>{{$reservation->rent_date_end}}</td>
                        <td>{{$reservation->price_rent}}</td>
                        <td>{{$reservation->created_at}}</td>
                        <td>{{$reservation->status}}</td>

                        <td class="d-flex flex-row justify-content-center">
                            <div class="pe-3">
                                <a href="#modal-reservation" data-bs-toggle="modal"  onclick="editReservation('{{ $reservation->id }}' , '{{ $reservation->status}}')" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></a>
                            </div>
                            <form action="{{route('reservation.destroy',$reservation->id)}}" method="POST">
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


<!-- MODAL -->
<div class="modal fade" id="modal-reservation" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="/reservation/update" method="POST" id="form" >
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="modal-title">Reservation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            {{-- Hidden input --}}
            <input id="reservation-id" hidden name="id" type="text">

          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label" >Status</label>
                <select name="status"  class="form-select" aria-label="Default select example">
                    <option value="Accepted" id="Accepted">Accepted</option>
                    <option value="Pending" id="Pending" >Pending</option>
                    <option value="Rejected" id="Rejected">Rejected</option>
                </select>                  
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary" >Cancel</button>
            <button type="submit" name="update" class="btn btn-warning task-action-btn" id="update">Update</button>
          </div>
        </form>
      </div>
    </div>
</div>



<script>
    function editReservation(id , status) {
        document.getElementById(status).setAttribute('selected' , 'n3as');
        document.getElementById('reservation-id').value = id;
    }
    
</script>


</x-dash> 