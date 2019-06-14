@extends('_html.layouts.app') 
@section('title', 'Courses') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Courses</h1>
    </div>
</section>
<!-- Title Header End -->

<!-- ========== Page content ===============  -->
<section class="accordion">
    <div class="container">
        <div class="row">
            <div id="coursesList">
    @include('_html.ajax.ajaxCourses')
            </div>

        </div>

    </div>
</section>
<!-- ========== Page content enc ===============  -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/courses.js')}}"></script>

@endpush