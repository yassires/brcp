<x-dash>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js%22%3E"> </script>
    {{---------Users table---------}}
    <div class="row my-4">
       <div class="col-md-12">
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
                               <th>Role</th>
                               <th>image</th> 
                               <th>Action</th>
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
                               <td class="d-flex flex-row justify-content-center">
                                   
                                   <div class="pe-3">
                                    <a type="button" onclick="editRole({{ $user->id }})" class="btn btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#role">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                   </div>
                                   <form action="" method="POST">
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
   
       

   <!--User Modal -->
<div class="modal fade" id="role" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route ('assign.role')}}" method="POST" id="form" data-parsley-validate>
          @csrf
          @method('PUT')

          <div class="modal-header">
            <h5 class="modal-title" id="modal-title">Roles</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          {{-- Hidden input --}}
          <input id="user-id" hidden name="user_id" type="text">

          <div class="modal-body">
              <div class="mb-3">
                <label class="form-label" >Role</label>
                <select name="role" class="form-select" aria-label="Default select example">
                  <option  selected disabled >Open this select menu</option>
                  <option value="Admin">Admin</option>
                  <option value="Manager">Manager</option>
                  <option value="User">User</option>
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
    function editRole(id) {
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let role = xhr.responseText;
                
                console.log(role);
                // Condition that selects the option in role update
                    document.querySelector('#role [name=role] option[value="'+role+'"]').selected = true;
               
                    document.querySelector('#role #user-id').value = id;
                
            }
        }
        xhr.open("GET", "users/"+id, true);
        xhr.send();
    }
    
</script>
</x-dash>
   