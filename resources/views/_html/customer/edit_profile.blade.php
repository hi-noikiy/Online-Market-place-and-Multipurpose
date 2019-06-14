@extends('_html.layouts.app') 
@section('title', 'Edit Profile') 
@section('content')






<!-- Title Header Start -->
<section class="">
    <div class="container">

        <h2>Edit Personal Profile</h2>
        <p>Give best information for good business.</p>

    </div>
</section>
<div class="clearfix"></div>
@php
    // $user=App\User::find($id);
//      if($user->user_type==3){
//     $freelancer=App\Freelancer::where('user_id',$user->id)->first();
//     $cat=App\Category::where('type',2)->get();
//     $gig=App\Gig::where('freelancer_id',$freelancer->id)->get();
//   } elseif ($user->user_type==4) {
//     $freelancer=App\Pro::where('user_id',$user->id)->first();
//      $cat=App\Category::where('type',3)->get();
//     $gig=App\Gig::where('freelancer_id',$freelancer->id)->get();
//   } 
  $gender=['sss','Male','Female','Other'];
  $availability=['Permanant','Part Time','Intern','Temporary'];
@endphp
   
    <!-- General Detail Start -->
    <div class="section detail-desc">
        <div class="container white-shadow">
            <form action="{{url('save_profile_image')}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="row">
                    <div class="detail-pic js">
                        <div class="box">
                        
                            <img id="blah" src="{{asset('uploads/user/'.$customer->profile_image)}}" alt="">
                             <label for="upload-pic" id="show_img" style="display:none">
                                <i class="fa fa-upload float-left" aria-hidden="true"></i>
                                <input type="submit" value="Click to Save the picture." class="btn-success float-left">
                            </label>
                        </div>
                    </div>
                </div>
                <input type="file" name="image" id="imgInp" class="form-control">
                <input type="hidden" name="type" value="customer">
               
            </form>
{{-- <form id="form1" runat="server">
  <input type='file' id="imgInp" />
  <img id="blah" src="#" alt="your image" />
</form> --}}

           

            {{-- Message --}}
            <form id="addForm">
            <div class="alert" id="freelancerMessage"></div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Name</label>
                        <h6>{{$user->name}}</h6>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <h6>{{$user->email}}</h6>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Mobile</label>
                        <h6>{{$user->mobile}}</h6>
                    </div>
                </div>
                @if($customer->gender)
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Gender</label>
                        <h6>{{$gender[$customer->gender]}}</h6>
                    </div>
                </div>
                @endif
                @if($customer->age)
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Age</label>
                        <h6>{{$customer->age}}</h6>
                    </div>
                </div>
                @endif
                {{-- @if($freelancer->availability)
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label for="">Type</label>
                        <h6>{{$availability[$freelancer->availability]}}</h6>
                    </div>
                </div>
                @endif --}}


            </div>

           
        </div>
    </div>
    <!-- General Detail End -->

    <!-- full detail SetionStart-->
    <section class="full-detail">
        <div class="container">
            <div class="row bottom-mrg extra-mrg">
                 <h2 class="detail-title">Basic Information</h2>
                <div class="col-md-6 col-sm-6">
                    <h6 for="">Your Birthdate</h6>
                      <input name="birtdate" type="date" id="birthdate" value="{{$customer->birthday}}" placeholder="Birth day" class="form-control">
               
                    {{-- <h6>Your Type</h6>
                    <select class="form-control input-lg" id="" name="availability" >
                        <option value="">Your Type</option>
                    
                        <option value="0">Permanent</option>
                        <option value="1">Part Time</option>
                        <option value="2">Intern</option>
                        <option value="3">Temporary</option>
                        
                    </select> --}}
                    {{-- @if($freelancer->availability!=null)
                    <small>{{$availability[$freelancer->availability]}}</small>
                    @endif --}}
                 </div> 
                 <div class="col-md-6 col-sm-6">
                    {{-- <h6>Hourly Rate</h6>
                    <input type="number" name="hourly_rate" class="form-control" placeholder="Hourly Rate" value="{{$freelancer->hourly_rate}}">
                    <small>You would like to charge for every hour</small> --}}
                    @if($customer->gender==null)
                    <h6>Gender</h6>
                    <label for="1">Male</label>
                    <input type="radio" name="gender" value="1">
                    <label for="2">Female</label>
                    <input type="radio" name="gender" value="2" >
                    <label for="3">Other</label>
                    <input type="radio" name="gender" value="3" >
                    @endif
                 </div>
            </div>
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Description About You</h2>

                <div class="col-md-6 col-sm-6">
                    <h6 for="">Short Description About Yourself</h6>
                    <textarea name="short_description" id="short_description" class="form-control" rows="10">
                        {{$customer->short_description}}
                    </textarea>
                    
                </div>

                <div class="col-md-6 col-sm-6">
                   <h6 for="">Brief Description About Yourself</h6>
                    <textarea name="long_description" id="long_description" class="form-control" rows="10">
                        {{$customer->long_description}}
                    </textarea>
                </div>

                <div class="col-md-12 col-sm-12">
                    <label for="">Your Designation</label>
                    <input type="text" class="form-control" name="designation" placeholder="Designation">
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <select class="form-control input-lg" id="country" name="country" >
                                <option value="">Select Region</option>
                                @php
                                    $country=App\Country::all();
                                @endphp
                                <option>Select Country</option>
                                @foreach($country as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                 <div class="col-md-12 col-sm-12">
                    <label for="">Zip</label>
                    <input type="text" class="form-control" name="zip" placeholder="zip code">
                </div>
                 <div class="col-md-12 col-sm-12">
                    <label for="">Your state</label>
                    <input type="text" class="form-control" name="state" placeholder="State">
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                        <input name="address" type="text" id="address" placeholder="Type Address" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Social Profile</h2>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                        <input type="text" class="form-control" id="google" name="google" placeholder="Profile Link">
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Profile Link">
                    </div>
                </div>

                {{-- <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Profile Link">
                    </div>
                </div> --}}

                <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Profile Link">
                    </div>
                </div>

                {{-- <div class="col-md-6 col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                        <input type="text" class="form-control" id="dribbble" name="dribbble" placeholder="Profile Link">
                    </div>
                </div> --}}
            </div>

          
            {{-- Education --}}
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Add Education</h2>
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
                                        @php
                                            $qualification=App\Qualification::all();
                                        @endphp
                                        @if($qualification)
                                            @foreach($qualification as $qualification)
                                            <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                            @endforeach
                                        @endif
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
                <h2 class="detail-title">Language</h2>
                <div class="extra-field-box">
                    <div class="multi-box">
                        <div class="dublicat-box">

                            <div class="col-md-12 col-sm-12">
                                <select class="form-control input-lg" name="language[]">
                                        <option value="">Language</option>
                                        @php
                                            $language=App\Language::where('status',1)->get();
                                        @endphp
                                        @if($language)
                                            @foreach($language as $language)
                                            <option value="{{$language->id}}">{{$language->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
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
        <button type="submit" class="btn btn-success btn-primary small-btn" onclick="editProfile()" >Confirm and Save</button>
    </div>

</form>
<script>

func tion editProfile() {
    $('#addForm').validator().on('submit', function(e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else { // everything looks good!
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: baseUrl + "customer/editProfile",
                data: $('#addForm').serialize(),
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                       location.reload();
                        $("#freelancerMessage").removeClass('alert-danger').addClass('alert-success');
                    } else {
                        $("#freelancerMessage").removeClass('alert-success').addClass('alert-danger');
                         location.reload();
                    }

                    $('#freelancerMessage').html(response.message);
                    $('#freelancerMessage').show();
                    $('html, body').animate({
                        scrollTop: $("#addForm").offset().top
                    }, 2000);
                }
            });

        }
    })
}
</script>
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
  $('#show_img').show();
});
</script>
@endsection