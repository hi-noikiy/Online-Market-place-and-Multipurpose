@extends('_html.layouts.app') 
@section('title', 'Jobs') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Manage Job</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Manage Company List Start -->
<section class="manage-company gray">
    <div class="container">

        <!-- search filter -->
        @auth
        @if(Auth::user()->user_type == 3)
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="search-filter">
                    <div class="col-md-4 col-sm-5">
                        <div class="filter-form">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-success" onclick="addJob()">Add New</button>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
        @endauth
        <!-- search filter End -->

        <div class="row">
            <div id="jobList">
    @include('_html.ajax.jobs')
            </div>

        </div>

    </div>
</section>
<!-- Manage Company List End -->

<!-- Add modal -->
<div id="AddModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Job</h4>
                </div>
                <form id="AddJobForm">
                    <div class="modal-body">
                        <!-- Basic Full Detail Form Start -->
                        <section class="full-detail" style="margin-top:2%;">
                            <div class="container col-md-12">
                                <div class="row bottom-mrg extra-mrg">
                                    {{--
                                    <h2 class="detail-title">Company Info</h2> --}}
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jobTitle" placeholder="Job Title" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control input-lg" name="jobCat" required>
                                        <option value="">Select Job Category</option>
                                        @foreach ($data['categories'] as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control input-lg" name="jobType" required>
                                        <option value="">Select Job Type</option>
                                        <option value="1">Full Time</option>
                                        <option value="2">Part Time</option>
                                    </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="jobSalary" name="jobSalary" placeholder="Salary" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control input-lg" id="location" name="location">
                                            <option value="">Select Location</option>
                                            @foreach ($data['locations'] as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
    
                                        </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Basic Full Detail Form End -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="saveJob()">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
    
        </div>
    </div>
    
    <!-- Edit modal -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Job</h4>
                </div>
                <form id="editJobForm">
                    <div class="modal-body">
                        <!-- Basic Full Detail Form Start -->
                        <section class="full-detail" style="margin-top:2%;">
                            <div class="container col-md-12">
                                <div class="row bottom-mrg extra-mrg">
                                    <input type="hidden" id="id" name="id"> {{--
                                    <h2 class="detail-title">Company Info</h2> --}}
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Job Title" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control input-lg" id="jobCat" name="jobCat" required>
                                        <option value="">Select Job Category</option>
                                        @foreach ($data['categories'] as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control input-lg" id="jobType" name="jobType" required>
                                        <option value="">Select Job Type</option>
                                        <option value="1">Full Time</option>
                                        <option value="2">Part Time</option>
                                    </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="editEndDate" name="endDate" placeholder="End Date" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="editJobSalary" name="jobSalary" placeholder="Salary" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control input-lg" id="editLocation" name="location">
                                            <option value="">Select Location</option>
                                            @foreach ($data['locations'] as $location)
                                            <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                        </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select class="form-control input-lg" id="publicationStatus" name="publicationStatus" required>
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">In-active</option>
                                    </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Basic Full Detail Form End -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="updateJob()">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
    
        </div>
    </div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/jobs.js')}}"></script>
@endpush