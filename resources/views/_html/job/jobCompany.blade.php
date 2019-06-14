@extends('_html.layouts.app') 
@section('title', 'Job|Create Company') 
@section('content')

<div class="clearfix"></div>

<!-- Header Title Start -->
<section class="inner-header-title blank">
    <div class="container">
        <h1>Create Company</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Header Title End -->

<!-- General Detail Start -->
<form id="addForm">
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
            <div class="alert" id="freelancerMessage"></div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="company_name" placeholder="Company Name" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tag" placeholder="Company Tagline" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <select class="form-control input-lg" name="category" required>
                            <option value="">All Categories</option>
                            @foreach($data['categories'] as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="ceo_name" placeholder="Company CEO Name" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="password" class="form-control" name="re_password" data-match="#password" placeholder="Re Password" required>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="4" placeholder="Company Description"></textarea>
                    </div>
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
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Company Information</h2>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input type="text" class="form-control" name="website" placeholder="Website Address">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" class="form-control" placeholder="Local E.g. It Park New">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                        <input type="date" class="form-control" name="dob">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <input type="text" class="form-control" name="employees" placeholder="Employee E.g. 100-2500">
                    </div>
                </div>
            </div>

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Social Profile</h2>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                        <input type="text" class="form-control" name="facebook" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                        <input type="text" class="form-control" name="google" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                        <input type="text" class="form-control" name="twitter" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                        <input type="text" class="form-control" name="instagram" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                        <input type="text" class="form-control" name="linkedin" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                        <input type="text" class="form-control" name="dribble" placeholder="Profile Link">
                    </div>
                </div>
            </div>

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">About Company</h2>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group input-group">
                        <textarea class="textarea form-control" name="about_company" placeholder="About Company"></textarea>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success btn-primary small-btn" onclick="createProfile()">Create Company</button>
                </div>

            </div>
        </div>
    </section>
</form>
<!-- Basic Full Detail Form End -->
@endsection
@push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/company.js')}}"></script>
@endpush