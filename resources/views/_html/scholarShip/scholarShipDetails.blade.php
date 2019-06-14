@extends('_html.layouts.app') 
@section('title', 'ScholarShip Details') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container" id="scroll">
        <h1>Scholar Ship Details</h1>
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
            <div class="col-md-8 col-sm-8">
                <div class="detail-desc-caption">
                    <h4>{{$data->title}}</h4>
                    <span class="designation">{{$data->institution}}</span>
                    <p>{{$data->description}}</p>
                    <ul>
                        <li><i class="fa fa-briefcase"></i><span>{{getScholarShipType($data->type)}}</span></li>
                        @if(!empty($data->experience))
                        <li><i class="fa fa-flask"></i><span>{{$data->experience.' Year Experience'}}</span></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="get-touch">
                    <h4>Get in Touch</h4>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><span>{{getLocationName($data->location_id).', '. getCountryNameById($data->country_id)}}</span></li>
                        <li><i class="fa fa-envelope"></i><span>{{$data->email}}</span></li>
                        <li><i class="fa fa-globe"></i><span>{{$data->website}}</span></li>
                        <li><i class="fa fa-phone"></i><span>{{$data->phone}}</span></li>
                        <li><i class="fa fa-money"></i><span>{{$data->budget}}</span></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="row no-padd">
            <div class="detail pannel-footer">

                {{--
                <div class="col-md-12 col-sm-12">
                    <ul class="detail-footer-social pull-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div> --}}
                <div class="col-md-7 col-sm-7">
                    <div class="detail-pannel-footer-btn pull-right">
                        <button type="button" class="btn footer-btn btn-success" title="Apply" onclick="applyScholarShipModal()">Apply</button>                        {{-- <a href="#" class="footer-btn blu-btn" title="">Save Draft</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="applyModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Apply</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form id="scholarShipForm">
                    <div class="modal-body">
                        <div class="col-md-12 col-sm-12">

                            <div class="form-group">
                                <label for="comment"></label>
                                <textarea class="form-control" rows="10" id="coverLetter" placeholder="Write .." required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" onclick="applyScholarShip({{$data}})">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- Detail End -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/scholarShip.js')}}"></script>






@endpush