@extends('_admin.layouts.app') 
@section('title', 'Action List') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Action List</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Action List</li>
            </ol>
        </div>
    </div>
     <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                 <table class="table table-bordered" id="actionList-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Item Type</th>
                            <th>Item Id</th>
                            <th>Comment</th>
                            <th>Manager At</th>
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
    $('#actionList-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get_see_activities') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'item_type', name: 'item_type' },
            { data: 'item_id', name: 'item_id' },
            { data: 'comment', name: 'comment' },
            { data: 'manager_id', name: 'manager_id' },
            { data: 'action', name: 'action', searchable: false },
        ]
    });
});
</script>
<script>
 function deletereview(id){
     //console.log(id);
      $.ajax({
            type: 'get',
            url : '{{URL::to('delete_review')}}',
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