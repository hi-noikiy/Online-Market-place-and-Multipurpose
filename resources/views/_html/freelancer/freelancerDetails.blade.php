@extends('_html.layouts.app') 
@section('title', 'Freelancer Details') 
@section('content')
<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-page">
    <div class="container">
@php
    if($user->user_type==3){
        $Freelancer=App\Freelancer::where('user_id',$user->id)->first();
    }
    if($user->user_type==4)
    {
        $Freelancer=App\Pro::where('user_id',$user->id)->first();
    }
  
    $country=null;
    if($Freelancer->address!=null){
         
         $country=$Freelancer->address;
        
        $country_code=$Freelancer->country_code;
          if($country_code){
             $country=App\Country::find($country_code);
          }
       
       
       
    }
   
@endphp
        <div class="col-md-8">
            <div class="left-side-container">
                <div class="freelance-image"><a href="company-detail.html">
                    <img src="{{asset('uploads/user/'.$Freelancer->profile_image)}}" class="img-responsive img-circle" alt="https://galileo-camps.com/wp-content/themes/galileo-learning/library/img/default-person.png"></a>
                </div>
                <div class="header-details">
                    <h4>{{$user->name}}<span class="pull-right">${{$Freelancer->hourly_rate}}/hr</span></h4>
                    <p>{{$Freelancer->short_description}}</p>
                    <ul>
                        {{-- <li><a href="single-company-profile.html"><i class="fa fa-building"></i> Mack Star</a></li> --}}
                        <li>
                           <div id="rateYo"></div>
                        </li>
                        @if($country!=null)
                        <li><img class="flag" src="assets/img/gb.svg" alt=""> {{$country->name}}</li>
                        @endif
                        <li>
                            @if($Freelancer->verified_at==1)
                            <div class="verified-action">Verified</div>
                            @else
                            <div class="verified-action">Not Verified</div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 bl-1 br-gary">
            <div class="right-side-detail">
                <ul>
                    @if($Freelancer->availability!=null)
                    @php
                        $availability=['Permanant','Part Time','Intern'];

                    @endphp
                    <li><span class="detail-info">Availability</span>{{$availability[$Freelancer->availability]}}<span class="available-status">Available</span></li>
                    @else 
                    <li><span class="detail-info">Availability</span> Not Specified</li>
                    @endif
                    @if($Freelancer->address=!null)
                    {{-- @php
                       $a=$Freelancer->address;
                       $b=[];
                       $b=explode(",",$a);
                        // print_r( $b);
                        // exit();
                    @endphp --}}
                         <li><span class="detail-info">Location: {{$Freelancer->address }}</span></li>
                    @else
                        <li><span class="detail-info">Location: Not Available</span></li> 
                    @endif
                   
                    <li><span class="detail-info">Joined at</span>{{$user->created_at}}</li>
                    <li><span class="detail-info">Age</span>{{$Freelancer->age}}</li>
                </ul>
                <ul class="social-info">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                   
                </ul>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Freelancer Detail Start -->

<section>
    <div class="container">

        <div class="col-md-8 col-sm-8">
            <div class="container-detail-box">

                <div class="apply-job-header">
                    <h4>{{$user->name}}</h4>
                    <a href="company-detail.html" class="cl-success"><span><i class="fa fa-building"></i>{{$Freelancer->short_description}}</span></a>
                    <span>
                        @if($country!=null)
                        <i class="fa fa-map-marker"></i>{{$country->name}}
                        @endif
                    </span>
                </div>

                <div class="apply-job-detail">
                    <p>{{$Freelancer->long_description}}</p>
                </div>

                <div class="apply-job-detail">
                    <h5>Skills</h5>
                    @php
                    $skills=App\SkillDetails::where('user_id',$user->id)->get();
                    @endphp
                    <ul class="skills">
                        @if($skills)
                            @foreach($skills as $skill)
                            @php
                                $skill_name=App\Skill::find($skill->skill_id);
                            @endphp
                               @if($skill_name)
                                 <li>{{$skill_name->name}}</li>
                                @endif 
                            @endforeach
                        @endif         

                       
                    </ul>
                </div>

                <div class="apply-job-detail">
                    <h5>Language</h5>
                    <ul class="language">
                        @php
                            $language=App\LanguageDetails::where('user_id',$user->id)->get();
                        @endphp
                        @if($language)
                            @foreach($language as $language)
                            @php
                                $lan=App\Language::find($language->language_id);
                            @endphp
                                <li><img class="flag" src="assets/img/gb.svg" alt="">{{$lan->name}}</li>
                            @endforeach
                        @endif    
                       
                    </ul>
                </div>

                {{-- <a href="#" class="btn btn-success">Make An Offer</a> --}}

            </div>

            <!-- Similar Jobs -->
            <div class="container-detail-box">

                <div class="row">
                    <div class="col-md-12">
                        <h4>Review</h4>
                    </div>
                </div>

                @php
                    $review= \App\Helpers\GeneralHelper::get_total_review($user->id,3);
                   
                @endphp
                <div class="row">
                     @if($review)
                        @foreach($review as $review)
                        @php
                            $sender=App\User::find($review->giver_id);
                            $customer=App\Customer::where('user_id',$sender->id)->first();
                            $im=App\Image::where('type',2)->where('item_id',$customer->id);
                        @endphp
                    <!-- Single Review -->
                    <div class="review-list">
                        <div class="review-thumb">
                            @if($im)
                           
                             <img src="{{asset('uploads/user/'.$customer->profile_image)}}" class="img-responsive img-circle" alt="" />
                            @else 
                            <img src="https://galileo-camps.com/wp-content/themes/galileo-learning/library/img/default-person.png" class="img-responsive img-circle" alt="" />
                            @endif
                        </div>
                        <div class="review-detail">
                           
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
                             
                        </div>
                    </div>
                         @endforeach
                    @endif    

                </div>

            </div>
        </div>

        <!-- Sidebar Start-->
        <div class="col-md-3 col-sm-3">

            <!-- Make An Offer -->
            <div class="sidebar-container">
                <div class="sidebar-box">
                   @if($Freelancer->availability!=null)
                    @php
                        $availability=['Permanant','Part Time','Intern'];

                    @endphp
                    <li><span class="detail-info">Availability</span>{{$availability[$Freelancer->availability]}}<span class="available-status">Available</span></li>
                    @else 
                    <li><span class="detail-info">Availability</span> Not Specified</li>
                    @endif
                    <h4 class="flc-rate">{{$Freelancer->hourly_rate}}/hr</h4>
                    <div class="sidebar-inner-box">
                        <div class="sidebar-box-thumb">
                            <img src="{{asset('uploads/user/'.$Freelancer->profile_image)}}" class="img-responsive img-circle" alt="https://galileo-camps.com/wp-content/themes/galileo-learning/library/img/default-person.png" />
                        </div>
                        <div class="sidebar-box-detail">
                            <h4>{{$user->name}}</h4>
                            <span class="desination">{{$Freelancer->short_description}}</span>
                        </div>
                    </div>
                    <div class="sidebar-box-extra">
                         @php
                             $skills=App\SkillDetails::where('user_id',$user->id)->get();
                          @endphp
                        @if($skills)
                        <ul>
                            @for($i = 0; $i< count($skills); $i++) 
                                @if($i < 3)
                                @php
                                    $s=App\Skill::find($skills[$i]->skill_id);
                                @endphp
                                    @if($s)
                                        <li>{{$s->name}}</li>
                                    @endif
                                @endif
                            @endfor
                                @if(count($skills) > 3)
                                <li class="more-skill bg-primary">+{{count($skills) - 3}}</li>
                                @endif
                        </ul>
                        @endif
                        <ul class="status-detail">
                            <li class="br-1"><strong>{{$Freelancer->response_time}}</strong>Average Response Time</li>
                            @php
                              $profreeorder=App\ProFreeOrder::where('freelancer_id',$user->id)->where('status',1)->count();  
                            @endphp
                            <li class="br-1"><strong>{{$profreeorder}}</strong>Done job</li>
                            <li><strong>44</strong>Rehired</li>
                        </ul>
                    </div>
                </div>
                @if(Auth::guard('admin')->user()==$user)
                  <a href="sidebarr-detail.html" class="btn btn-sidebar bt-1 bg-success">Contact</a>
                @else 
                  <a href="{{url('make_an_offer')}}" class="btn btn-sidebar bt-1 bg-success">Contact</a>
                @endif
              
            </div>

            <!-- Website & Portfolio -->
            <div class="sidebar-wrapper">
                <div class="sidebar-box-header bb-1">
                    <h4>Website & Portfolio</h4>
                </div>

                <ul class="block-list">
                    <li><i class="fa fa-globe cl-success"></i>www.mysite.com</li>
                    <li><i class="fa fa-briefcase cl-success"></i>Portfolio</li>
                    <li><i class="fa fa-pencil cl-success"></i>My Blog</li>
                </ul>
            </div>

            <!-- Similar Profile -->
            <div class="sidebar-wrapper">

                <div class="sidebar-box-header bb-1">
                    <h4>Similar Profiles</h4>
                </div>

                <div class="member-profile-list">
                    <div class="member-profile-thumb">
                        <a href="company-detail.html"><img src="assets/img/can-2.png" class="img-responsive img-circle" alt="" /></a>
                    </div>
                    <div class="member-profile-detail">
                        <h4><a href="company-detail.html">Adam Crivatinly</a></h4>
                        <span>Web Developer</span>
                        <span class="cl-success">Freelancer</span>
                    </div>
                </div>

               

               

            </div>

            <!-- Share This Job -->
            {{-- <div class="sidebar-wrapper">
                <div class="sidebar-box-header bb-1">
                    <h4>Share This Job</h4>
                </div>

                <ul class="social-share">
                    <li><a href="#" class="fb-share"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="tw-share"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="gp-share"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="in-share"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="li-share"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#" class="be-share"><i class="fa fa-behance"></i></a></li>
                </ul>
            </div> --}}

        </div>
        <!-- End Sidebar -->

    </div>
</section>
<!-- Freelancer Detail End -->
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
    readOnly: true
  });
});
}


</script>
@endsection
 @push('scripts')
<script type="text/javascript">
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageData(page);
    });

    function paginageData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "Customer/ReadFreelancer?page=" + page,
            success: function(data) {
                $('#freelancerList').html(data);
            }
        });
    }

</script>

{{--
<script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script> --}} 
@endpush