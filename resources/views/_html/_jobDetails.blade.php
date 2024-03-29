@extends('_html.layouts.app') 
@section('title', 'Job Details')

@section('content')
<!-- Title Header Start -->
<section class="inner-header-page">
	<div class="container">					
		<div class="col-md-8">
			<div class="left-side-container">
				<div class="freelance-image"><a href="company-detail.html"><img src="{{URL::to('_html/assets/img/com-2.jpg')}}" class="img-responsive" alt=""></a></div>
				<div class="header-details">
					<h4>{{ $details_job->title }}</h4>
					<p>Google</p>
					<ul>
						<li><a href="single-company-profile.html"><i class="fa fa-user"></i> 7 Vacancy</a></li>
						<li>
							<div class="star-rating" data-rating="4.2">
								<span class="fa fa-star fill"></span>
								<span class="fa fa-star fill"></span>
								<span class="fa fa-star fill"></span>
								<span class="fa fa-star fill"></span>
								<span class="fa fa-star-half fill"></span>
							</div>
						</li>
						<li><img class="flag" src="{{URL::to('_html/assets/img/gb.svg')}}" alt=""> {{ $details_job->name }}</li>
						<li><div class="verified-action">Verified</div></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-md-4 bl-1 br-gary">
			<div class="right-side-detail">
				<ul>
					<li><span class="detail-info">Availability</span>
						@if($details_job->job_type ==1) Full-time @endif
						@if($details_job->job_type ==2) Part-time @endif
					</li>
					<li><span class="detail-info">Experience</span>5 Year</li>
					<li><span class="detail-info">Age</span>22+ Year</li>
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
					<h4>{{ $details_job->title }}</h4>
					<a href="company-detail.html" class="cl-success"><span><i class="fa fa-building"></i>Google</span></a>
					<span><i class="fa fa-map-marker"></i>{{ $details_job->name }}</span>
				</div>
				
				<div class="apply-job-detail">
					<p>{{ $details_job->description }}</p>
				</div>
				
				<div class="apply-job-detail">
					<h5>Skills</h5>
					<ul class="skills">
						<li>Css3</li>
						<li>Html5</li>
						<li>Photoshop</li>
						<li>Wordpress</li>
						<li>PHP</li>
						<li>Java Script</li>
					</ul>
				</div>
				
				<div class="apply-job-detail">
					<h5>Requirements</h5>
					<ul class="job-requirements">
						<li><span>Availability</span> 
							@if($details_job->job_type ==1) Full-time @endif
							@if($details_job->job_type ==2) Part-time @endif
						</li>
						<li><span>Education</span> Graduate</li>
						<li><span>Age</span> 25+</li>
						<li><span>Experience</span> Intermidiate (3 - 5Year)</li>
						<li><span>Language</span> English, Hindi</li>
					</ul>
				</div>
				
				<a href="#" class="btn btn-success">Apply For This Job</a>
				
			</div>
			
			<!-- Similar Jobs -->
		</div>
		
		<!-- Sidebar Start-->
		<div class="col-md-4 col-sm-4">
			
			<!-- Job Detail -->
			<div class="sidebar-container">
				<div class="sidebar-box">
					<span class="sidebar-status">Full Time</span>
					<h4 class="flc-rate">${{ $details_job->job_price }}</h4>
					<div class="sidebar-inner-box">
						<div class="sidebar-box-thumb">
							<img src="{{URL::to('_html/assets/img/com-2.jpg')}}" class="img-responsive" alt="" />
						</div>
						<div class="sidebar-box-detail">
							<h4>{{ $details_job->title }}</h4>
							<span class="desination">App Designer</span>
						</div>
					</div>
					<!-- <div class="sidebar-box-extra">
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
					</div> -->
				</div>
				<a href="sidebarr-detail.html" class="btn btn-sidebar bt-1 bg-success">Apply For This</a>
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
