@extends('_html.layouts.app') 
@section('title','Customer Dashboard')

@section('content')
@section('hed')
<link rel="stylesheet" type="text/css" href="{{asset('css/dash/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/dash/response.css')}}">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
@endsection
<style>
.w3-row-padding, .w3-row-padding>.w3-half, .w3-row-padding>.w3-third, .w3-row-padding>.w3-twothird, .w3-row-padding>.w3-threequarter, .w3-row-padding>.w3-quarter, .w3-row-padding>.w3-col 
{
    padding: 7px 8px;
   
}
.w3-teal, .w3-hover-teal:hover {
    color: #fff!important;
    background-color:#7CF771!important;
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
    left: -43px;
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
    $customer=App\Customer::where('user_id',$user->id)->first();
    $orders=App\ProFreeOrder::where('customer_id',$user->id)->get();
    
    $notification=App\FreelancerOrderReport::where('customer_id',$user->id)->where('status',0)->get();
   
   // $notification=App\FreelancerOrderReport::where('order_id',$order->id)->where('status',0)->get();
   
@endphp
<section class="inner-header-title">
    <div class="container">
        <h1>Customer DashBoard</h1>
    </div>
</section>

<section class=" container">



<!-- Page Container -->
<div class=" w3-content" style="max-width:1400px;margin-top:10px">    
    @php
       //  print_r($orders);
    @endphp
     <ul style="list-style:none">
      <li class="list-style"><a href="{{url('/chatdashboard')}}">Messages</a></li>
      
      <li class="list-style">
          <div class="dropdown show">
              <a class=" dropdown-toggle" href="#"  id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Notification<span class="badge badge-warning">{{count($notification)}}</span>
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  @if($notification)
                 
                    @foreach($notification as $notification)
                        
                        
                           
                                @php
                                    $sender=App\User::find($notification->seller_id);
                                @endphp
                                @if($notification->type==0)
                                    <a class="dropdown-item" href="{{url('response_to_notification/'.urlencode(base64_encode($notification->id)))}}">You Have a Delivery Request from {{$sender->name}}</a>
                                @endif
                                @if($notification->type==1)
                                    <a class="dropdown-item" href="{{url('response_to_notification/'.urlencode(base64_encode($notification->id)))}}">You Have a Time extension Request from {{$sender->name}}</a>
                                @endif
                                @if($notification->type==2)
                                    <a class="dropdown-item" href="{{url('response_to_notification/'.urlencode(base64_encode($notification->id)))}}">You Have a Cancel Request from {{$sender->name}}</a>
                                @endif
                                
                           
                                <hr>
                    @endforeach
                @endif
              </div>
          </div>
      </li>


  


      <li class="list-style"><a  href="{{url('customer_edit_profile/'.urlencode(base64_encode($user->id)))}}"> Edit Profile</a> </li>
      <li class="list-style">Payments</li>
      <li class="list-style"><a href="{{url('customer_personal_review/'. urlencode(base64_encode($user->id)))}}">Reviews</a></li>
      <li class="list-style">Enalatics</li>
      <li class="list-style"><a  onclick="show_request_on('1')">Requsts On projects</a></li>
      <li class="list-style"><a onclick="show_request_on('2')">Requests On Jobs</a></li>
      <li class="list-style"><a href="{{url('MyJob')}}">Orders</a></li>
  </ul>
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white" id="bar">
        <div class="w3-container">
         
         <p class="w3-center">
             @if($customer->profile_image == null)
             <img src="data:image/jpeg;base64,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" class="wow heartBeat w3-circle" style="height:106px;width:110px" alt="Avatar">
            @else 
             <img src="{{asset('uploads/user/'.$customer->profile_image)}}" class="wow heartBeat w3-circle" style="height:106px;width:110px" alt="Avatar">
             @endif
        </p>
        
         <div class="w3-container">
          <div style="">
         <h3 class="head-type" style="font-style: bold; padding: 0;">{{$user->name}}</h3>      

       </div>

       <div class="text">

        <p style="font-size: 14px;">{{$customer->designation}}</p>

       </div>

        <div class="text" style="">
        <div style="text-align: center;" id="rateYo"></div>
      </div>
<br>
        <a href="{{url('customer_profile_public_view/'.urlencode(base64_encode($user->id)))}}" class="w3-button w3-block w3-white w3-border" style="border-radius: 5px; text-align: center;">View as public</a>

        </div>

        <hr>
        @php
            $address=$customer->address;
            if($address){
              $country=explode(",",$address);
              $country=App\Country::find($country[0]);
            }
        @endphp
        @if($customer->address)
        <p><i class="fas fa-map-marker-alt"></i> From <span class="w3-right">{{$country->name}}</span></p>
        @else 
        <p><i class="fas fa-map-marker-alt"></i> From <span class="w3-right"></span></p>
        @endif
        <p><i class="fas fa-user-tag"></i> Member since <span class="w3-right">{{$customer->created_at}}</span></p>
        <p><i class="fas fa-clock"></i> Average response time <span class="w3-right">{{$customer->response_time}}</span></p>

        <p><i class="fas fa-clock"></i> Contact number <span class="w3-right">{{$user->mobile}}</span></p>
                        <br>
                <h6>Long Description </h6>
                <hr>
                <p><span class="w3-right">{{$customer->long_description}}</span></p>
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
                @php
                    $language=App\LanguageDetails::where('user_id',$user->id)->get();
                   // print_r($skill);
                @endphp
                <br>
                <hr>
                <h6>Language</h6>
                <hr>
                <p>
                    @if($language)
                        @foreach($language as $language)
                        @php
                            $s=App\Language::find($language->language_id);
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
    
     @yield('descontent')


        
      </div>

    <!-- End Middle Column -->
    </div>
    
  
   
    
  <!-- End Grid -->
  </div>
  
</section>


<!-- Footer -->
<script>
/* Javascript */

var ra;
window.onload=function(){
  // ra=3;
   
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