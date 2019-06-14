@extends('_html.layouts.app') 
@section('title', 'Company Profile') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
    <div class="container">
        <h1>Company Profilee</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Candidate Profile Start -->
<section class="detail-desc advance-detail-pr gray-bg">
    <div class="container white-shadow">
        <div class="row">
        <div class="detail-pic"><img src="{{asset('_html/assets/img/can-2.png')}}" class="img" alt="" /><a href="#" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>
            <div class="detail-status"><span>Active Now</span></div>
        </div>

        <div class="row bottom-mrg">
            <div class="col-md-12 col-sm-12">
                <div class="advance-detail detail-desc-caption">
                    <h4>Adam Declizer</h4><span class="designation">CEO & Founder</span>
                    <ul>
                        <li><strong class="j-view">742</strong>Job Post</li>
                        <li><strong class="j-applied">570</strong>Job Like</li>
                        <li><strong class="j-shared">210</strong>Job Shared</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row no-padd">
            <div class="detail pannel-footer">
                <div class="col-md-5 col-sm-5">
                    <ul class="detail-footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-7 col-sm-7">
                    <div class="detail-pannel-footer-btn pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="footer-btn grn-btn"
                            title="">Edit Now</a><a href="#" class="footer-btn blu-btn" title="">Save Draft</a></div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="full-detail-description full-detail gray-bg">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="full-card">
                <div class="deatil-tab-employ tool-tab">
                    <ul class="nav simple nav-tabs" id="simple-design-tab">
                        <li class="active"><a href="#about">About</a></li>
                        <li><a href="#address">Address</a></li>
                        <li><a href="#post-job">Job Posted</a></li>
                        <li><a href="#friends">Friends</a></li>
                        <li><a href="#messages">Messages <span class="info-bar">6</span></a></li>
                        <li><a href="#settings">Settings</a></li>
                    </ul>
                    <!-- Start All Sec -->
                    <div class="tab-content">
                        <!-- Start About Sec -->
                        <div id="about" class="tab-pane fade in active">
                            <h3>About Adam Declizer</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum sed diam ac fermentum.
                                Mauris nec pellentesque neque. Cras nec diam euismod, congue sapien eu, fermentum libero.
                                Vestibulum quis sem.</p>
                        </div>
                        <!-- End About Sec -->

                        <!-- Start Address Sec -->
                        <div id="address" class="tab-pane fade">
                            <h3>Address Info</h3>
                            <ul class="job-detail-des">
                                <li><span>Address:</span>SCO 210, Neez Plaza</li>
                                <li><span>City:</span>Mohali</li>
                                <li><span>State:</span>Punjab</li>
                                <li><span>Country:</span>India</li>
                                <li><span>Zip:</span>520 548</li>
                                <li><span>Telephone:</span>+91 123 456 7854</li>
                                <li><span>Fax:</span>(622) 123 456</li>
                                <li><span>Email:</span>youremail@gmail.com</li>
                            </ul>
                        </div>
                        <!-- End Address Sec -->

                        <!-- Start Job List -->
                        <div id="post-job" class="tab-pane fade">
                            <h3>You have 22 job post</h3>
                            <div class="row">
                                <article>
                                    <div class="mng-company">
                                        <div class="col-md-2 col-sm-2">
                                            <div class="mng-company-pic"><img src="assets/img/com-1.jpg" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-5 col-sm-5">
                                            <div class="mng-company-name">
                                                <h4>Autodesk <span class="cmp-tagline">(Software Company)</span></h4><span class="cmp-time">10 Hour Ago</span></div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <div class="mng-company-location">
                                                <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
                                        </div>

                                    </div>
                                    <span class="tg-themetag tg-featuretag">Premium</span>
                                </article>

                                <article>
                                    <div class="mng-company">
                                        <div class="col-md-2 col-sm-2">
                                            <div class="mng-company-pic"><img src="assets/img/com-2.jpg" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-5 col-sm-5">
                                            <div class="mng-company-name">
                                                <h4>Google <span class="cmp-tagline">(Software Company)</span></h4><span class="cmp-time">10 Hour Ago</span></div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <div class="mng-company-location">
                                                <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
                                        </div>

                                    </div>
                                </article>

                                <article>
                                    <div class="mng-company">
                                        <div class="col-md-2 col-sm-2">
                                            <div class="mng-company-pic"><img src="assets/img/com-3.jpg" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-5 col-sm-5">
                                            <div class="mng-company-name">
                                                <h4>Honda <span class="cmp-tagline">(Motor Agency)</span></h4><span class="cmp-time">10 Hour Ago</span></div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <div class="mng-company-location">
                                                <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
                                        </div>

                                    </div>
                                </article>

                                <article>
                                    <div class="mng-company">
                                        <div class="col-md-2 col-sm-2">
                                            <div class="mng-company-pic"><img src="assets/img/com-4.jpg" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-5 col-sm-5">
                                            <div class="mng-company-name">
                                                <h4>Microsoft <span class="cmp-tagline">(Software Company)</span></h4><span class="cmp-time">10 Hour Ago</span></div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <div class="mng-company-location">
                                                <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
                                        </div>

                                    </div>
                                    <span class="tg-themetag tg-featuretag">Premium</span>
                                </article>

                                <article>
                                    <div class="mng-company">
                                        <div class="col-md-2 col-sm-2">
                                            <div class="mng-company-pic"><img src="assets/img/com-5.jpg" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-5 col-sm-5">
                                            <div class="mng-company-name">
                                                <h4>Skype <span class="cmp-tagline">(Software Company)</span></h4><span class="cmp-time">10 Hour Ago</span></div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <div class="mng-company-location">
                                                <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
                                        </div>

                                    </div>
                                </article>

                                <article>
                                    <div class="mng-company">
                                        <div class="col-md-2 col-sm-2">
                                            <div class="mng-company-pic"><img src="assets/img/com-6.jpg" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-5 col-sm-5">
                                            <div class="mng-company-name">
                                                <h4>Virtue <span class="cmp-tagline">(Development Company)</span></h4><span class="cmp-time">10 Hour Ago</span></div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <div class="mng-company-location">
                                                <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
                                        </div>

                                    </div>
                                </article>

                                <article>
                                    <div class="mng-company">
                                        <div class="col-md-2 col-sm-2">
                                            <div class="mng-company-pic"><img src="assets/img/com-7.jpg" class="img-responsive" alt=""></div>
                                        </div>

                                        <div class="col-md-5 col-sm-5">
                                            <div class="mng-company-name">
                                                <h4>Twitter <span class="cmp-tagline">(Social Media Company)</span></h4>
                                                <span
                                                    class="cmp-time">10 Hour Ago</span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <div class="mng-company-location">
                                                <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-1">
                                            <div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
                                        </div>

                                    </div>
                                    <span class="tg-themetag tg-featuretag">Premium</span>
                                </article>
                            </div>
                            <div class="row">
                                <ul class="pagination">
                                    <li><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Job List -->

                        <!-- Start Friend List -->
                        <div id="friends" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status pending">Pending</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-1.png" class="img-responsive" alt=""></div>
                                            <h4>Charles Hopman</h4><span>Web designer</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status available">Available</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-2.png" class="img-responsive" alt=""></div>
                                            <h4>Ethan Marion</h4><span>IOS designer</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status pending">Pending</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-3.png" class="img-responsive" alt=""></div>
                                            <h4>Zara Clow</h4><span>UI/UX designer</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status pending">Pending</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-4.png" class="img-responsive" alt=""></div>
                                            <h4>Henry Crooks</h4><span>PHP Developer</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status available">Available</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-2.png" class="img-responsive" alt=""></div>
                                            <h4>Joseph Macfarlan</h4><span>App Developer</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status pending">Pending</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-1.png" class="img-responsive" alt=""></div>
                                            <h4>Zane Joyner</h4><span>Html Expert</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status pending">Pending</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-3.png" class="img-responsive" alt=""></div>
                                            <h4>Anna Hoysted</h4><span>UI/UX Designer</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status available">Available</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-4.png" class="img-responsive" alt=""></div>
                                            <h4>Spencer Birdseye</h4><span>SEO Expert</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                    <div class="manage-cndt">
                                        <div class="cndt-status pending">Pending</div>
                                        <div class="cndt-caption">
                                            <div class="cndt-pic"><img src="assets/img/can-1.png" class="img-responsive" alt=""></div>
                                            <h4>Eden Macaulay</h4><span>Web designer</span>
                                            <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                        </div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <ul class="pagination">
                                        <li><a href="#">«</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Friend List -->

                        <!-- Start Message -->
                        <div id="messages" class="tab-pane fade">
                            <div class="inbox-body inbox-widget">
                                <div class="mail-card">
                                    <header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#full-message" aria-expanded="false">
                                        <div class="card-title flexbox">
                                            <img class="img-responsive img-circle avatar" src="assets/img/can-1.png" alt="...">
                                            <div>
                                                <h6>Daniel Duke</h6>
                                                <small>Today at 07:34 AM</small>
                                                <small><a class="text-info collapsed" href="#detail-view" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

                                                <div class="no-collapsing cursor-text collapse" id="detail-view" aria-expanded="false" style="height: 0px;">
                                                    <small class="d-inline-block">From:</small>
                                                    <small>theadmin@thetheme.io</small>
                                                    <br>
                                                    <small class="d-inline-block">To:</small>
                                                    <small>subscriber@yahoo.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="collapse" id="full-message" aria-expanded="false" style="height: 0px;">
                                        <div class="card-body">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mail-card unread">
                                    <header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-2" aria-expanded="false">
                                        <div class="card-title flexbox">
                                            <img class="img-responsive img-circle avatar" src="assets/img/can-2.png" alt="...">
                                            <div>
                                                <h6>Daniel Duke</h6>
                                                <small>Today at 07:34 AM</small>
                                                <small><a class="text-info collapsed" href="#detail-view1" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

                                                <div class="no-collapsing cursor-text collapse" id="detail-view1" aria-expanded="false" style="height: 0px;">
                                                    <small class="d-inline-block">From:</small>
                                                    <small>theadmin@thetheme.io</small>
                                                    <br>
                                                    <small class="d-inline-block">To:</small>
                                                    <small>subscriber@yahoo.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="collapse" id="meaages-2" aria-expanded="false" style="height: 0px;">
                                        <div class="card-body">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mail-card">
                                    <header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-3" aria-expanded="false">
                                        <div class="card-title flexbox">
                                            <img class="img-responsive img-circle avatar" src="assets/img/can-1.png" alt="...">
                                            <div>
                                                <h6>Daniel Duke</h6>
                                                <small>Today at 07:34 AM</small>
                                                <small><a class="text-info collapsed" href="#detail-view2" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

                                                <div class="no-collapsing cursor-text collapse" id="detail-view2" aria-expanded="false" style="height: 0px;">
                                                    <small class="d-inline-block">From:</small>
                                                    <small>theadmin@thetheme.io</small>
                                                    <br>
                                                    <small class="d-inline-block">To:</small>
                                                    <small>subscriber@yahoo.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="collapse" id="meaages-3" aria-expanded="false" style="height: 0px;">
                                        <div class="card-body">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mail-card">
                                    <header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-4" aria-expanded="false">
                                        <div class="card-title flexbox">
                                            <img class="img-responsive img-circle avatar" src="assets/img/can-3.png" alt="...">
                                            <div>
                                                <h6>Daniel Duke</h6>
                                                <small>Today at 07:34 AM</small>
                                                <small><a class="text-info collapsed" href="#detail-view3" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

                                                <div class="no-collapsing cursor-text collapse" id="detail-view3" aria-expanded="false" style="height: 0px;">
                                                    <small class="d-inline-block">From:</small>
                                                    <small>theadmin@thetheme.io</small>
                                                    <br>
                                                    <small class="d-inline-block">To:</small>
                                                    <small>subscriber@yahoo.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="collapse" id="meaages-4" aria-expanded="false" style="height: 0px;">
                                        <div class="card-body">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mail-card unread">
                                    <header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="meaages-5" aria-expanded="false">
                                        <div class="card-title flexbox">
                                            <img class="img-responsive img-circle avatar" src="assets/img/can-4.png" alt="...">
                                            <div>
                                                <h6>Daniel Duke</h6>
                                                <small>Today at 07:34 AM</small>
                                                <small><a class="text-info collapsed" href="#detail-view4" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

                                                <div class="no-collapsing cursor-text collapse" id="detail-view4" aria-expanded="false" style="height: 0px;">
                                                    <small class="d-inline-block">From:</small>
                                                    <small>theadmin@thetheme.io</small>
                                                    <br>
                                                    <small class="d-inline-block">To:</small>
                                                    <small>subscriber@yahoo.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="collapse" id="meaages-5" aria-expanded="false" style="height: 0px;">
                                        <div class="card-body">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mail-card">
                                    <header class="card-header cursor-pointer">
                                        <div class="card-title flexbox">
                                            <img class="img-responsive img-circle avatar" src="assets/img/can-4.png" alt="...">
                                            <div>
                                                <h6>Daniel Duke</h6>
                                                <small>Today at 07:34 AM</small>
                                                <small><a class="text-info collapsed" href="#detail-view-6" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

                                                <div class="no-collapsing cursor-text collapse" id="detail-view-6" aria-expanded="false" style="height: 0px;">
                                                    <small class="d-inline-block">From:</small>
                                                    <small>theadmin@thetheme.io</small>
                                                    <br>
                                                    <small class="d-inline-block">To:</small>
                                                    <small>subscriber@yahoo.com</small>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="" id="meaages-6">
                                        <div class="card-body">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                                                quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                                et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi
                                                sint occaecati cupiditate non provident, similique sunt in culpa qui officia
                                                deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem
                                                rerum facilis est et expedita distinctio. </p>
                                            <hr>
                                            <h5 class="text-lighter">
                                                <i class="fa fa-paperclip"></i>
                                                <small>Attchments (3)</small>
                                            </h5>
                                            <div class="attachment-block">
                                                <div class="thumb">
                                                    <img src="assets/img/gallery1.jpg" alt="img" class="img-responsive">
                                                </div>
                                                <div class="attachment-info">
                                                    <h6>Profile Pic <span>( 1.69 mb )</span></h6>
                                                    <ul>
                                                        <li><a href="javascript:void(0)">Download</a></li>
                                                        <li><a href="javascript:void(0)">View</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="attachment-block">
                                                <div class="thumb">
                                                    <img src="assets/img/gallery2.jpg" alt="img" class="img-responsive">
                                                </div>
                                                <div class="attachment-info">
                                                    <h6>Profile Pic <span>( 1.69 mb )</span></h6>
                                                    <ul>
                                                        <li><a href="javascript:void(0)">Download</a></li>
                                                        <li><a href="javascript:void(0)">View</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="attachment-block">
                                                <div class="thumb">
                                                    <img src="assets/img/gallery3.jpg" alt="img" class="img-responsive">
                                                </div>
                                                <div class="attachment-info">
                                                    <h6>Profile Pic <span>( 1.69 mb )</span></h6>
                                                    <ul>
                                                        <li><a href="javascript:void(0)">Download</a></li>
                                                        <li><a href="javascript:void(0)">View</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Message -->

                        <!-- Start Settings -->
                        <div id="settings" class="tab-pane fade">
                            <div class="row no-mrg">
                                <h3>Edit Profile</h3>
                                <div class="edit-pro">
                                    <div class="col-md-4 col-sm-6">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Matthew">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" placeholder="Else">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Dana">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="dana.mathew@gmail.com">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" placeholder="+91 258 475 6859">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Zip / Postal</label>
                                        <input type="text" class="form-control" placeholder="258 457 528">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="204 Lowes Alley">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Address 2</label>
                                        <input type="text" class="form-control" placeholder="Software Developer">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Organization</label>
                                        <input type="text" class="form-control" placeholder="Software Developer">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="Chandigarh">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>State</label>
                                        <input type="text" class="form-control" placeholder="Punjab">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Country</label>
                                        <input type="text" class="form-control" placeholder="India">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" placeholder="*********">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" placeholder="*********">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" placeholder="*********">
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>About you</label>
                                        <textarea class="form-control" placeholder="Write Something"></textarea>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Upload Profile Pic</label>
                                        <form action="/upload-target" class="dropzone dz-clickable profile-pic">
                                            <div class="dz-default dz-message">
                                                <i class="fa fa-cloud-upload"></i>
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Upload Profile Cover</label>
                                        <form action="/upload-target" class="dropzone dz-clickable profile-cover">
                                            <div class="dz-default dz-message">
                                                <i class="fa fa-cloud-upload"></i>
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="button" class="update-btn">Update Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Settings -->
                    </div>
                    <!-- Start All Sec -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script>

@endpush