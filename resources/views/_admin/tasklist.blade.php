@extends('_admin.layouts.app') 
@section('title', 'TaskList') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Skill</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Skill</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">SI</th>
                            <th scope="col">Name</th>
                            <th scope="col">Permission tag</th>
                                                 
                            </tr>
                        </thead>
                        <tbody>
                            @if($task_list)
                            @php
                                $si=1;
                            @endphp
                               @foreach($task_list as $task)
                               <tr>
                                <th scope="row">{{$si}}</th>
                                <td>{{$task->name}}</td>
                                <td>{{$task->permission_tag}}</td>
                               
                                </tr>
                                @php
                                    $si++;
                                @endphp
                               @endforeach
                            @endif   
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection