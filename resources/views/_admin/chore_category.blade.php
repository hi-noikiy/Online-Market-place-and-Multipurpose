@extends('_admin.layouts.app') 
@section('title', 'Chore Category') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Chore Category</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Chore Category</li>
            </ol>
        </div>
    </div>
 

    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="panel">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add a category</button>
            </div>
            <div class="col-md-12 col-sm-12">
                 <table class="table table-bordered" id="chore-category-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Icon</th>
                            <th>Nmae</th>
                            <th>Status</th>
                            <th>Created At</th>                          
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
       {{-- modal --}}

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{url('chore_category')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                            <label for="name"> Name of Category</label>
                            <input type="text" class="form-control" name="name" required>
                       </div>
                       <div class="form-group">
                           <label for="icon"> Icon</label>
                           <input type="file" name="icon" id="icon" class="form-control">

                       </div>
                       <div class="form-group">
                           <input type="submit" value="Save">
                       </div>
                   </form>
                </div>
               
                </div>
            </div>
            </div>
 {{-- end on modal --}}
</div>

@endsection
@push('scripts')
<script>
$(function() {
    $('#chore-category-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('choreCategory.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'icon', name: 'icon',  render: function( data, type, full, meta ) {
                        return "<img src=\"/admin_upload/category/" + data + "\" height=\"50\"/>";
                    }},
            { data: 'name', name: 'name' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', searchable: false },
        ]
    });
});
</script>
<script>
 function delete_chore_category(id){
     //console.log(id);
      $.ajax({
            type: 'get',
            url : '{{URL::to('delete_chore_category')}}',
            data:{'id':id },
            success:function(data){
                  swal("deleted!",  data.status);
                 location.reload();
                // console.log('success');
            }
        })
 }
 function edit_category($id){

 }
</script>
@endpush