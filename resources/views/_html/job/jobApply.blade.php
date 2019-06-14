@extends('_html.layouts.app') 
@section('title', 'Job Apply') 
@section('content')

<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Title Header Start -->
<section class="inner-header-page">
    <div class="container">

        <div class="col-md-8">
            <div class="left-side-container">
                <div class="freelance-image" id="showMessageDiv"><a href="#">
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
                    <li><span class="detail-info">Experience</span> {{getExpertLevel($row->expert_level)}} @if(!empty($row->experience))
                        {{"($row->experience + Year)"}} @endif
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

        {{-- Message --}}
        <div class="alert" id="applyJobMessageDiv">
            <div id="applyJobMessage"></div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="container-detail-box">

                <div class="apply-job-header">
                    <h4>{{$row->title}}</h4>
                    <a href="#" class="cl-success"><span><i class="fa fa-building"></i>{{$row->user_name}}</span></a> @if(!empty($row->company_country))
                    <span><i class="fa fa-map-marker"></i>{{getCountryNameById($row->company_country)}}</span> @endif
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
                        <li><span>Experience</span> {{getExpertLevel($row->expert_level)}} @if(!empty($row->experience)) {{"($row->experience
                            + Year)"}} @endif
                        </li>
                        <li><span>Language</span> {{getLanguagesName($row->language_ids)}}</li>
                    </ul>
                </div>

                <form id="applyJobForm">
                    <input type="hidden" name="project_id" value="{{$row->id}}">

                    <div class="form-group">
                        <label for="comment">Cover Letter:</label>
                        <textarea class="form-control" rows="5" name="cover_letter" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="usr">Amount:</label>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="sel1">Delivery Day:</label>
                                <select class="form-control" name="delivery_day" required>
                            @foreach($row->days as $day)
                        <option value="{{$day}}">{{$day}}</option>
                        @endforeach
                        </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success" onclick="applyJob()">Submit Offer</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>
<!-- Job Detail End -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/jobs.js')}}"></script>












@endpush