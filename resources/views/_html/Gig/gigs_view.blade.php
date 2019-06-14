@section('hed')
<link rel="stylesheet" type="text/css" href="{{asset('css/style1.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/response.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
@endsection
<style>

.w3-center {
    text-align: center!important;
    float: left !important;
}
</style>


@php
  if($user->user_type==3){
    $freelancer=App\Freelancer::where('user_id',$user->id)->first();
    $cat=App\Category::where('type',2)->get();
    $gig=App\Gig::where('freelancer_id',$freelancer->id)->get();
  } elseif ($user->user_type==4) {
    $freelancer=App\Pro::where('user_id',$user->id)->first();
     $cat=App\Category::where('type',3)->get();
    $gig=App\Gig::where('freelancer_id',$freelancer->id)->get();
  } 
$myslider=0;
@endphp

<!-- Page Container -->
@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	
<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white" id="bar">
        <div class="w3-container">
         
            <p class=""><img src="{{asset('avatar.png')}}" class="wow heartBeat w3-circle" style="height:106px;width:106px;padding:5px" alt="Avatar"></p>
            <h3 class="head-type" style="font-style: bold; padding: 0;">{{$user->name}}</h3>
            <h6 style="margin-left:2px"><u>Email</u>{{$user->email}}</h6>
            <hr>
            <div class="w3-container">
                <div style="text-align: left;color:rgb(165, 160, 160)">
                  <h6 style="margin-left:2px">Response time: {{$freelancer->response_time}}</h6>
                  <h6 style="margin-left:2px">Recent Delivery: {{$freelancer->recent_delivery}}</h6>
                  <h6 style="margin-left:2px">Short Description: {{$freelancer->short_description}}</h6>
                  <hr>
                  <h6 id="rateYo"></h6>
                </div>
               

            </div>


        </div>
      
    </div>
      <br>
      
          <h6 class="widget-title">
            <span> 
              <a  href="{{url('freelancer_edit_profile/'.urlencode(base64_encode($user->id)))}}">Edit Profile</a>
              
            </span>
            <span>
              <a  href="{{url('Worker_Details/'. urlencode(base64_encode($user->id)))}}">See My Profile</a>
            </span>
          </h6>
     
      <br>
      
      
      <div class="w3-card w3-round w3-white" id="bar">
        <div class="w3-container">
          <h6 class="widget-title">
            <span> 
              Brief Description
            </span>
          </h6>
         
          <p>
            {{$freelancer->long_description}}
          </p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Language
            </span>
          </h6>
         
          <p></p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Education
            </span>
          </h6>
         
          <p>
            @php
                $education=App\Education::where('user_id',$user->id)->get();
            @endphp
            @if($education)
              @foreach($education as $education)
               <h6 style="margin:0">{{$education->school_name}}</h6>
               @php
                   $qualification=App\Qualification::find($education->qualification_id);
               @endphp
               @if($qualification)
               <span style="color:rgb(165, 160, 160)">{{$qualification->name}}</span>
             
               @endif
              @endforeach
            @endif
          </p>
          <hr>

          {{-- <h6 class="widget-title">
            <span> 
              Description
            </span>
          </h6>
          <p></p>
          <hr> --}}

          <h6 class="widget-title">
            <span> 
              Skills
            </span>
          </h6>
          
          <p>
            @php
                 $skill_d=App\SkillDetails::where('user_id',$user->id)->get();
            @endphp
            @if($skill_d)
             @foreach ($skill_d as $skill_details)
               @php
               $skill=App\Skill::find($skill_details->skill_id);
              // print_r($skill);
              // exit();
               @endphp 
                @if($skill)
                  <span class="w3-tag w3-small" id="spans">{{$skill->name}}</span>
                @endif

             @endforeach
            @endif

             
       
          </p>
           <hr>

          <h6 class="widget-title">
            <span> 
              Linked Account
            </span>
          </h6>
           
          <p>
            
          </p>
          <hr>

          <h6 class="widget-title">
            <span> 
              Certificates
            </span>
          </h6>
        
          <p></p>
        </div>
      </div>
      <br>
      
    
     
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">
    
      
      
      <div class="w3-container" id="cop"><br>
         
       <h6 class="widget-title">
            <span> 
               My Gigs
            </span>
            <span class="">
              <a class="" href="{{url('Gig/create')}}">Create a new</a>
            </span>
        </h6>
     

     
      @if($gig)
        @foreach($gig as $gig)
            <div class="w3-col m3" style="border:1px solid #eee;margin:4px;border-radius:8px;padding:4px">
                <div class="wow jackInTheBox w3-card-4" style="border: 1px solid #eee;border-radius: 5px;width:100%;">
                  @php
                      $image1=App\Image::where('type',$user->user_type)->where('item_id',$gig->id)->get();
                      // print_r($image1) ;
                      // exit();
                      $myslider++;
                  @endphp
                    <div class="im1">
                       @if($image1)
                      {{-- <img src="{{asset('avatar.png')}}"   alt="Alps" width="100%"> --}}
                      
                        @foreach($image1 as $image)
                       
                         
                            <img src="{{asset('uploads/gig/'.$image->image)}}" class="mySlides<?php echo $myslider; ?>"   alt="Alps" width="100%">
                         @php
                             break;
                         @endphp
                        @endforeach   
                       
                      @endif
                    </div>
                   
                <div class="w3-container w3-center">
                   <br>
                  <a>
                   
                    <img class="img" src="">
                   
                    <span class="">{{$user->name}} </span>
                  </a>
                  <p class="card">{{$gig->title}}</p>
                  <i class="fas fa-star" id="star"><span style="color: black;">5.0(80)</span></i>
                  
                  {{-- <hr> --}}
                </div>
              
              </div>
            </div>
             <script>
                // var myIndex{{$myslider}} = 0;
                // var cl='mySlides'+{{$myslider}};
               
                // carousl{{$myslider}}();
                
                // function carousl{{$myslider}}() {
                //   var i;
                //   var x = document.getElementsByClassName(cl);
                //   // console.log(x.length);
                //    console.log(myIndex{{$myslider}});
                //     myIndex{{$myslider}}++;
                //   for (i = 0; i < x.length; i++) {
                //    // x[i].style.display = "none";  
                //   }
                 
                //   if (myIndex{{$myslider}} > x.length) {myIndex = 1;}    
                //   x[myIndex{{$myslider}}-1].style.display = "block";  
                //   setTimeout(carousl{{$myslider}}, 2000); // Change image every 2 seconds
                // }
              </script>

          @endforeach
     @endif
    

        
    </div>

  <div class="w3-container">
   <br>
    <h3 class="cmnt-header"> Reviews </h3>
    <hr>
  </div> 
     
  <div class="w3-container"><br>
   
      @php
            $review= \App\Helpers\GeneralHelper::get_total_review($user->id,3);
                   
      @endphp
                <div class="">

                    <!-- Single Review -->
                    <div class="">
                        <div class="review-thumb">
                            <img src="http://via.placeholder.com/180x180" class="img-responsive img-circle" alt="" />
                        </div>
                        <div class="review-detail">
                            @if($review)
                             @foreach($review as $review)
                             @php
                                if($review->giver_type==0){
                                $giver=App\All_user::find($review->giver_id);
                                }elseif ($review->giver_type==1) {
                                    $giver=App\User::find($review->giver_id);
                                }  
                             @endphp
                                <h4>{{$giver->name}}<span>at {{$review->created_at}}</span></h4>
                            
                                {{-- <span class="re-designation">Web Developer</span> --}}
                                <p>{{$review->comment}}</p>
                             @endforeach
                            @endif    
                        </div>
                    </div>

                </div>
   
      <hr>
  </div> 
      
  
  </div>
    
  
   
  
  </div>
<script>
/* Javascript */

var ra;
window.onload=function(){
   ra=3;
   
     $.ajax({
        type:'get',
        url:'{{url('/getstarvalue')}}',
        data:{'item_id':{{$user->id}}, 'item_type':{{$user->user_type}}},
        success:function(data){
           
            ra=data.number;
             console.log(ra);
        }
    })
 
$(function () {
 
  $("#rateYo").rateYo({
    rating: ra,
    readOnly: true,
    starWidth: "20px"
  });
});
}


</script>
</div>


