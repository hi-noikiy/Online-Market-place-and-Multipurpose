@extends('_html.layouts.app') 
@section('title', 'Home') 
@section('content')

<!-- Main Banner Section Start -->
<div class="banner" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="fakeLoader"></div>
    <div class="container">
        <div class="banner-caption">
            <div class="col-md-12 col-sm-12 banner-text">
                <h1>Browse Jobs</h1>
                {{--
                <form class="form-horizontal" action="{{url('Search/Read')}}" method="GET" id="searchJob"> --}}
                    <form class="form-horizontal" action="#" method="GET" id="searchJob">
                        <div class="col-md-4 no-padd">
                            <div class="input-group">
                                <input type="text" class="form-control right-bor" name="keyword" id="keyword" placeholder="Topic">
                            </div>
                        </div>

                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select name="country" id="country" class="form-control" onchange="getCities()">
                                <option value="">Choose Country</option>
                                @foreach ($data['countries'] as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select name="city" id="city" class="form-control">
                                <option value="">Choose City</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-2 no-padd">
                            <div class="input-group">
                                {{-- <button type="submit" name="search" id="search" class="btn btn-primary" onclick="searchJob()">Search Job</button>                                --}}
                                <button type="button" name="search" id="search" class="btn btn-primary">Search Job</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <div class="company-brand">
        <div class="container">
            <div id="company-brands" class="owl-carousel">
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/microsoft-home.png')}}" class="img-responsive" alt="" />
                </div>
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/img-home.png')}}" class="img-responsive" alt="" />
                </div>
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/mothercare-home.png')}}" class="img-responsive" alt="" />
                </div>
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/paypal-home.png')}}" class="img-responsive" alt="" />
                </div>
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/serv-home.png')}}" class="img-responsive" alt="" />
                </div>
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/xerox-home.png')}}" class="img-responsive" alt="" />
                </div>
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/yahoo-home.png')}}" class="img-responsive" alt="" />
                </div>
                <div class="brand-img">
                    <img src="{{asset('_html/assets/img/mothercare-home.png')}}" class="img-responsive" alt="" />
                </div>
            </div>
        </div>
    </div>

</div>
<div class="clearfix"></div>
<!-- Main Banner Section End -->

<!-- Jobs By Category Start-->
<section>
    <div class="container">

        <div class="row">
            <div class="main-heading">
                <h2>Browse <span>Category</span></h2>
            </div>
        </div>

        <div class="row">
            <div id="categoryList">
    @include('_html.ajax.ajaxHomeCategories')
            </div>
        </div>

    </div>
</section>
<!-- Job By Category End-->

<!-- video section Start -->
<section class="video-sec dark" id="video" style="background-image:url(http://via.placeholder.com/1920x850);">
    <div class="container">
        <div class="row">
            <div class="main-heading">
                <p>Best For Your Projects</p>
                <h2>Watch Our <span>video</span></h2>
            </div>
        </div>
        <!--/row-->
        <div class="video-part">
            <a href="#" data-toggle="modal" data-target="#my-video" class="video-btn"><i class="fa fa-play"></i></a>
        </div>
    </div>
</section>
<!-- video section Start -->

<!-- Work Process Counter Section Start -->
{{--
<section class="wp-process">
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="main-heading">
                    <p>Most View Jobs</p>
                    <h2>Hot & Featured <span>Jobs</span></h2>
                </div>
            </div>
        </div>
        <!--/row-->

        <div class="row">
            <!-- Single Freelancer & Premium job -->
            <div class="col-md-4 col-sm-4">
                <div class="popular-jobs-container">
                    <div class="popular-jobs-box">
                        <span class="popular-jobs-status bg-success">hourly</span>
                        <h4 class="flc-rate">$17/hr</h4>
                        <div class="popular-jobs-box">
                            <div class="popular-jobs-box-detail">
                                <h4>Google Inc</h4>
                                <span class="desination">Software Designer</span>
                            </div>
                        </div>
                        <div class="popular-jobs-box-extra">
                            <ul>
                                <li>Php</li>
                                <li>Android</li>
                                <li>Html</li>
                                <li class="more-skill bg-primary">+3</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                        </div>
                    </div>
                    <a href="popular-jobsr-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
                </div>
            </div>

            <!-- Single Freelancer & Premium job -->
            <div class="col-md-4 col-sm-4">
                <div class="popular-jobs-container">
                    <div class="popular-jobs-box">
                        <span class="popular-jobs-status bg-warning">Monthly</span>
                        <h4 class="flc-rate">$570/Mo</h4>
                        <div class="popular-jobs-box">
                            <div class="popular-jobs-box-detail">
                                <h4>Duff Beer</h4>
                                <span class="desination">Marketting</span>
                            </div>
                        </div>
                        <div class="popular-jobs-box-extra">
                            <ul>
                                <li>Php</li>
                                <li>Android</li>
                                <li>Html</li>
                                <li class="more-skill bg-primary">+3</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                        </div>
                    </div>
                    <a href="popular-jobsr-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
                </div>
            </div>

            <!-- Single Freelancer & Premium job -->
            <div class="col-md-4 col-sm-4">
                <div class="popular-jobs-container">
                    <div class="popular-jobs-box">
                        <span class="popular-jobs-status bg-info">Weekly</span>
                        <h4 class="flc-rate">$200/We</h4>
                        <div class="popular-jobs-box">
                            <div class="popular-jobs-box-detail">
                                <h4>Cyberdyne Systems</h4>
                                <span class="desination">Human Resource</span>
                            </div>
                        </div>
                        <div class="popular-jobs-box-extra">
                            <ul>
                                <li>Php</li>
                                <li>Android</li>
                                <li>Html</li>
                                <li class="more-skill bg-primary">+3</li>
                            </ul>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                        </div>
                    </div>
                    <a href="popular-jobsr-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a>
                </div>
            </div>
        </div>

        <!-- More -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-center">
                    <a href="freelancing-jobs.html" class="btn btn-primary">Load More</a>
                </div>
            </div>
        </div>

    </div>
</section> --}}

<!-- ====================== How It Work ================= -->
<section class="how-it-works">
    <div class="container">

        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="main-heading">
                    <p>Working Process</p>
                    <h2>How It <span>Works</span></h2>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4 col-sm-4">
                <div class="working-process">
                    <span class="process-img">
                        <img src="{{asset('_html/assets/img/step-1.png')}}" class="img-responsive" alt="" />
                        <span class="process-num">01</span>
                    </span>
                    <h4>Create An Account</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place
                        best.
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="working-process">
                    <span class="process-img">
                        <img src="{{asset('_html/assets/img/step-2.png')}}" class="img-responsive" alt="" />
                        <span class="process-num">02</span>
                    </span>
                    <h4>Search Jobs</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place
                        best.
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="working-process">
                    <span class="process-img">
                        <img src="{{asset('_html/assets/img/step-3.png')}}" class="img-responsive" alt="" />
                        <span class="process-num">03</span>
                    </span>
                    <h4>Save & Apply</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place
                        best.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
<div class="clearfix"></div>

<!-- testimonial section Start -->
{{--
<section class="testimonial" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="main-heading">
                <p>What Say Our Client</p>
                <h2>Our Success <span>Stories</span></h2>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <div id="client-testimonial-slider" class="owl-carousel">
                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Lacky Mole</h3>
                    <ul class="client-testimonial-rating">
                        <li class="fa fa-star-o"></li>
                        <li class="fa fa-star-o"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                </div>

                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Karan Wessi</h3>
                    <ul class="client-testimonial-rating">
                        <li class="fa fa-star-o"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                </div>

                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Roul Pinchai</h3>
                    <ul class="client-testimonial-rating">
                        <li class="fa fa-star-o"></li>
                        <li class="fa fa-star-o"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                </div>

                <div class="client-testimonial">
                    <div class="pic">
                        <img src="http://via.placeholder.com/150x150" alt="">
                    </div>
                    <p class="client-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
                    </p>
                    <h3 class="client-testimonial-title">Adam Jinna</h3>
                    <ul class="client-testimonial-rating">
                        <li class="fa fa-star-o"></li>
                        <li class="fa fa-star-o"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- testimonial section End -->

<!-- pricing Section Start -->
{{--
<section class="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heading">
                    <p>Top Freelancer</p>
                    <h2>Hire Expert <span>Freelancer</span></h2>
                </div>
            </div>
        </div>
        <!--/row-->

        <div class="row">

            <!-- Single Freelancer Style 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="freelance-container style-2">
                    <div class="freelance-box">
                        <span class="freelance-status">Available</span>
                        <h4 class="flc-rate">$17/hr</h4>
                        <div class="freelance-inner-box">
                            <div class="freelance-box-thumb">
                                <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                            </div>
                            <div class="freelance-box-detail">
                                <h4>Agustin L. Smith</h4>
                                <span class="location">Australia</span>
                            </div>
                            <div class="rattings">
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star-half fill"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="freelance-box-extra">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                            <ul>
                                <li>Php</li>
                                <li>Android</li>
                                <li>Html</li>
                                <li class="more-skill bg-primary">+3</li>
                            </ul>
                        </div>
                        <a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a>
                        <a href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
                    </div>
                </div>
            </div>

            <!-- Single Freelancer Style 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="freelance-container style-2">
                    <div class="freelance-box">
                        <span class="freelance-status bg-warning">At Work</span>
                        <h4 class="flc-rate">$22/hr</h4>
                        <div class="freelance-inner-box">
                            <div class="freelance-box-thumb">
                                <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                            </div>
                            <div class="freelance-box-detail">
                                <h4>Delores R. Williams</h4>
                                <span class="location">United States</span>
                            </div>
                            <div class="rattings">
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star-half fill"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="freelance-box-extra">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                            <ul>
                                <li>Php</li>
                                <li>Android</li>
                                <li>Html</li>
                                <li class="more-skill bg-primary">+3</li>
                            </ul>
                        </div>
                        <a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a>
                        <a href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
                    </div>
                </div>
            </div>

            <!-- Single Freelancer Style 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="freelance-container style-2">
                    <div class="freelance-box">
                        <span class="freelance-status">Available</span>
                        <h4 class="flc-rate">$19/hr</h4>
                        <div class="freelance-inner-box">
                            <div class="freelance-box-thumb">
                                <img src="{{asset('_html/assets/img/can-5.jpg')}}" class="img-responsive img-circle" alt="" />
                            </div>
                            <div class="freelance-box-detail">
                                <h4>Daniel Disroyer</h4>
                                <span class="location">Bangladesh</span>
                            </div>
                            <div class="rattings">
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star fill"></i>
                                <i class="fa fa-star-half fill"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="freelance-box-extra">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                            <ul>
                                <li>Php</li>
                                <li>Android</li>
                                <li>Html</li>
                                <li class="more-skill bg-primary">+3</li>
                            </ul>
                        </div>
                        <a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a>
                        <a href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Single Freelancer -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-center">
                    <a href="freelancers-2.html" class="btn btn-primary">Load More</a>
                </div>
            </div>
        </div>

    </div>
</section> --}}
<!-- End Pricing Section -->

<!-- Download app Section Start -->
<section class="download-app" style="background-image:url(http://via.placeholder.com/1920x850);">
    <div class="container">
        <div class="col-md-5 col-sm-5 hidden-xs">
            <img src="{{asset('_html/assets/img/iphone.png')}}" alt="iphone" class="img-responsive" />
        </div>
        <div class="col-md-7 col-sm-7">
            <div class="app-content">
                <h2>Download Our Best Apps</h2>
                <h4>Best oppertunity in your hand</h4>
                <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus,
                    id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci. Curabitur
                    blandit, diam ut ornare ultricies.</p>
                <a href="#" class="btn call-btn"><i class="fa fa-apple"></i>Download</a>
                <a href="#" class="btn call-btn"><i class="fa fa-android"></i>Download</a>
            </div>
        </div>
        <!--/row-->
    </div>
</section>
<div class="clearfix"></div>
<!-- Download app Section End -->
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageData(page);
    });

    function paginageData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "HomeAjaxCategories?page=" + page,
            success: function(data) {
                $('#categoryList').html(data);
            }
        });
    }

</script>
{{-- <script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script> --}}
@endpush