@extends('_html.layouts.app') 
@section('title','pro Dashboard')

@section('content')
@section('hed')
<link rel="stylesheet" type="text/css" href="{{asset('css/dash/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/dash/response.css')}}">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
@endsection
<section class="inner-header-title">
    <div class="container">
        <h1>Pro DashBoard</h1>
    </div>
</section>
<style>
.w3-row-padding, .w3-row-padding>.w3-half, .w3-row-padding>.w3-third, .w3-row-padding>.w3-twothird, .w3-row-padding>.w3-threequarter, .w3-row-padding>.w3-quarter, .w3-row-padding>.w3-col {
    padding: 11px 8px;
    border-radius: 5px;
}
.list-style{
    float: left;
    border: 2px solid green;
    background: white;
    padding: 4px 27px;
    font-size: 16px;
    margin: 3px;
    cursor: pointer;
    position: relative;
    left: 10%;;
}
@media (min-width: 601px){
.w3-col.m4, .w3-third {
    padding: 10px;
    padding: 21px;
    width: 23%;
    margin: 5px;
   
}

}
@media (max-width:600px){
.list-style{
    float: left;
    border: 2px solid green;
    background: white;
    cursor: pointer;
    position: relative;
    width: 100%;
    left: -10%;
}
.w3-col.m4, .w3-third {
    padding: 10px;
    padding: 21px;
    width: 103%;
    margin: 1px;
   
}
.con{
     border-bottom: 1px dotted black;
    padding: 17px;
    margin-bottom: 7px;
}
.w3-row-padding, .w3-row-padding>.w3-half, .w3-row-padding>.w3-third, .w3-row-padding>.w3-twothird, .w3-row-padding>.w3-threequarter, .w3-row-padding>.w3-quarter, .w3-row-padding>.w3-col {
    padding: 1px 3px;
    border-radius: 5px;
}
.w3-large {
    font-size: 5px!important;
}
.w3-container, .w3-panel {
    padding: 0.00 6px;
}
}
</style>
@php
    $user=Auth::guard('admin')->user();
    $pro=App\Pro::where('user_id',$user->id)->first();
    $notification=App\FreelancerOrderReport::where('seller_id',$user->id)->where('status',1)->get();
    
@endphp

<section class="w3-theme-l5 w3-container w3-content" style="max-width:1400px;margin-top:20px"">

	
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:70px">    
    <ul style="list-style:none">
      <li class="list-style"><a  href="{{url('/chatdashboard')}}">Messages</a></li>
       <li class="list-style">
          <div class="dropdown show">
              <a class=" dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Notification<span class="badge badge-warning">{{count($notification)}}</span>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  @if($notification)
                 
                    @foreach($notification as $notification)
                        
                        
                           
                                @php
                                    $sender=App\User::find($notification->customer_id);
                                @endphp
                                @if($notification->type==0)
                                    <a class="dropdown-item" href="{{url('response_to_notification/'.urlencode(base64_encode($notification->id)))}}">You Have a Delivery Response from {{$sender->name}}</a>
                                @endif
                                @if($notification->type==1)
                                    <a class="dropdown-item" href="{{url('response_to_notification/'.urlencode(base64_encode($notification->id)))}}">You Have a Time extension Response from {{$sender->name}}</a>
                                @endif
                                @if($notification->type==2)
                                    <a class="dropdown-item" href="{{url('response_to_notification/'.urlencode(base64_encode($notification->id)))}}">You Have a Cancel Response from {{$sender->name}}</a>
                                @endif
                                
                           
                                <hr>
                    @endforeach
                @endif
              </div>
          </div>
      </li>
      <li class="list-style"><a  href="{{url('freelancer_edit_profile/'.urlencode(base64_encode($user->id)))}}"> Edit Profile</a> </li>
      <li class="list-style">Earning</li>
      <li class="list-style"><a href="{{url('personal_review/'. urlencode(base64_encode($user->id)))}}">Reviews</a></li>
      <li class="list-style">Enalatics</li>
     
      <li class="list-style"><a href="{{url('pro_personal_order/'.urlencode(base64_encode($user->id)))}}">Orders</a></li>
      @php
         $cv=App\Cv::where('user_id',$user->id)->first(); 
      @endphp
      @if($cv)
         <li class="list-style"><a href="{{url('pro_cv/'.urlencode(base64_encode($user->id)))}}">View Cv</a></li>
      @else 
       <li class="list-style"><a href="{{url('pro_personal_cv/'.urlencode(base64_encode($user->id)))}}">Create An Cv</a></li>
      @endif
     
    </ul>
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white" id="bar">
        <div class="w3-container">
         
            <p class="w3-center"><img src="https://galileo-camps.com/wp-content/themes/galileo-learning/library/img/default-person.png" class="wow heartBeat w3-circle" style="height:106px;width:110px" alt="Avatar"></p>
        
            <div class="w3-container">
                <div style="">
                    <h3 class="head-type" style="font-style: bold; padding: 0;">{{$user->name}}</h3>

                </div>

                <div class="text" style="text-align: center">
                    <p style="font-size: 14px;">{{$pro->short_description}}</p>
                </div>

                <div class="text" style="text-align: center;">
                        <div style="text-align: center;" id="rateYo"></div>
                </div>


                <br>
                <a href={{url('Worker_Details/'. urlencode(base64_encode($user->id)))}}" class="w3-button w3-block w3-white w3-border" style="border-radius: 5px; text-align: center;">View as public</a>

            </div>

            <hr>
        @php
            $address=$pro->address;
            if($address){
              $country=explode(",",$address);
              $country=App\Country::find($country[0]);
            }
        @endphp
        @if($pro->address)
            <p class="con"><i class="fas fa-map-marker-alt"></i> From <span class="w3-right">{{$country->name}}</span></p>
        @else 
            <p class="con"><i class="fas fa-map-marker-alt"></i> From <span class="w3-right"></span></p>
        @endif
            <p class="con"><i class="fas fa-user-tag"></i> Member since <span class="w3-right">{{$pro->created_at}}</span></p>
            <p class="con"><i class="fas fa-clock"></i> Average response time <span class="w3-right">{{$pro->response_time}}</span></p>
            <p class="con"><i class="fas fa-clock"></i> Contact number<span class="w3-right">{{$user->mobile}}</span></p>
            <br>
            <h6>Long Description </h6>
            <hr>
            <p><span class="w3-right">{{$pro->long_description}}</span></p>
            @php
                $skill=App\SkillDetails::where('user_id',$user->id)->get();
                // print_r($skill);
            @endphp
            <br>
            <hr>
            <h6>Skills</h6>
            <hr>
            <p>
                @if($skill)
                    @foreach($skill as $skill)
                    @php
                        $s=App\Skill::find($skill->skill_id);
                    @endphp
                    @if($s)
                        <span style="border:1px solid #eee;padding:4px;margin:2px;border-radius:5px" class="w3-right">{{$s->name}}</span>
                    @endif    
                    @endforeach
                @endif
            </p>


        </div>
       
        <br>
        </div>


    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m9">

        @yield('dascontent')

    <!-- End Middle Column -->
    </div>
 
  <!-- End Grid -->
  </div>

</section>
  
  
<!-- End Page Container -->


<script>


var ra;
window.onload=function(){
 
   
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

 <script src="js/wow.min.js"></script>
<script>
new WOW().init();
</script>



@stop