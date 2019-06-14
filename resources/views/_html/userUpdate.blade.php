@extends('_html.layouts.app') 
@section('title', 'My Profile') 
@section('content')

<style type="text/css">
    .datepicker,
    .table-condensed {
        width: 350px;
        height: 350px;
    }
</style>

<div class="clearfix"></div>

<!-- Header Title Start -->
<section class="inner-header-title blank">
    <div class="container">
        <h1>Update Resume</h1>
    </div>
</section>
<div class="clearfix"></div>

<form id="addForm">
    <!-- General Detail Start -->
    <div class="section detail-desc">
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
                        <input type="text" class="form-control" name="name" value="{{$data['info']->name}}" placeholder="Your Name" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="professionTitle" value="{{$data['info']->designation}}" placeholder="Professional Title"
                            required>
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
                    <textarea class="form-control" name="note" placeholder="About Notes">{{$data['info']->note}}</textarea>
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

    <!-- full detail SetionStart-->
    <section class="full-detail">
        <div class="container">
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">General Information</h2>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" value="{{$data['info']->email}}" name="email" placeholder="Email Address" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" class="form-control" value="{{$data['info']->mobile}}" name="phone" placeholder="Phone Number" required>
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
                        <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                        <input type="date" class="form-control" name="dob" placeholder="Date of birth" required>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <select class="form-control input-lg" id="country" name="country" onchange="getCities()" required>
                                <option value="">Select Region</option>
                                @foreach($data['countries'] as $country)
                                <option value="{{$country->id}}" {{$country->id == $data['info']->country  ? 'selected' : ''}}>{{$country->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <select class="form-control input-lg" id="city" name="city" required>
                            <option>Select City</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Social Profile</h2>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                        <input type="text" class="form-control" name="facebook" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                        <input type="text" class="form-control" name="google" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                        <input type="text" class="form-control" name="twitter" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                        <input type="text" class="form-control" name="instagram" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                        <input type="text" class="form-control" name="linkedin" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                        <input type="text" class="form-control" name="dribbble" placeholder="Profile Link">
                    </div>
                </div>
            </div>

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Resume Content</h2>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" rows="10" placeholder="About Your Self" required></textarea>
                    </div>
                </div>
            </div>

            {{-- Education --}}
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Add Education</h2>

                {{-- Exist --}}                
                {{-- New form --}}
                <div class="extra-field-box">
                    <div class="multi-box">
                        <div class="dublicat-box">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="school_name[]" placeholder="School Name">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group input-group">
                                    <select class="form-control input-lg" name="qualification_id[]">
                                        <option value="">Qualification</option>
                                        @foreach($data['qualifications'] as $qualification)
                                        <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Date From</span>
                                    <input type="date" class="form-control" name="edu_from_date[]">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Date To</span>
                                    <input type="date" class="form-control" name="edu_to_date[]">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" rows="4" placeholder="Notes" name="edu_note[]"></textarea>
                            </div>

                            <button type="button" class="btn remove-field">Remove</button>
                        </div>
                    </div>

                    <button type="button" class="add-field">Add field</button>
                </div>
            </div>

            {{-- Expericence --}}
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Add Experience</h2>
                <div class="extra-field-box">
                    <div class="multi-box">
                        <div class="dublicat-box">
                            <div class="col-md-12 col-sm-12">
                                <input type="text" class="form-control" name="exp_employee[]" placeholder="Employer">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <input type="text" class="form-control" name="exp_position[]" placeholder="Position, e.g. Web Designer">
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Date From</span>
                                    <input type="date" name="exp_start[]" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Date To</span>
                                    <input type="date" name="exp_end[]" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" rows="4" name="exp_note[]" placeholder="Notes"></textarea>
                            </div>

                            <button type="button" class="btn remove-field">Remove</button>
                        </div>
                    </div>
                    <button type="button" class="add-field">Add field</button>
                </div>
            </div>

            {{-- Skills --}}
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Add Skills</h2>
                <div class="extra-field-box">
                    <div class="multi-box">
                        <div class="dublicat-box">

                            <div class="col-md-12 col-sm-12">
                                <select class="form-control input-lg" name="skill[]">
                                        <option value="">Skills</option>
                                        @foreach($data['skills'] as $skill)
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon">%</span>
                                    <input type="text" class="form-control" name="skill_percentage[]" placeholder="85%">
                                </div>
                            </div>

                            <button type="button" class="btn remove-field">Remove</button>
                        </div>
                    </div>
                    <button type="button" class="add-field">Add field</button>
                </div>
            </div>
        </div>
    </section>
    <!-- full detail SetionStart-->

    {{-- Button --}}
    <div class="col-md-12">
        <button type="submit" class="btn btn-success btn-primary small-btn">Update Profile</button>
    </div>

</form>
<!-- full detail SetionStart-->
@endsection
 @push('scripts')
<script>
    $(function(){
        var cityId = "{{ $data['info']->location }}";        
        getCities(cityId);
     })

</script>
<script type="text/javascript " src="{{asset( '_html/pages/users.js')}} "></script>




@endpush