
@extends('_html.layouts.app') 
@section('title', 'Post a Job') 
@section('content')

@section('hed')

<link rel="stylesheet" href="{{asset('css/job/css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/job/css/blue.css')}}">
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> --}}
@endsection


<section>
<!-- Wrapper -->
@php
		if(isset($flag)){
			$projectflag=true;
		}
		else
		{
			$projectflag=false;
		}
@endphp


	<div class="dashboard-content-container" data-simplebar>
	<form action="{{url('Post_Work')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				@if($projectflag==true)
					<h3>Post a Project</h3>
				@else 
					<h3>Post a Job</h3>
				@endif
			
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							@if($projectflag==true)
								<h3><i class="fas fa-folder-plus"></i> Tell us about your Project</h3>
							@else 
								<h3><i class="fas fa-folder-plus"></i> Job Submission Form</h3>
							@endif
						
						</div>
					
						<div class="content with-padding padding-bottom-10">
							<div class="row">

								<div class="col-xl-4">
									<div class="submit-field">
										@if($projectflag==true)
											<h5>Name of the project</h5>
										@else 
											<h5>Job Title</h5>
										@endif
									
										
										<input type="text" name="title" class="with-border">
									</div>
								</div>
								@if($projectflag==true)
									<input type="hidden" value="0" name="jobpro">
								@else 
									<input type="hidden" value="1" name="jobpro">
								@endif
							
								<div class="col-xl-4">
									<div class="submit-field">
										@if($projectflag==true)
											<h5>Type of Freelancer you prefer</h5>
										@else 
											<h5>Job Type</h5>
										@endif
									
										<select name="type">
											<option value="0">Full Time</option>
											{{-- <option value="freelance">Freelance</option> --}}
											<option value="1">Part Time</option>
											<option value="2">Internship</option>
											<option value="3">Temporary</option>
										</select>
									</div>
								</div>
								<div class="col-xl-4">
								<div class="submit-field">
									@if($projectflag==true)
										<h5>Project Category</h5>
									@else 
										<h5>Job Category</h5>
									@endif
									
										<select name="category" class="form-control input-lg" data-size="7" title="Select Category">
											@php
											if($projectflag==true){
													$job_category=App\Job_category::all();
													
											}else {
												$job_category=App\Job_category::all();
											}
										print_r($job_category);
									//	exit();
											@endphp
											@if($job_category)
												@foreach($job_category as $job_category)
												 @if($job_category)
													<option value="{{$job_cartegory->id}}">{{$job_cartegory->name}}</option>
													@endif
											  @endforeach		
											@endif
											
											<option value="ohter">Other</option>
										</select>
									</div>
								</div>
								@if($projectflag ==false)
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Location</h5>
										<div class="input-with-icon">
											<div id="autocomplete-container">
												<input name="location" id="autocomplete-input" class="with-border" type="text" placeholder="Type Address">
											</div>
											<i class="icon-material-outline-location-on"></i>
										</div>
									</div>
								</div>
								@endif
									<div class="col-xl-4">
									<div class="submit-field">
										@if($projectflag==true)
											<h5>Project Total time</h5>
										@else 
											<h5>Duration</h5>
										@endif
									
										<div class="input-with-icon">
											<div id="autocomplete-container">
												<input name="duration" id="autocomplete-input" class="with-border" type="number" placeholder="Type Accepted delivery time">
											</div>
										
										</div>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="submit-field">
										@if($projectflag==true)
											<h5>budget</h5>
										@else 
											<h5>Salary</h5>
										@endif
									
										<div class="row">
											<div class="col-xl-6">
												<div class="input-with-icon">
													<input name="min" class="with-border" type="text" placeholder="Min">
													<i class="currency">USD</i>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="input-with-icon">
													<input name="max" class="with-border" type="text" placeholder="Max">
													<i class="currency">USD</i>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Skills</h5>
										<div class="keywords-container">
											<div class="keyword-input-container">
												
													<div class="row">
													<div class="col-4">
													<select style="font-size: 12px;" name="skill1">
														@php
														if($projectflag==true){
																$skill=App\Skill::where('type',3)->get();
														}else {
															$skill=App\Skill::where('type',4)->get();
														}
														
														@endphp
														@if($skill)
															 @foreach($skill as $skill)
																<option value="{{$skill->id}}">{{$skill->name}}</option>
															 @endforeach
														@endif
													
														<option value="other">Other</option>
													</select> 
												</div>
												<div class="col-4">
													<select style="font-size: 12px;" name="skill2">
														@php
															if($projectflag==true){
																$skill=App\Skill::where('type',3)->get();
														}else {
															$skill=App\Skill::where('type',4)->get();
														}
														@endphp
														@if($skill)
															 @foreach($skill as $skill)
																<option value="{{$skill->id}}">{{$skill->name}}</option>
															 @endforeach
														@endif
													
														<option value="other">Other</option>
													</select> 
												</div>
												<div class="col-4">
													<select style="font-size: 12px;" name="skill3">
														@php
															if($projectflag==true){
																$skill=App\Skill::where('type',3)->get();
														}else {
															$skill=App\Skill::where('type',4)->get();
														}
														@endphp
														@if($skill)
															 @foreach($skill as $skill)
																<option value="{{$skill->id}}">{{$skill->name}}</option>
															 @endforeach
														@endif
													
														<option value="other">Other</option>
													</select> 
												</div>
												<div class="col-4">
													<select style="font-size: 12px;" name="skill4">
														@php
															if($projectflag==true){
																$skill=App\Skill::where('type',3)->get();
														}else {
															$skill=App\Skill::where('type',4)->get();
														}
														@endphp
														@if($skill)
															 @foreach($skill as $skill)
																<option value="{{$skill->id}}">{{$skill->name}}</option>
															 @endforeach
														@endif
													
														<option value="other">Other</option>
													</select> 
												</div>
												<div class="col-4">
													<select style="font-size: 12px;" name="skill5">
														@php
															if($projectflag==true){
																$skill=App\Skill::where('type',3)->get();
														}else {
															$skill=App\Skill::where('type',4)->get();
														}
														@endphp
														@if($skill)
															 @foreach($skill as $skill)
																<option value="{{$skill->id}}">{{$skill->name}}</option>
															 @endforeach
														@endif
													
														<option value="other">Other</option>
													</select> 
												</div>

															</div>
												
											</div>
											<div class="keywords-list"><!-- keywords go here --></div>
											<div class="clearfix"></div>
										</div>

									</div>
								</div>

								<div class="col-xl-12">
									<div class="submit-field">
										@if($projectflag==true)
											<h5>Project Description</h5>
										@else 
											<h5>Job Description</h5>
										@endif
									
										<textarea cols="30" rows="5" name="description" class="with-border"></textarea>
										<div class="uploadButton margin-top-30">
											<input name="file" class="uploadButton-input" type="file"  id="upload" multiple/>
											<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
											<span class="uploadButton-file-name">Images or documents that might be helpful in describing your job</span>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12 col-md-12 button ripple-effect big margin-top-30 ">
					<i class="fas fa-plus">
					<input type="submit" value="Post" class="button ripple-effect big margin-top-30">
					</i>
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->
	
			<!-- Footer / End -->

		</div>
	</form>
</div>
</section>
	
	<!-- Dashboard Content / End -->

<!-- Dashboard Container / End -->

<!-- Wrapper / End -->



<script src="{{asset('js/job/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/job/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('js/job/js/mmenu.min.js')}}"></script>
<script src="{{asset('js/job/js/tippy.all.min.js')}}"></script>
<script src="{{asset('js/job/js/simplebar.min.js')}}"></script>
<script src="{{asset('js/job/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('js/job/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/job/js/snackbar.js')}}"></script>
<script src="{{asset('js/job/js/clipboard.min.js')}}"></script>
<script src="{{asset('js/job/js/counterup.min.js')}}"></script>
<script src="{{asset('js/job/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('js/job/js/slick.min.js')}}"></script>
<script src="{{asset('js/job/js/custom.js')}}"></script>






</body>

@endsection