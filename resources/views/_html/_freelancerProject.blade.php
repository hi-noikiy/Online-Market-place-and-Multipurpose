@extends('_html.layouts.app') 
@section('title', 'Home') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Browse Project</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <div id="projectList">
            @include('_html.ajax.freelancerProject')
        </div>
    </div>
</section>
<!-- ========== Begin: Brows job Category End ===============  -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/freelancer.js')}}"></script>
@endpush