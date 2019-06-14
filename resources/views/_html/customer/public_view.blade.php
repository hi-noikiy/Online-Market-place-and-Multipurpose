@extends('_html.layouts.app')
@section('content')

		<div class="wrapper">  
			
	@php
			$job=App\Job::where('customer',$customer->id)->where('jobpro',1)->get();
			$project=App\Job::where('customer',$customer->id)->where('jobpro',0)->get();
			$review= \App\Helpers\GeneralHelper::get_total_review($user->id,2);
	@endphp	
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
				<div class="container">
					<h1>Customer Profilee</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
		
		<!-- Candidate Profile Start -->
        <section class="detail-desc advance-detail-pr gray-bg">
            <div class="container white-shadow">
                <div class="row">
                    <div class="detail-pic">
										@if($customer->profile_image != null)
												<img src="{{asset('uploads/user/'.$customer->profile_image)}}" class="img" alt="" />
										@else 
											<img src="assets/img/can-2.png" class="img" alt="" />
										@endif
										
										
										</div>
                    {{-- <div class="detail-status"><span>Active Now</span></div> --}}
                </div>
				
                <div class="row bottom-mrg">
                    <div class="col-md-12 col-sm-12">
                        <div class="advance-detail detail-desc-caption">
                            <h4>{{$user->name}}</h4><span class="designation">{{$customer->designation}}</span>
                            <ul>
                                <li><strong class="j-view">{{count($job)}}</strong>Job Post</li>
                                <li><strong class="j-applied">{{count($project)}}</strong>Project Post</li>
                                <li><strong class="j-shared">{{count($review)}}</strong>Review</li>
                            </ul>
                        </div>
                    </div>
                </div>
				
                <div class="row no-padd">
                    <div class="detail pannel-footer">
                        <div class="col-md-5 col-sm-5">
                            <ul class="detail-footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                
                            </ul>
                        </div>
                        {{-- <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="footer-btn grn-btn" title="">Edit Now</a></div>
                        </div> --}}
                    </div>
                </div>
				
            </div>
        </section>
		
        <section class="full-detail-description full-detail gray-bg">
            <div class="container">
                <div class="col-md-12 col-sm-12">
                    <div class="full-card">
                      <div class="deatil-tab-employ tool-tab">
							<ul class="nav simple nav-tabs" id="simple-design-tab">
								<li class="active"><a href="#about">About</a></li>
								<li><a href="#address">Address</a></li>
								<li><a href="#post-job">Job Posted</a></li>
								
							</ul>
							<!-- Start All Sec -->
							<div class="tab-content">
								<!-- Start About Sec -->
								<div id="about" class="tab-pane fade in active">
									<h3>About {{$user->name}}</h3>
								
									<p>{{$customer->long_description}}</p>
								</div>
								<!-- End About Sec -->
								@php
										$country=App\Country::find($customer->country_code);
								@endphp
								<!-- Start Address Sec -->
								<div id="address" class="tab-pane fade">
									<h3>Address Info</h3>
									<ul class="job-detail-des">
										<li><span>Address:</span>{{$customer->address}}</li>
										
										<li><span>State:</span>z{{$customer->state}}</li>
										@if($country)
										<li><span>Country:</span>{{$country->name}}</li>
										@endif
										<li><span>Zip:</span>{{$customer->zip}}</li>
										<li><span>Telephone:</span>{{$user->mobile}}</li>
									
									
									</ul>
								</div>
								<!-- End Address Sec -->
								@php
										$task=App\Job::where('customer',$customer->id)->get();
								@endphp
								<!-- Start Job List -->
								<div id="post-job" class="tab-pane fade">
									<h3>You have {{count($task)}} job post</h3>
									<div class="row">
										@if($task)
										@foreach($task as $job)
										@php
												if($job->jobpro==0){
													$image=App\Image::where('type',7)->where('item_id',$job->id)->first();
												}elseif($job->jobpro==1){
													$image=App\Image::where('type',8)->where('item_id',$job->id)->first();
												}
										@endphp
										<article>
											<div class="mng-company">
												<div class="col-md-2 col-sm-2">
													<div class="mng-company-pic">
														@if($image)
														<img src="{{asset('uploads/image/'.$image->image)}}" class="img-responsive" alt="">
														@else 
															<img src="" class="img-responsive" alt="">
														@endif
													</div>
												</div>
												
												<div class="col-md-5 col-sm-5">
													<div class="mng-company-name">
														<h4>{{$job->title}} </h4><span class="cmp-time">{{$job->created_at}}</span></div>
												</div>
												
												<div class="col-md-4 col-sm-4">
													<div class="mng-company-location">
														<p><i class="fa fa-map-marker"></i> {{$job->Location}} </p>
													</div>
												</div>
												
												<div class="col-md-1 col-sm-1">
													<div class="mng-company-action">
														
															${{$job->min}} to ${{$job->max}}
													
													</div>
												</div>
												
											</div>
											@if($job->jobpro==1)
											<span class="tg-themetag tg-featuretag">Job</span>
											@endif
											@if($job->jobpro==0)
											<span class="tg-themetag tg-featuretag">Project</span>
											@endif
										</article>
										@endforeach
										@endif
									
									
									</div>
									<div class="row">
										{{-- <ul class="pagination">
											<li><a href="#">«</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
											<li><a href="#">»</a></li>
										</ul> --}}
									</div>
								</div>
								<!-- End Job List -->
								
							
							</div>
							<!-- Start All Sec -->
						</div>  
                    </div>
                </div>
            </div>
        </section>
			<!-- Footer Section Start -->

			<div class="clearfix"></div>
			<!-- Footer Section End -->
			
			<!-- Sign Up Window Code -->
			   
		
		
			
		</div>
	@endsection
