@extends('_html.layouts.app') 
@section('title', 'Job Details') 
@section('content')

<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Title Header Start -->
<section class="inner-header-page">
    <div class="container">

        <div class="col-md-8">
            <div class="left-side-container">
                <div class="freelance-image"><a href="company-detail.html">
                <img src="{{asset('_html/assets/img/com-2.jpg')}}" class="img-responsive" alt=""></a></div>
                <div class="header-details">
                    <h4>{{$row->title}}</h4>
                    <p>{{$row->user_name}}</p>
                    <ul>
                        {{-- Vacancy --}} @if(!empty($row->vacancy))
                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                {{$row->vacancy}} Vacancy
                            </a>
                        </li>
                        @endif {{-- Rating --}} @if(!empty($row->rating))
                        <li>
                            <div class="star-rating" data-rating="{{$row->rating}}">
                                @for($i = 0; $i
                                < $row->rating; $i++)
                                    <span class="fa fa-star fill"></span> @endfor {{-- <span class="fa fa-star-half fill"></span>                                    --}}
                            </div>
                        </li>
                        @endif {{-- Company Country name --}} @if(!empty($row->company_country))
                        <li>
                            <img class="flag" src="{{asset('_html/assets/img/gb.svg')}}" alt=""> {{getCountryNameById($row->company_country)}}
                        </li>
                        @endif {{-- Company verified --}} @if($row->is_verified == 1)
                        <li>
                            <div class="verified-action">Verified</div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 bl-1 br-gary">
            <div class="right-side-detail">
                <ul>
                    <li><span class="detail-info">Availability</span>{{getJobType($row->job_type)}}</li>
                    <li><span class="detail-info">Experience</span>
                        {{getExpertLevel($row->expert_level)}} 
                        @if(!empty($row->experience))
                        {{"($row->experience + Year)"}}
                        @endif
                    </li>
                    @if(!empty($row->age))
                    <li><span class="detail-info">Age</span>{{$row->age}}+ Year</li>
                    @endif
                </ul>
                <ul class="social-info">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Job Detail Start -->
<section>
    <div class="container">

        <div class="col-md-8 col-sm-8">
            <div class="container-detail-box">

                <div class="apply-job-header">
                    <h4>{{$row->title}}</h4>
                <a href="#" class="cl-success"><span><i class="fa fa-building"></i>{{$row->user_name}}</span></a>
                @if(!empty($row->company_country))
                <span><i class="fa fa-map-marker"></i>{{getCountryNameById($row->company_country)}}</span>
                @endif
                </div>

                <div class="apply-job-detail">
                    <p>{!! $row->description !!}</p>
                </div>

                @if(!empty($row->skills))
                <div class="apply-job-detail">
                    <h5>Skills</h5>
                    <ul class="skills">
                        @foreach($row->skills as $skill)
                        <li>{{$skill->name}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="apply-job-detail">
                    <h5>Requirements</h5>
                    <ul class="job-requirements">
                        <li><span>Availability</span> {{getJobType($row->job_type)}}</li>
                        @if(!empty($row->qualification))
                        <li><span>Education</span> {{getQualificationName($row->qualification)}}</li>
                        @endif @if(!empty($row->age))
                        <li><span>Age</span> {{$row->age.'+'}}</li>
                        @endif
                        <li><span>Experience</span> 
                            {{getExpertLevel($row->expert_level)}} 
                            @if(!empty($row->experience))
                            {{"($row->experience + Year)"}}
                            @endif
                        </li>
                        <li><span>Language</span> {{getLanguagesName($row->language_ids)}}</li>
                    </ul>
                </div>

                <a href="{{url('JobApply/'. urlencode(base64_encode($row->id)))}}" class="btn btn-success">Apply For This Job</a>

            </div>

            <!-- Similar Jobs -->
            <div class="container-detail-box">

                <div class="row">
                    <div class="col-md-12">
                        <h4>Similar Jobs</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="grid-slide-2">

                        <!-- Single Freelancer & Premium job -->
                        <div class="freelance-box">
                            <div class="popular-jobs-container">
                                <div class="popular-jobs-box">
                                    <span class="popular-jobs-status bg-success">hourly</span>
                                    <h4 class="flc-rate">$17/hr</h4>
                                    <div class="popular-jobs-box">
                                        <div class="popular-jobs-box-detail">
                                            <h4>Google Inc</h4>
                                            <span class="desination">Software Designer</span>
                                        </div>
                                    </div>
                                    <div class="popular-jobs-box-extra">
                                        <ul>
                                            <li>Php</li>
                                            <li>Android</li>
                                            <li>Html</li>
                                            <li class="more-skill bg-primary">+3</li>
                                        </ul>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                    </div>
                                </div>
                                <a href="popular-jobsr-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
                            </div>
                        </div>

                        <!-- Single Freelancer & Premium job -->
                        <div class="freelance-box">
                            <div class="popular-jobs-container">
                                <div class="popular-jobs-box">
                                    <span class="popular-jobs-status bg-warning">Monthly</span>
                                    <h4 class="flc-rate">$570/Mo</h4>
                                    <div class="popular-jobs-box">
                                        <div class="popular-jobs-box-detail">
                                            <h4>Duff Beer</h4>
                                            <span class="desination">Marketting</span>
                                        </div>
                                    </div>
                                    <div class="popular-jobs-box-extra">
                                        <ul>
                                            <li>Php</li>
                                            <li>Android</li>
                                            <li>Html</li>
                                            <li class="more-skill bg-primary">+3</li>
                                        </ul>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                    </div>
                                </div>
                                <a href="popular-jobsr-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
                            </div>
                        </div>

                        <!-- Single Freelancer & Premium job -->
                        <div class="freelance-box">
                            <div class="popular-jobs-container">
                                <div class="popular-jobs-box">
                                    <span class="popular-jobs-status bg-info">Weekly</span>
                                    <h4 class="flc-rate">$200/We</h4>
                                    <div class="popular-jobs-box">
                                        <div class="popular-jobs-box-detail">
                                            <h4>Cyberdyne Systems</h4>
                                            <span class="desination">Human Resource</span>
                                        </div>
                                    </div>
                                    <div class="popular-jobs-box-extra">
                                        <ul>
                                            <li>Php</li>
                                            <li>Android</li>
                                            <li>Html</li>
                                            <li class="more-skill bg-primary">+3</li>
                                        </ul>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                    </div>
                                </div>
                                <a href="popular-jobsr-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
                            </div>
                        </div>

                        <!-- Single Freelancer & Premium job -->
                        <div class="freelance-box">
                            <div class="popular-jobs-container">
                                <div class="popular-jobs-box">
                                    <span class="popular-jobs-status bg-danger">Yearly</span>
                                    <h4 class="flc-rate">$2000/Pa</h4>
                                    <div class="popular-jobs-box">
                                        <div class="popular-jobs-box-detail">
                                            <h4>Wayne Enterprises</h4>
                                            <span class="desination">App Designer</span>
                                        </div>
                                    </div>
                                    <div class="popular-jobs-box-extra">
                                        <ul>
                                            <li>Php</li>
                                            <li>Android</li>
                                            <li>Html</li>
                                            <li class="more-skill bg-primary">+3</li>
                                        </ul>
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-popular-jobs bt-1">View Detail</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Sidebar Start-->
        <div class="col-md-4 col-sm-4">

            <!-- Job Detail -->
            <div class="sidebar-container">
                <div class="sidebar-box">
                    <span class="sidebar-status">Full Time</span>
                    <h4 class="flc-rate">20K - 30K</h4>
                    <div class="sidebar-inner-box">
                        <div class="sidebar-box-thumb">
                            <img src="{{asset('_html/assets/img/com-2.jpg')}}" class="img-responsive" alt="" />
                        </div>
                        <div class="sidebar-box-detail">
                            <h4>Google Info</h4>
                            <span class="desination">App Designer</span>
                        </div>
                    </div>
                    <div class="sidebar-box-extra">
                        <ul>
                            <li>Php</li>
                            <li>Android</li>
                            <li>Html</li>
                            <li class="more-skill bg-primary">+3</li>
                        </ul>
                        <ul class="status-detail">
                            <li class="br-1"><strong>Canada</strong>Location</li>
                            <li class="br-1"><strong>748</strong>View</li>
                            <li><strong>03</strong>Post</li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="btn btn-sidebar bt-1 bg-success">Apply For This</a>
            </div>

            <!-- Share This Job -->
            <div class="sidebar-wrapper">
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
            </div>

        </div>
        <!-- End Sidebar -->

    </div>
</section>
<!-- Job Detail End -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script>
@endpush