@extends('_admin.layouts.app') 
@section('title', 'General User') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">General User</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">general user</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                 <table class="table table-bordered" id="general_user-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>mobile</th>
                            <th>Status</th>
                            <th>created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
$(function() {
    $('#general_user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get_manage_general_user') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'mobile', name: 'mobile' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', searchable: false },
        ]
    });
});
</script>
<script>
 function delete_general_user(id){
     //console.log(id);
      $.ajax({
            type: 'get',
            url : '{{URL::to('delete_general_user')}}',
            data:{'id':id },
            success:function(data){
                  swal("deleted!",  data.status);
                 location.reload();
                // console.log('success');
            }
        })
 }
</script>
@endpush