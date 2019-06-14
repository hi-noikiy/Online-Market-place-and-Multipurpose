	@extends('_html.layouts.app') 
	@section('title', 'Search') 
	@section('content')
	<!-- Title Header Start -->
	<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
	<div class="container">
	<h1>Search Jobs</h1>
	</div>
	</section>
	<div class="clearfix"></div>
	<!-- Title Header End -->

	<!-- ========== Begin: Brows job Category ===============  -->
	@php 
		$keyword = $_GET['keyword']; 
		$location = $_GET['location']; 
	@endphp
	<section class="brows-job-category">
	<div class="container">
	<!-- Company Searrch Filter Start -->
	<div class="row extra-mrg">
	<div class="wrap-search-filter">
	<form action="{{url('Search/Read')}}" method="GET">
	<div class="col-md-4 col-sm-4">
	<input type="text" class="form-control" name="keyword" value="{{ $keyword }}" placeholder="Keyword: Name, Tag">
	</div>
	<div class="col-md-3 col-sm-3">
	<input type="text" class="form-control" name="location" value="{{ $location }}" placeholder="Location: City, State, Zip">
	</div>
	<div class="col-md-3 col-sm-3">
	<select class="selectpicker form-control" multiple title="All Categories">
	<option>Information Technology</option>
	<option>Mechanical</option>
	<option>Hardware</option>
	</select>

	</div>
	<div class="col-md-2 col-sm-2">
	<button type="submit" name="submit" class="btn btn-primary">Filter</button>
	</div>
	</form>
	</div>
	</div>
	<!-- Company Searrch Filter End -->
	@foreach($search as $row)
	<div class="item-click">
	<article>
	<div class="brows-job-list">
	<div class="col-md-1 col-sm-2 small-padding">
	<div class="brows-job-company-img">
	<a href="job-detail.html"><img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" /></a>
	</div>
	</div>
	<div class="col-md-6 col-sm-5">
	<div class="brows-job-position">
	<a href=""><h3>{{ $row->title }}</h3></a>
	<p>
	<!-- <span>Autodesk</span><span class="brows-job-sallery"> --><i class="fa fa-dollar"></i>{{ $row->job_price }}</span>
	<span class="job-type cl-success bg-trans-success">
	@if($row->job_type ==1) Full-time @endif
	@if($row->job_type ==2) Part-time @endif
	</span>
	</p>
	</div>
	</div>
	<div class="col-md-3 col-sm-3">
	<div class="brows-job-location">
	<p><i class="fa fa-map-marker"></i>{{ $row->name }}</p>
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
	@endforeach
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
	@endsection