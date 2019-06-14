@extends('_html.layouts.app') 
@section('title', 'Browse a job') 
@section('content')

<!-- Mirrored from codeminifier.com/new-job-stock/job-stock/browse-jobs.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 20:43:56 GMT -->
<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="{{asset('css/job1/assets/plugins/css/plugins.css')}}">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!-- Custom style -->
    <link href="{{asset('css/job1/assets/css/style.css')}}" rel="stylesheet">
	<link type="text/css" rel="stylesheet" id="jssDefault" href="{{asset('css/job1/assets/css/colors/green-style.css')}}">
    
	</head>
	<body>
		<div class="Loader"></div>
		<div class="wrapper">  
			
			<!-- Start Navigation -->
			
			<!-- End Navigation -->
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
		<br>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter Start -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form>
								<div class="col-md-4 col-sm-4">
									<input type="text" class="form-control" placeholder="Keyword: Name, Tag">
								</div>
								<div class="col-md-3 col-sm-3">
									<input type="text" class="form-control" placeholder="Location: City, State, Zip">
								</div>
								<div class="col-md-3 col-sm-3">
									<select class="form-control" id="j-category">
										<option value="">&nbsp;</option>
										<option value="1">Information Technology</option>
										<option value="2">Mechanical</option>
										<option value="3">Hardware</option>
										<option value="4">Hospitality & Tourism</option>
										<option value="5">Education & Training</option>
										<option value="6">Government & Public</option>
										<option value="7">Architecture</option>
									</select>
								</div>
								<div class="col-md-2 col-sm-2">
									<button type="submit" class="btn btn-primary full-width">Search</button>
								</div>
							</form>
						</div>
					</div>
					<!-- Company Searrch Filter End -->
					
					<div class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="assets/img/com-1.jpg" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-apply-detail.html"><h3>Digital Marketing Manager</h3></a>
										<p>
											<span>Autodesk</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$750 - 800</span>

											
										</p>

											<p>
											<span>Requirements</span><span class="brows-job-sallery"><span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">PHP</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #e2bd5d; border-radius: 20px;">Html</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #5dc1b5; border-radius: 20px;">CSS</span>
											
											
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Full Time</span>
						</article>
					</div>
				
					<div class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="assets/img/com-2.jpg" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-apply-detail.html"><h3>Compensation Analyst</h3></a>
										<p>
											<span>Google</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$810 - 900</span>
											
										</p>

										<p>
											<span>Requirements</span><span class="brows-job-sallery"><span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">PHP</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #e2bd5d; border-radius: 20px;">Html</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #5dc1b5; border-radius: 20px;">CSS</span>
											
											
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Full Time</span>
						</article>
					</div>
					
					<div class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="assets/img/com-3.jpg" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-apply-detail.html"><h3>Investment Banker</h3></a>
										<p>
											<span>Honda</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$800 - 910</span>
											
										</p>

										<p>
											<span>Requirements</span><span class="brows-job-sallery"><span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">PHP</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #e2bd5d; border-radius: 20px;">Html</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #5dc1b5; border-radius: 20px;">CSS</span>
											
											
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Premium</span>
						</article>
					</div>
					
					<div class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="assets/img/com-3.jpg" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-apply-detail.html"><h3>Financial Analyst</h3></a>
										<p>
											<span>Microsoft</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$580 - 600</span>
											
										</p>

										<p>
											<span>Requirements</span><span class="brows-job-sallery"><span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">PHP</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #e2bd5d; border-radius: 20px;">Html</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #5dc1b5; border-radius: 20px;">CSS</span>
											
											
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Part Time</span>
						</article>
					</div>
					
					<div class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="assets/img/com-4.jpg" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-apply-detail.html"><h3>Service Representative</h3></a>
										<p>
											<span>Autodesk</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$800 - 900</span>
											
										</p>

										<p>
											<span>Requirements</span><span class="brows-job-sallery"><span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">PHP</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #e2bd5d; border-radius: 20px;">Html</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #5dc1b5; border-radius: 20px;">CSS</span>
											
											
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Part Time</span>
						</article>
					</div>
					
					<div class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="assets/img/com-5.jpg" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-apply-detail.html"><h3>Chief Executive Officer</h3></a>
										<p>
											<span>Google</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$510 - 700</span>
											
										</p>

										<p>
											<span>Requirements</span><span class="brows-job-sallery"><span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">PHP</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #e2bd5d; border-radius: 20px;">Html</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #5dc1b5; border-radius: 20px;">CSS</span>
											
											
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<a href="{{url('Job/Details')}}" class="btn btn-success">Apply Now</a>
									</div>
								</div>
							</div>
						</article>
					</div>
					
					<div class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<a href="job-detail.html"><img src="assets/img/com-6.jpg" class="img-responsive" alt="" /></a>
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<a href="job-apply-detail.html"><h3>Administrative Manager</h3></a>
										<p>
											<span>Honda</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$700 - 800</span>
											
										</p>

										<p>
											<span>Requirements</span><span class="brows-job-sallery"><span class="w3-tag w3-small" id="spans" style="background-color: #7ed85b; border-radius: 20px;">PHP</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #e2bd5d; border-radius: 20px;">Html</span>
            <span class="w3-tag w3-small" id="spans" style="background-color: #5dc1b5; border-radius: 20px;">CSS</span>
											
											
										</p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-link">
										<a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
									</div>
								</div>
							</div>
							<span class="tg-themetag tg-featuretag">Enternship</span>
						</article>
					</div>
					
					<!--/.row-->
					<div class="row">
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li> 
							<li><a href="#">4</a></li> 
							<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
							<li><a href="#">&raquo;</a></li> 
						</ul>
					</div>
					
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
			
			<!-- Footer Section Start -->
		
			<div class="clearfix"></div>
			<!-- Footer Section End -->
			
			<!-- Sign Up Window Code -->
			<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<div class="tab" role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
								<li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content" id="myModalLabel2">
								<div role="tabpanel" class="tab-pane fade in active" id="login">
									<img src="assets/img/logo.png" class="img-responsive" alt="" />
									<div class="subscribe wow fadeInUp">
										<form class="form-inline" method="post">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="email"  name="email" class="form-control" placeholder="Username" required="">
													<input type="password" name="password" class="form-control"  placeholder="Password" required="">
													<div class="center">
													<button type="submit" id="login-btn" class="submit-btn"> Login </button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane fade" id="register">
								<img src="assets/img/logo.png" class="img-responsive" alt="" />
									<form class="form-inline" method="post">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="text"  name="email" class="form-control" placeholder="Your Name" required="">
													<input type="email"  name="email" class="form-control" placeholder="Your Email" required="">
													<input type="email"  name="email" class="form-control" placeholder="Username" required="">
													<input type="password" name="password" class="form-control"  placeholder="Password" required="">
													<div class="center">
													<button type="submit" id="subscribe" class="submit-btn"> Create Account </button>
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
			<!-- End Sign Up Window -->
			
			
			<!-- Scripts
			================================================== -->
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/jquery.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/viewportchecker.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/bootstrap.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/bootsnav.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/select2.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/wysihtml5-0.3.0.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/bootstrap-wysihtml5.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/datedropper.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/dropzone.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/loader.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/owl.carousel.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/slick.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/gmap3.min.js')}}"></script>
			<script type="text/javascript" src="{{asset('js/job1/assets/plugins/js/jquery.easy-autocomplete.min.js')}}"></script>
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			<script src="assets/js/jQuery.style.switcher.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
				});
			</script>
			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}

				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
			</script>
		</div>
	</body>


@endsection