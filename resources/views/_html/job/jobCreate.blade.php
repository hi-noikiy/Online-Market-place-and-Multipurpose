@extends('_html.layouts.app') 
@section('title', 'Job|Publish Job') 
@section('content')

<style type="text/css">
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #dde6ef;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #dde6ef;
    }

    span.select2-selection--single[aria-expanded=true] {
        border: 1px solid #dde6ef;
    }
</style>

<div class="clearfix"></div>

<!-- Header Title Start -->
<section class="inner-header-title blank">
    <div class="container">
        <h1>Create Job</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Header Title End -->

<form id="addForm">

    <!-- General Detail Start -->
    <div class="detail-desc section">
        <div class="container white-shadow">

            <div class="row">
                <div class="detail-pic js">
                    <div class="box">
                        <input type="file" name="upload-pic[]" id="upload-pic" class="inputfile" />
                        <label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="alert" id="jobMessage"></div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="job_title" placeholder="Job Title" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <select class="form-control" name="job_type" required>
                            <option value="">Job Type</option>
                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <select class="form-control" name="category" required>
                            <option value="">All Categories</option>
                            @foreach($data['categories'] as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="number" class="form-control" name="budget" placeholder="Budget" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <select class="form-control" id="country" name="country" onchange="getCities()" required>
                            <option value="">Select Region</option>
                            @foreach($data['countries'] as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <select class="form-control" id="city" name="city" required>
                            <option>Select City</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" rows="5" placeholder="Job Description"></textarea>
                </div>
            </div>

            {{--
            <div class="row no-padd">
                <div class="detail pannel-footer">
                    <div class="col-md-12 col-sm-12">
                        <div class="detail-pannel-footer-btn pull-right">
                            <a href="#" class="footer-btn choose-cover">Choose Cover Image</a>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
    <!-- General Detail End -->

    <!-- Basic Full Detail Form Start -->
    <section class="full-detail">

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="usr">Skills:</label>
                        <select class="form-control" id="skills" name="skills[]" multiple="multiple">
                            @foreach($data['skills'] as $skill)
                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--
                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="usr">Freelancer Type:</label>
                        <select class="form-control" name="freelancer_type" required>
                            <option value="">Freelancer Type</option>
                            <option value="1">Freelancer</option>
                            <option value="2">Pro</option>
                        </select>
                    </div>
                </div> --}}

                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="usr">Start Date:</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="usr">End Date:</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="form-group">
                        <label for="usr">Experience:</label>
                        <select class="form-control" id="experience" name="experience">
                            <option value="">Select Experience</option>
                            <option value="1">1 Year</option>
                            <option value="2">2 Years</option>
                            <option value="3">3 Years</option>
                            <option value="4">4 Years</option>
                            <option value="5">5+ Years</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Job Requirement</h2>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control textarea" placeholder="Job Requirement" name="job_requrirement"></textarea>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success btn-primary small-btn" onclick="saveJob()">Create Project</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Full Detail Form End -->
</form>
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/jobs.js')}}"></script>

@endpush