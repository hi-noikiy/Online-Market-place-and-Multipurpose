@extends('_html.layouts.app') 
@section('title', 'CV Edit') 
@section('content')
<!-- Title Header Start -->
@php
    $freelancer=App\Pro::where('user_id',$user->id)->first();
    $gender=['sss','Male','Female','Other'];
    $availability=['Permanant','Part Time','Intern','Temporary'];
    $cv=DB::table('cvs')->where('user_id',$user->id)->first();
   
@endphp
<section class="">
    <div class="container">
        <h2>CV</h2>
          <p>Give best information for good business.</p>
          <div class="well">
              <h5>Cover Image</h5>
             @if($cv)
                <img id="blah" src="{{asset('uploads/user/'.$cv->cover_pic)}}" alt="" height="100px" width="100px" style="item-align:center">
            @else  
                <img id="blah" src="" alt="" height="100px" width="100px" style="item-align:center">
            @endif  
          </div>
    </div>
</section>
<div class="clearfix"></div>
<form action="{{url('Pro/edit_cv/'.urlencode(base64_encode($cv->id)))}}" method="POST" enctype="multipart/form-data"> 
    <!-- General Detail Start -->
    <div class="section detail-desc">
        <div class="container white-shadow">
           
                 @csrf
                <div class="row">
                    <div class="detail-pic js">
                        <div class="box">
                        @if($cv)
                            <img id="blah" src="{{asset('uploads/user/'.$freelancer->profile_image)}}" alt="">
                        @else  
                            <img id="blah" src="" alt="">
                        @endif    
                             <label for="upload-pic" id="show_img" style="display:none">
                                <i class="fa fa-upload float-left" aria-hidden="true"></i>
                                <input type="submit" value="Click to Save the picture." class="btn-success float-left">
                            </label>
                        </div>
                    </div>
                </div>
                <input type="file" name="image" id="imgInp" class="form-control">             
          
            {{-- message --}}
           
            <div class="alert" id="freelancerMessage"></div>

            <div class="row">
                <div class="col-md-12 well col-sm-12">

                    <p>
                        Most of the info will be taken form your profile for CV.
                    </p>
                </div>
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


            </div>

           
        </div>
    </div>
    <!-- General Detail End -->

    <!-- full detail SetionStart-->
    <section class="full-detail">
        <div class="container">
            {{-- Education --}}
            <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Add Projects</h2>
                <div class="extra-field-box">
                    <div class="multi-box">
                        <div class="dublicat-box">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="project_title[]" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group input-group">
                                    <textarea class="form-control input-lg" name="project_description[]">
                                       Description
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Date From</span>
                                    <input type="date" class="form-control" name="project_from_date[]">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Date To</span>
                                    <input type="date" class="form-control" name="project_to_date[]">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                               <div class="form-group input-group">
                                    <textarea name="project_skill[]" class="form-control">
                                        Skills
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <input type="text" class="form-control"  placeholder="Add Supervisor" name="project_supervisor[]">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <input type="text" class="form-control"  placeholder="Type i.e. academic" name="project_type[]">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="project_link[]" placeholder="Link">
                                </div>
                            </div>

                            <button type="button" class="btn remove-field">Remove</button>
                        </div>
                    </div>
                    <button type="button" class="add-field">Add field</button>
                </div>
            </div>

            {{-- Expericence --}}
                       <div class="row bottom-mrg extra-mrg">
                <h2 class="detail-title">Interest</h2>
                <div class="extra-field-box">
                    <div class="multi-box">
                        <div class="dublicat-box">
                            <div class="col-md-12 col-sm-12">
                                <input type="text" class="form-control" name="interest[]" placeholder="Your interest">
                                <textarea name="interest_details[]" class="form-control" > Details</textarea>
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
            <input type="submit" class="btn btn-success btn-primary small-btn" value="Edit" >
    </div>

</form>

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