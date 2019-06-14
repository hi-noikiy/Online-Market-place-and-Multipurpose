<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>@yield('title')</title>
	
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



	<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.rtl.min.css"/>

	<!-- CSS
		
	================================================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	 <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
	 <link hrer="{{asset('css/animate.css')}}">
	 @include('chore.style.CSS')
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('_html/assets/plugins/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
	
	<link href="{{asset('_html/assets/css/style.css')}}" rel="stylesheet">

	@yield('hed')

</head>

<body>
	<style>
#subscriber_form{ display:none; }
#subscriber_form {
	margin-left: 0;
    
    z-index: 70;
    height: 70%;
    max-height: 1080px;
    position: fixed;
	top:0;
	left: 10%;
    background: rgba(70, 71, 72, 0.69);
}
#sub_div_form {
    width: 640px;
    height: 100%;
    margin: 4px auto;
    background: ghostwhite;
   
    padding: 45px;
    border: 1px solid #9E9E9E;
    border-radius: .25em .25em .4em .4em;
    text-align: center;
    box-shadow: 14px 15px 15px rgba(10, 80, 120, 0.4);
}
#sub_div_form span {
	position: relative;
    float: right;
    font-weight: 700;
    margin-top: -40px;
    height: 15px;
    font-size: 18px;
    width: 15px;
    line-height: 15px;
    margin-right: -40px;
    border: 2px solid;
    border-radius: 90px;
    padding: 7px;
}
.main-content{
	height:500px;width:500px
}
span#kv_form_close:hover {
    color: #e0190b;
}

@media screen and (max-width: 440px) {

	#subscriber_form{ display:none; }
#subscriber_form {
	margin-left: 0;
    
    z-index: 70;
    height: 100%;
	width: 100%;
    max-height: 1080px;
    position: fixed;
	
    background: rgba(70, 71, 72, 0.69);
}
#sub_div_form {
    width: 290px; 
	padding: 35px;
    margin: 4px auto;
    background: ghostwhite;
   
    padding: 25px;
    border: 1px solid #9E9E9E;
    border-radius: .25em .25em .4em .4em;
    text-align: center;
    box-shadow: 14px 15px 15px rgba(10, 80, 120, 0.4);
}
#sub_div_form span {
	position: relative;
    float: right;
    font-weight: 700;
    margin-top: -4px;
    height: 15px;
    font-size: 18px;
    width: 15px;
    line-height: 15px;
  
    border: 2px solid;
    border-radius: 90px;
    padding: 7px;
}
.in-content{
    z-index: 10;
    width: 47%;
}
span#kv_form_close:hover {
    color: #e0190b;
}
}
</style>
@php
	$admin_gurad=Auth::guard('admin')->user();
	$web_gurad=Auth::user();
// print_r($admin_gurad);
// 	 echo '<br>'.'ki re ';
// print_r($web_gurad);
	//print_r($kk);
	//admin_guard use Users table.. 
	//web_gurad use All_users table
	
		
	
@endphp
	<div class="wrapper">

		<!-- Start Navigation -->
		<nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">
			
		
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
				</button>
				<div id="subscriber_form" class="col-md-6 col-sm-12" > 
						<div id="sub_div_form"> 
							<span style="cursor:pointer" id="kv_form_close"> X </span>
								<div class="main-content col-sm-10 col-md-6"  id="role_model">
								
									
								</div>
						</div>
				</div>


				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<a class="navbar-brand" href="{{url('/')}}">
							<img src="{{asset('_html/assets/img/logo.png')}}" class="logo logo-display" alt="">
							<img src="{{asset('_html/assets/img/logo-white.png')}}" class="logo logo-scrolled" alt="">
						</a>
				</div>
				  	<div class="row col-md-4 offset-4">
						
                    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
				
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
					
						@if($admin_gurad!=null) {{-- Freelancer --}}
						  @if(Auth::guard('admin')->user()->user_type==3)
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Freelancer</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
														<li><a href="{{url('freelancer-dash')}}">Dashboard</a></li>
														<li><a href="{{url('Freelancer/CreateProfile')}}">Edit Profile</a></li>
													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Company</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
														<li><a href="{{url('Job/CreateCompany')}}">Create Company</a></li>
														{{--
														<li><a href="{{url('Job/Create')}}">Publish Job</a></li> --}}
														<li><a href="{{url('Job/CreateResume')}}">Company Resume</a></li>
														{{-- <li><a href="{{url('Job/Find')}}">Find Job</a></li> --}}
													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li>
								<li><a href="{{url('Gig/mygigs')}}">Gigs</a></li>
								<li><a href="{{url('Freelancer/FindProject')}}">Find Project</a></li>
								{{-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Project</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
															<li><a href="{{url('Freelancer/FindProject')}}">Find Project</a></li>
															<li><a href="{{url('MyJob')}}">My Project</a></li>

													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li> --}}
							@endif
							{{-- end of freelancer --}}
							{{-- Pro --}}
							@if(in_array(Auth::guard('admin')->user()->user_type,[4]))
							
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pro</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
														<li><a href="{{url('pro-dash')}}">Dashboard</a></li>
														<li><a href="{{url('freelancer_edit_profile/'.$admin_gurad->id)}}">Edit Profile</a></li>
													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li>
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Company</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
														<li><a href="{{url('Job/CreateCompany')}}">Create Company</a></li>
														{{--
														<li><a href="{{url('Job/Create')}}">Publish Job</a></li> --}}
														<li><a href="{{url('Job/CreateResume')}}">Company Resume</a></li>
														{{-- <li><a href="{{url('Job/Find')}}">Find Job</a></li> --}}
													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li>
								<li><a href="{{url('Gig/mygigs')}}">Gigs</a></li>
										
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jobs</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
															<li><a href="{{url('pro/Job/Find')}}">Find Job</a></li>
															<li><a href="{{url('MyJob')}}">My Job</a></li>

													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li>
							@endif
							{{-- end Pro --}}
							{{-- Customer --}}
							@if(Auth::guard('admin')->user()->user_type == 2)
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Company</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
														<li><a href="{{url('Job/CreateCompany')}}">Create Company</a></li>
														{{--
														<li><a href="{{url('Job/Create')}}">Publish Job</a></li> --}}
														<li><a href="{{url('Job/CreateResume')}}">Company Resume</a></li>
														{{-- <li><a href="{{url('Job/Find')}}">Find Job</a></li> --}}
													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Find</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-menu col-md-12">
													<ul class="menu-col">
														<li><a href="{{url('Customer/FindFreelancer')}}">Freelancer</a></li>
														<li><a href="{{url('Customer/FindPro')}}">Pro</a></li>
													</ul>
												</div>
												<!-- end col-3 -->
											</div>
											<!-- end row -->
										</li>
									</ul>
								</li>

								<li><a href="{{url('Job/ProjectCreate')}}">Post Project</a></li>
								<li><a href="{{url('Job/Create')}}">Publish Job</a></li>
							@endif
							{{-- end customer --}}

							
							{{-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Study and Grow</a>
								<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-12">
												<ul class="menu-col">
													<li><a href="{{url('ScholarShip')}}">Scholarship</a></li>
												
													<li><a href="{{url('Courses')}}">Courses</a></li>
												</ul>
											</div>
											<!-- end col-3 -->
										</div>
										<!-- end row -->
									</li>
								</ul>
							</li> --}}
							@if(Auth::guard('admin')->user()->user_type == 5)
								<li><a href="{{url('Job/Find')}}">Find Job</a></li>
								<li><a href="{{url('MyJob')}}">My Job</a></li>
							@endif


							@if(Auth::guard('admin')->user()->user_type == 6)
								<li><a href="{{url('Job/Create')}}">Publish Job</a></li>
								<li><a href="#">Find Job Seeker</a></li>
							@endif
						@endif
					
						
					

						{{-- @if($admin_gurad!=null || $web_gurad!=null)
						
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Chores</a>
								<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-12">
												<ul class="menu-col">
													
													<li><a href="{{url('chores/view')}}">View Chores </a></li>
												
												
													<li><a href="{{url('chores/admin')}}">Chores Admin</a></li>
													
												</ul>
											</div>
											<!-- end col-3 -->
										</div>
										<!-- end row -->
									</li>
								</ul>
							</li>
						@endif --}}
						
						@if(!$admin_gurad  && !$web_gurad)
							<li><a href="">Freelancer</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Find Work</a>
								<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-12">
												<ul class="menu-col">
													<li><a href="">Chores</a></li>
												
													<li><a href="">Project</a></li>
													<li><a href="">Gigs</a></li>
													<li><a href="">Jobs</a></li>
												</ul>
											</div>
											<!-- end col-3 -->
										</div>
										<!-- end row -->
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Study and Grow</a>
								<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-12">
												<ul class="menu-col">
													<li><a href="{{url('ScholarShip')}}">Scholarship</a></li>
												
													<li><a href="{{url('Courses')}}">Courses</a></li>
												</ul>
											</div>
											<!-- end col-3 -->
										</div>
										<!-- end row -->
									</li>
								</ul>
							</li>
						@endif

					
						@if(Auth::check() )
						
							<li><a href="{{url('LogOut')}}">Logout</a></li>
						@endif
						@if(Auth::guard('admin')->check())
						
							<li><a href="{{url('logoutfromadmin')}}">Logout </a></li>
						@endif
						
						@if(!Auth::guard('admin')->check() && !Auth::check())
					
							<li class="left-br">
								<a href="javascript:void(0)" onclick="signupModal()" class="signin">Sign In Now </a>
							</li>
							<li class="left-br">
								<a href="{{url('user_registration')}}">Sign UP</a>
							</li>
						@endif
						
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</nav>
		<!-- End Navigation -->
						<!-- alerty -->
				@php
					$successmessage=Session::get('successmessage');
					$dangermessage=Session::get('dangermessage');
				@endphp

				@if($successmessage)
				<script>
				
					alertify.defaults.glossary.title = 'Healthbute says';
					alertify.confirm("Operation Successful"),
					function(){
						alertify.success('Ok');
					};
					
				</script>
				@endif
				@if($dangermessage)
				<script>
				
					alertify.defaults.glossary.title = 'Healthbute says';
					alertify.confirm("Operation is not successfull"),
					function(){
						alertify.error('Ok');
					};
					
				</script>
				@endif
				<!-- end of alerty -->

		<div class="clearfix">
			 @php
				$fullurl=url()->full();
				$main= url('/');
				//echo $fullurl.'<br>'.$dashurl;
				if($fullurl == $main)
				{
					$s=0;
				}else{
					$s=1;
				}
				
			@endphp 
			<style>
		
				.con-box{
				width: 21rem; border:1px solid black; border-radius: 5px
					
				}
				@media (max-width:600px){
				.con-box{
					
					width: 13rem;
					margin:5px;
					border:1px solid black;
					border-radius: 5px;
					float: left;
				}
				}
			
			</style>
			@if(Auth::check() && $s==0)
				<section style="margin-top: 20px;">
				 	<div class="container" style="text-align: center;">
      					 <h2><strong>Select your <span style="color: #2eb716;">Profile</span></strong> </h2>
    
    				</div>

					<br>
			
					<div class="container">
						<div class="row">	
							<div class="col-sm-3">
								<div class="card con-box" style="">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-chalkboard-teacher" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">FREELANCER</h5>
											
										<h5>
											<a style="cursor:pointer" onClick="changerole('freelancer')">
												<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
											</a>
										<h5>
										<h5>Click to join as Freelancer</h5>
									</div>
								</div>

							</div>

							<div class="col-sm-3">

								<div class="card con-box" style="">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-users-cog" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">PRO</h5>
											
										<h5>
											<a style="cursor:pointer" onClick="changerole('pro')">
												<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
											</a>
										<h5>
										<h5>Click to join as Pro</h5>
									</div>
								</div>

							</div>
							<div class="col-sm-3">

								<div class="card con-box" style="">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-user-shield" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">CUSTOMER</h5>
											
										<h5>
											<a style="cursor:pointer" onClick="changerole('customer')">
												<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
											</a>
										<h5>
										<h5>Click to join as Customer</h5>
									</div>
								</div>

							</div>

							<div class="col-sm-3">

								<div class="card con-box" style="">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-address-card" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">JOB SEEKER</h5>
											
										<h5>
										<a style="cursor:pointer" onClick="changerole('job_seeker')">
											<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
										</a>
										<h5>
										<h5>Click to join as Job Seeker</h5>
									</div>
								</div>

							</div>
							<div class="col-sm-3 " style="margin-top:30px ">

								<div class="card con-box" style="">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-address-card" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">Employer</h5>
											
										<h5>
										<a style="cursor:pointer" onClick="changerole('employer')">
											<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
										</a>
										<h5>
										<h5>Click to join as Employer</h5>
									</div>
								</div>

							</div>
							<div class="col-sm-3 " style="margin-top:30px">

								<div class="card con-box" style="">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-briefcase" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">Chores</h5>
											
										<h5>
										<a style="cursor:pointer" href="{{url('chores/admin')}}">
											<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
										</a>
										<h5>
										<h5>Click to Browse Chores</h5>
									</div>
								</div>

							</div>
							<div class="col-sm-3 " style="margin-top:30px">

								<div class="card con-box" style="">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-book-reader" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">Study and Grow</h5>
											
										<h5>
										<a style="cursor:pointer" onClick="changerole('employer')">
											<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
										</a>
										<h5>
										<h5>Click to Browse Study and Grow</h5>
									</div>
								</div>

							</div>
							<div class="col-sm-3 " style="margin-top:30px">

								<div class="card con-box" style=";">
									<div class="card-body" style="text-align: center;">
										<h6 class="card-subtitle mb-2 text-muted">
											<i class="fas fa-brain" style="font-size: 40px; color:#2eb716;"></i>
										</h6>
										<h5 class="card-title">Contest and Community</h5>
											
										<h5>
										<a style="cursor:pointer" onClick="changerole('employer')">
											<i class="fas fa-plus-circle" style="font-size: 60px; color: #1685ad;"></i>
										</a>
										<h5>
										<h5>Click to Browse Contest and Community</h5>
									</div>
								</div>

							</div>
						</div>
					</div>		
				</section>
				
			@endif
		</div>
	</div>
		
			

		@yield('content')
		

		<!-- Sign Up Window Code -->
		<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<div class="tab" role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="">
								<li style="width:100%" role="presentation" class="active">
									<a href="#login" role="tab" data-toggle="tab">Sign In</a>
								</li>
								{{--
								<li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li> --}}
							</ul>
							<!-- Tab panes -->
							<div class="tab-content" id="myModalLabel2">
								<div role="tabpanel" class="tab-pane fade in active" id="login">
									<img src="{{asset('_html/assets/img/logo.png')}}" class="img-responsive" alt="" />
									<div class="subscribe wow fadeInUp">
										{{-- Message --}}
										<div class="alert" id="loginMessage"></div>

										<form class="form-inline" method="POST" action="{{url('first_login')}}" id="loginForm">
											@csrf
											<div class="col-sm-12">
												<div class="form-group">
													<input type="email" name="email" class="form-control" placeholder="Email " required>
												</div>
												<div class="form-group">
													<input type="password" name="password" class="form-control" placeholder="Password" required>
												</div>
												<div class="form-group">
													<div class="center">
														<input type="submit" id="login-btn" class="submit-btn"> 
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Sign Up Window -->

	<!-- Footer Section Start -->
	<footer class="footer">
		<div class="row lg-menu">
			<div class="container">
				<div class="col-md-4 col-sm-4">
					<img src="{{asset('_html/assets/img/footer-logo.png')}}" class="img-responsive" alt="" />
				</div>
				<div class="col-md-8 co-sm-8 pull-right">
					<ul>
						<li><a href="#" title="">Home</a></li>
						<li><a href="#" title="">Blog</a></li>
						<li><a href="#" title="">FAQ</a></li>
						<li><a href="#" title="">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row no-padding">
			<div class="container">
				<div class="col-md-3 col-sm-12">
					<div class="footer-widget">
						<h3 class="widgettitle widget-title">About Us</h3>
						<div class="textwidget">
							{{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p> --}}
							<p>New Work<br> USA</p>
							<p><strong>Email:</strong> Support@healthbeauth.com</p>
							<p><strong>Call:</strong> <a href="tel:+00000000000">000-000-000-00</a></p>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4">
					<div class="footer-widget">
						<h3 class="widgettitle widget-title">All Navigation</h3>
						<div class="textwidget">
							<div class="textwidget">
								<ul class="footer-navigation">
									<li><a href="#" title="">Front-end Design</a></li>
									<li><a href="#" title="">Android Developer</a></li>
									<li><a href="#" title="">CMS Development</a></li>
									<li><a href="#" title="">PHP Development</a></li>
									<li><a href="#" title="">IOS Developer</a></li>
									<li><a href="#" title="">Iphone Developer</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4">
					<div class="footer-widget">
						<h3 class="widgettitle widget-title">All Categories</h3>
						<div class="textwidget">
							<ul class="footer-navigation">
								<li><a href="#" title="">Front-end Design</a></li>
								<li><a href="#" title="">Android Developer</a></li>
								<li><a href="#" title="">CMS Development</a></li>
								<li><a href="#" title="">PHP Development</a></li>
								<li><a href="#" title="">IOS Developer</a></li>
								<li><a href="#" title="">Iphone Developer</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-4">
					<div class="footer-widget">
						<h3 class="widgettitle widget-title">Connect Us</h3>
						<div class="textwidget">
							<form class="footer-form">
								<input type="text" class="form-control" placeholder="Your Name">
								<input type="text" class="form-control" placeholder="Email">
								<textarea class="form-control" placeholder="Message"></textarea>
								<button type="button" class="btn btn-primary">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row copyright">
			<div class="container">
				<p>Copyright healthbeauth © 2019. All Rights Reserved </p>
			</div>
		</div>
	</footer>
	<div class="clearfix"></div>
	<!-- Footer Section End -->
	
	<!-- Scripts
			================================================== -->
	
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/viewportchecker.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/bootsnav.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/sweetalert.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/wysihtml5-0.3.0.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/bootstrap-wysihtml5.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/datedropper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/dropzone.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/loader.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('_html/assets/plugins/js/gmap3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/validator.min.js')}}"></script>
	<!-- Custom Js -->
	<script src="{{asset('_html/assets/js/custom.js')}}"></script>
{{-- 	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}

	{{-- Ajax CSRF Handle --}}
	<script type="text/javascript">
		var baseUrl = "{{url('/')}}/";
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
	</script>
	<script>
		function changerole(data){
			console.log(data);
			$.ajax({
				type: 'get',
				url:'{{url('/checkrole')}}',
				data:{'data':data},
				success:function(d){
				
					
					$('#subscriber_form').delay(1000).fadeIn('slow');  //default Auto after 1 Sec
                    
                        $("#subscriber_form").on('click', function(e){  // Close, when click outside of the box
                            if (e.target !== this)
                                return;
                            else{
                                $(this).hide();
                            }
                        });
						$('#role_model').html(d);
                        $("#show_popup").on("click", function() {  // Custom Show button code.
                            $("#subscriber_form").show();
                        });
                        $("#kv_form_close").on('click', function(e){  // close button code. 
                            $('#subscriber_form').fadeOut('slow');
                        });
					
				}

			})
		}
		function create_an_account(){
			var type=$('#type').val();
			var email=$('#email').val();
			var pass=$('#pass').val();
			var agree= $('#agree').is(':checked')
			console.log(agree);
			

			if(agree==true){
				console.log(type);
			  console.log(email);

				 $.ajax({
                    type: 'get',
                    url : '{{URL::to('create_user_custom_ac')}}',
                    data:{'password':pass, 'email':email, 'type':type},
                    success:function(data){
						if(data=='successfreelancer'){
							console.log(data);
							window.location.href= '/freelancer-dash';
						}
						if(data=='successpro'){
							console.log(data);
							window.location.href= '/pro-dash';
						}
						if(data=='successcustomer'){
							console.log(data);
							window.location.href= '/customer-dash';
						}
                   
                    }
                })
			}
			
		}
		function custom_login(){
			var type=$('#type').val();
			var email=$('#email').val();
			var pin= $('#pin').val();
			//console.log(pin);
				
			if(pin==null){
				
			}else{
				$.ajax({
                    type: 'get',
                    url : '{{URL::to('custom_login')}}',
                    data:{'email':email, 'type':type, 'pin':pin},
                    success:function(data){
						
						if(data=='successfreelancer'){
							console.log(data);
							window.location.href= '/freelancer-dash';
						}
						if(data=='successpro'){
							console.log(data);
							window.location.href= '/pro-dash';
						}
						if(data=='successcustomer'){
							console.log(data);
							window.location.href= '/customer-dash';
						}
					//	console.log(data);
                   
                    }
                })
			}
			 
		}
		function changepin(){
			window.location.href= '/changepin';
		}
		function resetpin(){
			window.location.href='/resetpin';
		}
	</script>
	<script type="text/javascript" src="{{asset('_html/pages/home.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	@stack('scripts')
	</div>
	</div>
</body>

</html>