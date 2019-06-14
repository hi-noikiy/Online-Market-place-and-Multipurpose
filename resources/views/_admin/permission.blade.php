@extends('_admin.layouts.app') 
@section('title', 'Permission') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Permission</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Permission</li>
            </ol>
        </div>
    </div>
@php
    $manager=App\Manager::all()->where('status',1);
@endphp
    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    @if($manager)
                   
                        @foreach($manager as $manager)
                             @php
                                 $admin=App\Manager::find($manager->id)->admin;
                            @endphp
                            <h3 style="cursor:pointer" onclick="show_table(<?php echo $admin->id; ?>)">{{$admin->name}}</h3>
                                <table class="table" id="table<?php echo $admin->id?>"  style="display:none">   
                                    <thead>
                                        <th>Permission Tag</th>    
                                        <th>Association</th>
                                        <th>Permited</th>
                                       
                                        <th>Action</th>
                                    </thead> 
                                   @foreach($task_list as $list)   
                                   @php
                                   
                                   $per=App\Permission::where('permission_tag',$list->permission_tag)->where('manager_id',$manager->id)->get();
                                 //  echo count($per);
                                   @endphp                     
                                     <tbody>
                                        <tr>
                                            <th scope="row">{{$list->permission_tag}}</th>
                                            <td>{{$list->name}}</td>
                                            @if(count($per)>0)
                                            <td>&#x2714;</td>
                                            @else
                                            <td>&#x2613;</td>
                                            @endif
                                            <form action="{{url('change_permission')}}" method="POST" id="frm<?php echo $list->id;?>">
                                            @csrf
                                            <input type="hidden" name="manager_id" value="{{$manager->id}}">
                                            <input type="hidden" name="tag" value="{{$list->permission_tag}}">
                                            </form>
                                            <td><button class="btn btn-warning" onclick="chnageper(<?php echo $list->id;?>)">Change Permission</button></td>
                                        </tr>
                                       
                                       
                                    </tbody>
                                    @endforeach
                                </table>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function show_table(id){
    $('#table'+id).show();
}
function chnageper(id){
 $('#frm'+id).submit();    
}
</script>
@endsection