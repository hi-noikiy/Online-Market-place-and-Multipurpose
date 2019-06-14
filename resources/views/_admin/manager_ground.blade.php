@extends('_admin.layouts.app') 
@section('title', 'Send Message') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Manager ground</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Manager Ground </li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
       
            @if($managers)
                 @foreach($managers as $manager)
                 @php
                     $admin=App\Manager::find($manager->id)->admin;
                 @endphp
                    <div class="col-md-2 col-sm-2 float-left" style="background:white;padding:4px">
                        <div>
                            <img src="{{asset('admin_upload/admin_pic/'.$admin->image)}}" style="border-radius:10%;diplay:block" height="50px" width="50px" alt="">
                        </div>
                        <h3>Name: {{$admin->name}}</h3>
                        <small>Email: {{$admin->email}}</small>
                        <br>
                        <h6>Mobile: {{$admin->mobile}}</h6>
                        <address>Address: {{$admin->address}}</address>
                        <p>BirthDay: {{$admin->birthday}}</p>
                        <p>
                            Created: {{$admin->created_at}}
                            @if($manager->status==1)
                            <h6>Status: <span class="badge badge-success">Active</span></h6>
                            @else
                             <h6>Status: <span class="badge badge-danger">Deactive</span></h6>
                            @endif
                        </p>
                        <br>
                        <div class="card-body">
                            <p>
                                <a href="{{url('Delete_admin_manager/'.$manager->id)}}" class="btn btn-danger btn-sm col-md-12">Delete this Admin</a>
                                <a  type="button" class="btn btn-warning btn-sm col-md-6" data-toggle="modal" data-target="#exampleModal" >Edit</a>
                               
                               
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Manager</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{url('edit_manager/'.$manager->id)}}" method="POST" id="frm">
                                        @csrf
                                        <div class="form-group">
                                            <label for=""> Put a new Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$admin->name}}" >
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Put a new Email</label>
                                            <input type="text" class="form-control" name="email" value="{{$admin->email}}" >
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Put a  new Password</label>
                                            <input type="password" class="form-control" name="password" >
                                            <small>
                                                <label for="pin">Genereate a new PIN</label>
                                                <input type="checkbox" id="pin" name="pin" value="true">
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Put a  new Address</label>
                                            <input type="text" class="form-control" name="address" >
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Put a new Mobile</label>
                                            <input type="text" class="form-control" name="mobile" >
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Put a  new birthday</label>
                                            <input type="date" class="form-control" name="birthday" >
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="0">Deactive</option>
                                                <option value="1">Active</option>
                                                
                                            </select>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="sub()">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                {{-- modal --}}
                               
                                <a href="{{url('See_activities_manager/'.$manager->id)}}" class="btn btn-success btn-sm col-md-6">See Activities</a>
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
                {{ $managers->links() }}
          

       
    </div>
</div>
<script>
function sub(){
    
    $('#frm').submit();
}

</script>
@endsection