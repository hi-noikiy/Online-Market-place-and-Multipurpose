@extends('_admin.layouts.app') 
@section('title', 'Category') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Category</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">

        <!-- /row -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Category List</h4>
                    </div>

                    <div class="card-body">
                        {{-- Add btn --}}
                        <div style="padding-bottom:2%">
                            <button type="button" class="btn btn-primary" onclick="addCategory()">
                                <i class="glyphicon glyphicon-plus"></i> Add New
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="category-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Icon</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th style="width:19%; text-align: center">Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /row -->

        {{-- Add form --}}
        <div class="modal fade" id="addModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add New Category</h4>
                    </div>
                    <form role="form" data-toggle="validator" id="addForm">
                        <div class="modal-body">
                            {{-- Message --}}
                            <div class="alert alert-danger" id="messageDiv">
                                <div id="message"></div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" name="slug" required>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon:</label>
                                <input type="text" class="form-control" name="icon" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Type:</label>
                                <select class="form-control" name="type">
                                      <option value="1">Freelancer</option>
                                      <option value="2">Pro</option>
                                      <option value="3">Job</option>
                                      <option value="4">Scholarship</option>
                                      <option value="5">Courses</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" name="status">
                                      <option value="1">Active</option>
                                      <option value="2">In-Active</option>
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" onclick="saveCategory()">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{-- Update form --}}
        <div class="modal fade" id="updateModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Category</h4>
                    </div>
                    <form role="form" data-toggle="validator" id="updateForm">
                        <div class="modal-body">
                            {{-- Message --}}
                            <div class="alert alert-danger" id="messageDivUpdate">
                                <div id="messageUpdate"></div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="hidden" class="form-control" name="id" id="id">
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" name="slug" id="slug" required>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon:</label>
                                <input type="text" class="form-control" name="icon" id="icon" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Type:</label>
                                <select class="form-control" name="type" id="type">
                                      <option value="1">Freelancer</option>
                                      <option value="2">Pro</option>
                                      <option value="3">Job</option>
                                      <option value="4">Scholarship</option>
                                      <option value="5">Courses</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select class="form-control" name="status" id="status">
                                          <option value="1">Active</option>
                                          <option value="2">In-Active</option>
                                    </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" onclick="updateCategory()">Update</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
 @push('scripts')
    <script type="text/javascript">
        $(function(){
        getCategories();
    })
    </script>

    <script src="{{asset('_admin/pages/category.js')}}"></script>    
@endpush