@extends('_html.layouts.app') 
@section('title', 'Courses Details') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container" id="scroll">
        <h1>Courses Details</h1>
    </div>
</section>
<!-- Title Header End -->

<!-- Detail Start -->
<section class="detail-desc">
    <div class="container white-shadow">
        <div class="row">
            <div class="detail-pic">
                <img src="http://via.placeholder.com/150x150" class="img" alt="" /> {{-- <a href="#" class="detail-edit"
                    title="edit"><i class="fa fa-pencil"></i></a> --}}
            </div>

            {{--
            <div class="detail-status">
                <span>2 Days Ago</span>
            </div> --}}

        </div>

        {{-- Message --}}
        <div class="col-md-12 col-sm-12">
            <div class="alert" id="applyMessage"></div>
        </div>

        <div class="row bottom-mrg">
            <div class="col-md-12 col-sm-12">
                <div class="detail-desc-caption">
                    <h4>{{$data->title}}</h4>
                    <span class="designation">{{$data->institution}}</span>
                    <p>{!! $data->description !!}</p>
                </div>
            </div>
        </div>

</section>
<!-- Detail End -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/scholarShip.js')}}"></script>






@endpush