@extends('_admin.layouts.app') 
@section('title', 'Manage Freelancer') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Manage Freelancer</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Freelancer</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                 <table class="table table-bordered" id="freelancer-user">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Details</th>
                           
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
    $('#freelancer-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('get_manage_freelancer_user') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', searchable: false },
        ]
    });
});
</script>

@endpush