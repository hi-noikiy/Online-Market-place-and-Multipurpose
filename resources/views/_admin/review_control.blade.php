@extends('_admin.layouts.app') 
@section('title', 'Review Control') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Review Control</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">review_control</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                 <table class="table table-bordered" id="review-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>giver</th>
                            <th>number</th>
                            <th>comment At</th>
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
    $('#review-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'giver_id', name: 'giver_id' },
            { data: 'number', name: 'number' },
            { data: 'comment', name: 'comment' },
            { data: 'created_at', name: 'created_at' },
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