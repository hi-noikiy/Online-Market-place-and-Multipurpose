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
        @php
            $category=App\JobCategory::find($id);
        @endphp

    <div class="container-fluid">
        <div class="card">
            <form action="{{url('freelancer_pro_category_edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$id}}" name="id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" id="name" class="form-control">
                </div>
                <div>
                    <img src="{{asset('admin_upload/category/'.$category->icon)}}" height="50px" width="50px" alt="">
                    <small>Currenty</small>
                </div>
                <h5>For Change</h5>
                <div class="form-group">
                    <label for="icon"> Icon</label>
                    <input type="file" name="icon" id="icon">
                </div>
                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>