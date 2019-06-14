@extends('_html.layouts.app') 
@section('title', 'Job by Category')

@section('content')
<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Browse Jobs</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<section class="accordion">
	<div class="container">
		<div class="row">
			<!-- Single Freelancer & Premium job -->
			@foreach($showjobByCategory as $item)
			<div class="col-md-4 col-sm-6">
				<div class="popular-jobs-container">
					<div class="popular-jobs-box">
						<span class="popular-jobs-status bg-success">hourly</span>
						<h4 class="flc-rate">${{ $item->job_price}}</h4>
						<div class="popular-jobs-box">
							<div class="popular-jobs-box-detail">
								<h4>{{ $item->title}}</h4>
								<h6>{{ $item->name}}</h6>
								<span class="desination">{{ $item->slug }}</span>
							</div>
						</div>
					</div>
					<a href="{{ URL::to('/JobDetails/'.$item->id) }}" class="btn btn-popular-jobs bt-1">View Detail</a>
				</div>
			</div>
			@endforeach{{ $showjobByCategory->links() }}
		</div>
	</div>
</section>
@endsection