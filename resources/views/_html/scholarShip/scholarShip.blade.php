@extends('_html.layouts.app') 
@section('title', 'Scholar Ship') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Scholar Ship</h1>
    </div>
</section>
<!-- Title Header End -->

<!-- ========== Begin: Brows job Category ===============  -->
<section class="brows-job-category">
    <div class="container">
        <div id="scholarShipList">
    @include('_html.ajax.ajaxScholarShip')
        </div>
    </div>
</section>
<!-- ========== Begin: Brows job Category End ===============  -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/scholarShip.js')}}"></script>
@endpush