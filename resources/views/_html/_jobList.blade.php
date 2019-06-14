@extends('_html.layouts.app') 
@section('title', 'Home') 
@section('content')

<div class="clearfix"></div> 

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Manage Project</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Manage Company List Start -->
<section class="manage-company gray">
    <div class="container">
    	<div class="row">
            <div id="projectList">
                @include('_html.ajax.searchProject')
            </div>
        </div>
    </div>
</section>
<!-- Manage Company List End -->
@endsection
 @push('scripts')
<!-- <script type="text/javascript" src="{{asset('_html/pages/search.js')}}"></script> -->
@endpush