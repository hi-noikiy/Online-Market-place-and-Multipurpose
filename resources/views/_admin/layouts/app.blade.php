<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('title')</title>

  
	<!-- All Plugins Css -->
	<link rel="stylesheet" href="{{asset('_admin/assets/plugins/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">
	{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('_admin/assets/css/style.css')}}">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="wrapper" class="">
		{{--
		<div class="fakeLoader"></div> --}}
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<a class="navbar-brand" href="#"><img src="{{asset('_admin/assets/img/logo.png')}}" class="img-responsive" alt="Logo"></a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-left header-search-form hidden-xs">
				<li><a class="menu-brand" id="menu-toggle"><span class="ti-view-grid"></span></a></li>
				{{--
				<li class="hidden-sm hidden-xs">
					<div class="header-search-form input-group">
						<span class="input-group-addon"><span class="ti-search"></span></span>
						<input type="text" class="form-control" placeholder="Search & Enter">
					</div>
				</li> --}}
			</ul>

			<ul class="nav navbar-top-links navbar-right">
			
				<!-- /.dropdown -->

				<li class="dropdown">

					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<img src="{{asset('_admin/assets/img/user-1.jpg')}}" class="img-responsive img-circle float-left" alt="user">
					</a>
					<ul class="dropdown-menu dropdown-user right-swip">
						<li><a href="#"><i class="fa fa-user fa-fw"></i>Admin Profile</a>
						</li>
						{{--
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> --}}
						</li>
						<li style="z-index:1000;"><a href="{{url('superadminLogOut')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>

					</ul>
					<!-- /.dropdown-user -->
				</li>
				{{--
				<li><a id="right-sidebar-toggle" href="#" class="btn btn-lg toggle"><i class="spin ti-settings"></i></a></li> --}}

				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<!-- Sidebar Navigation -->
			<style>
			ul li{
				float: left !important;
				border-right: 1px solid white;
				width: 20%;
				padding:2px;
			}
			ul li ul div{
				background: whitesmoke;
				color: white !important;
				font-weight: 600;
			}
			</style>
			<div class="navbar-default sidebar" role="navigation" >
				<div class="sidebar-nav navbar-collapse" >
					<ul class="nav float-left" id="side-menu" >
						
						<li class="{{Request::segment(1) === 'Dashboard' ? 'active' : null}} ">
							@if(Auth::guard('master')->check())
								<a href="{{url('/super_admin_dashboard')}}">
							@else
								<a href="{{url('/manager_admin_dashboard')}}">
							@endif
								<i class="fa fa-bullseye"></i>Dashboard
							</a>
						</li>
						<li class="{{Request::segment(2) === 'TaskList' ? 'active' : ''}} ">
							<a href="{{url('Admin/TaskList')}}">
								<i class="fa fa-microchip"></i>TaskList
							</a>
						</li>
						<li class="{{Request::segment(2) === 'Country' ? 'active' : ''}}">
							<a href="{{url('Admin/Country')}}">
								<i class="fa fa-microchip"></i>Country Control
							</a>
						</li>
					  
						<li class="{{Request::segment(2) === 'Qualification' ? 'active' : ''}}">
							<a href="{{url('Admin/Qualification')}}">
								<i class="fa fa-microchip"></i>Qualification Control
							</a>
						</li>
						<li class="{{Request::segment(2) === 'Skills' ? 'active' : ''}}">
							<a href="{{url('Admin/Skills')}}">
								<i class="fa fa-microchip"></i>Manage Skills
							</a>
						</li>
						<li class="{{Request::segment(2) === 'Interest' ? 'active' : ''}}">
							<a href="{{url('message_from_users')}}">
								<i class="fa fa-microchip"></i>Message From Users
							</a>
						</li>
						<li class="{{Request::segment(2) === 'User' ? 'active' : ''}}">
							<a href="{{url('message_to_user')}}">
								<i class="fa fa-microchip"></i>Send Message to Users
							</a>
						</li>
						<li class="{{Request::segment(2) === 'Review' ? 'active' : ''}}">
							<a href="{{url('review_control')}}">
								<i class="fa fa-microchip"></i>Review Control
							</a>
						</li>
						<li class="{{Request::segment(2) === 'General_user' ? 'active' : ''}}">
							<a href="{{url('manage_general_user')}}">
								<i class="fa fa-microchip"></i>General User Control
							</a>
						</li>
						<li class="{{Request::segment(2) === 'SetQuestion' ? 'active' : ''}}">
							<a href="{{url('Admin/SetQuestion')}}">
								<i class="fa fa-microchip"></i>Manage Questions
							</a>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>Manager Control <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="{{url('create_manager')}}">Create Manager</a>
								</div>
								<div>
									<a href="{{url('manager_permission')}}">Permissions</a>
								</div>
								
								<div>
									<a href="{{url('manager_ground')}}">Manager's ground</a>
								</div>
							
								
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Customer <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="manage-jobs.html">Payments Requests</a>
								</div>
								<div>
									<a href="{{url('manage_customer')}}">Manage Customer</a>
								</div>
							
							
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Freelancer <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="manage-jobs.html">Payments Requests</a>
								</div>
								<div>
									<a href="{{url('manage_freelancer')}}">Manage freelancer</a>
								</div>
							
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>Categories <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="{{url('Category/freelancer_pro')}}">Freelancer and Pro Category</a>
								</div>
								<div>
									<a href="{{url('Category/Job')}}">Job Categories</a>
								</div>
								
									<div>
									<a href="{{url('Category/Chore')}}">Chore and Service Categories</a>
								</div>
								<div>
									<a href="{{url('Category/Video')}}">Video Categories </a>
								</div>
								
							</ul>
						</li>

						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Pro <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="{{url('Pro_payment_request')}}">Payments Requests</a>
								</div>
								<div>
									<a href="{{url('manage_pro')}}">Manage Pro</a>
								</div>
							
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Candidate <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="{{url('Candidate_payment_request')}}">Payments Requests</a>
								</div>
								<div>
									<a href="{{url('manage_candidate')}}">Manage Candidate</a>
								</div>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Job <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
							
								<div>
									<a href="{{url('manage_chore')}}">Manage Companies</a>
								</div>
							
								<div>
									<a href="{{url('manage_circular')}}">View Circulars</a>
								</div>
							
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Chores and Service <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
							
								<div>
									<a href="{{url('manage_chore')}}">Manage Chores</a>
								</div>
								
								<div>
									<a href="{{url('manage_service')}}">Manage Services</a>
								</div>
								<div>
									<a href="create-jobs.html">Payments</a>
								</div>
								
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Study and Grow <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="{{url('Admin/Contests')}}">Contests</a>
								</div>
								<div>
									<a href="manage-candidate.html">Scholarships</a>
								</div>
								
								<div>
									<a href="managec-ompany.html">Coupnes</a>
								</div>
								<div>
									<a href="create-jobs.html">Videos </a>
								</div>
								<div>
									<a href="add-freelancer.html">Partners</a>
								</div>
							
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>Community<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<div>
									<a href="{{url('Admin/News')}}">News</a>
								</div>
								<div>
									<a href="manage-candidate.html">Partners</a>
								</div>
								
								<div>
									<a href="managec-ompany.html">Questions</a>
								</div>
								
								<div>
									<a href="add-freelancer.html">Points and Gifts</a>
								</div>
							
							</ul>
						</li>
						


						{{--
						<li class="{{Request::segment(1) === 'Users' ? 'active' : null}}">
							<a href="{{url('Users')}}">
								<i class="fa fa-users"></i>Users
							</a>
						</li> --}} {{--
						<li class="{{Request::segment(1) === 'Setting' ? 'active' : null}}">
							<a href="{{url('Setting')}}">
									<i class="ti ti-settings"></i>Settings
								</a>
						</li> --}} {{--
						<li><a href="messages.html"><i class="ti ti-email"></i>Messages <b class="badge bg-purple pull-right">3</b></a></li> --}}
						{{--
						<li><a href="freelancers.html"><i class="ti ti-file"></i>freelancers</a></li> --}} {{--
						<li>
							<a href="javascript:void(0)"><i class="ti ti-user"></i>For Employer <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="{{url()}}">Manage Jobs</a>
								</li>
								<li>
									<a href="manage-candidate.html">Manage Candidate</a>
								</li>
								<li>
									<a href="manage-freelancers.html">Manage Freelancers</a>
								</li>
								<li>
									<a href="managec-ompany.html">Manage Company</a>
								</li>
								<li>
									<a href="create-jobs.html">Create Jobs</a>
								</li>
								<li>
									<a href="add-freelancer.html">Add Freelancer</a>
								</li>
							</ul>
						</li> --}} {{--
						<li>
							<a href="javascript:void(0)"><i class="ti ti-ruler-pencil"></i>For Candidate<span class="fa arrow"></span> <b class="badge bg-success pull-right">3</b></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="bookmarked-jobs.html">Bookmarked Jobs</a>
								</li>
								<li>
									<a href="manage-resumes.html">Manage Resumes</a>
								</li>
								<li>
									<a href="saved-company.html">Saved Company</a>
								</li>
								<li>
									<a href="create-resume.html">Create Resume</a>
								</li>

							</ul>
						</li> --}} {{--
						<li><a href="invoice.html"><i class="ti ti-clipboard"></i>Invoice</a></li> --}} {{--
						<li><a href="my-profile.html"><i class="ti ti-folder"></i>My Profile</a></li> --}} {{--
						<li><a href="create-membership.html"><i class="ti ti-star"></i>Create Membership</a></li> --}} {{--
						<li><a href="login.html"><i class="ti ti-shift-right"></i>Log Out</a></li> --}}
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
		</nav>
		<!-- Sidebar Navigation -->
		<style>
		.container-fluid {
    padding: 117px 30px 25px 30px;
}
		</style>
		@yield('content')

	</div>
	<!-- /#page-wrapper -->

	<div id="sidebar-wrapper">
		<a id="right-close-sidebar-toggle" href="#" class="theme-bg btn close-toogle toggle">
				Setting Pannel <i class="ti-close"></i></a>
		<div class="right-sidebar" id="side-scroll">
			<div class="user-box">
				<div class="profile-img">
					<img src="{{asset('_admin/assets/img/user-3.jpg')}}" alt="user">
					<!-- this is blinking heartbit-->
					<div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
				</div>
				<div class="profile-text">
					<h4>Daniel Dax</h4>
					<a href="#" class="user-setting"><i class="ti-settings"></i></a>
					<a href="#" class="user-mail"><i class="ti-email"></i></a>
					<a href="#" class="user-call"><i class="ti-headphone"></i></a>
					<a href="#" class="user-logout"><i class="ti-power-off"></i></a>
				</div>
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#options" data-toggle="tab">
									<i class="ti-palette"></i> </a>
						</li>
						<li>
							<a href="#comments" data-toggle="tab">
									<i class="ti-bell"></i> </a>
						</li>
						<li>
							<a href="#freinds" data-toggle="tab">
									<i class="ti-comment-alt"></i> </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="options">
							<div class="accept-request">
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-1.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status online"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-2.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status offline"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-3.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status busy"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-4.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status offline"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Shruti Singh <span class="task-time pull-right">10 Min Ago</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="comments">
							<div class="task">
								<div class="task-overview">
									<div class="alpha-box alpha-a">
										<span>A</span>
									</div>
									<div class="task-detail">
										<p>Hello, I am Maryam.</p>
										<span class="task-time">2 Min Ago</span>
									</div>
								</div>
								<div class="task-overview">
									<div class="alpha-box alpha-d">
										<span>D</span>
									</div>
									<div class="task-detail">
										<p>Hello, I am Maryam.</p>
										<span class="task-time">2 Min Ago</span>
									</div>
								</div>
								<div class="task-overview">
									<div class="alpha-box alpha-s">
										<span>S</span>
									</div>
									<div class="task-detail">
										<p>Hello, I am Maryam.</p>
										<span class="task-time">2 Min Ago</span>
									</div>
								</div>
								<div class="task-overview">
									<div class="alpha-box alpha-h">
										<span>H</span>
									</div>
									<div class="task-detail">
										<p>Hello, I am Maryam.</p>
										<span class="task-time">2 Min Ago</span>
									</div>
								</div>
								<div class="task-overview">
									<div class="alpha-box alpha-g">
										<span>G</span>
									</div>
									<div class="task-detail">
										<p>Hello, I am Maryam.</p>
										<span class="task-time">2 Min Ago</span>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="freinds">
							<div class="accept-request">
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-1.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status online"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Adam Dax <span class="task-time pull-right">Just Now</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-2.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status offline"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Rita Ray <span class="task-time pull-right">2 Min Ago</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-3.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status busy"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Daniel Mark <span class="task-time pull-right">7 Min Ago</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
								<div class="friend-overview">
									<div class="friend-overview-img">
										<img src="{{asset('_admin/assets/img/user-4.jpg')}}" class="img-responsive img-circle" alt="">
										<span class="fr-user-status offline"></span>
									</div>
									<div class="fr-request-detail">
										<h4>Shruti Singh <span class="task-time pull-right">10 Min Ago</span></h4>
										<p>Accept Your Friend Request</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer"> ©Copyright 2018 Job Stock </footer>
	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="{{asset('_admin/assets/plugins/js/jquery.min.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/sweetalert.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/datepicker.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/ckeditor.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/select2.min.js')}}"></script>
	<script src="{{asset('_admin/assets/js/loader.js')}}"></script>

	{{-- Plugins --}}
	<script src="{{asset('plugins/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/validator.min.js')}}"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{asset('_admin/assets/js/custom.js')}}"></script>

	{{-- Ajax CSRF Handle --}}
	<script type="text/javascript">
		var baseUrl = "{{url('/')}}/";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>

	@stack('scripts')

</body>
{{-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script> --}}
</html>