@extends('_admin.layouts.app') 
@section('title', 'Manager Create') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Add manager</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Manager</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-8 col-sm-12 card">
            <h3 class="card-title">Create Manager</h3>
            <div class="col-md-7 col-sm-11 card-body">
                <form action="{{url('create_manager')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Manager Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Manager Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Manager email</label>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Manager email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" required>
                        <small>Manager Must use this password</small>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Phone Number</label>
                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Manager's Phone number " required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Manager's address" required>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Manager's birthday " required>
                    </div>
                    <div class="form-group">
                       <select name="gender" class="form-control">
                          
                           <option value="1">Male</option>
                           <option value="2">Female</option>
                           <option value="3">Other</option>
                       </select>

                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection