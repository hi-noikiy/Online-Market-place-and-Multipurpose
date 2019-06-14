@extends('_admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Home</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

<div class="container-fluid">
				
    <!-- /row -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption info">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-briefcase"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                @php
                                    $job_count=App\Job::where('jobpro',1)->count();
                                    $percent=($job_count/100)*100;
                                @endphp
                                <h3>{{$job_count}}</h3>
                                <span>Jobs Posted</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-info">
                                <span style="width:{{$percent}}%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption info">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-briefcase"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                @php
                                    $free_order=App\ProFreeOrder::where('freelancer_type',0)->where('status',1)->count();
                                    $percent=($free_order/100)*100;
                                @endphp
                                <h3>{{$free_order}}</h3>
                                <span>Freelancer Order Complete</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-info">
                                <span style="width:{{$percent}}%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption info">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-briefcase"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                @php
                                    $free_order=App\ProFreeOrder::where('freelancer_type',1)->where('status',1)->count();
                                    $percent=($free_order/100)*100;
                                @endphp
                                <h3>{{$free_order}}</h3>
                                <span>Pro Completed Services</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-info">
                                <span style="width:{{$percent}}%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption info">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-briefcase"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                @php
                                    $circular=App\CircularForCandidate::where('status',1)->count();
                                    $percent=($circular/100)*100;
                                @endphp
                                <h3>{{$circular}}</h3>
                                <span>Job Circular Posted</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-info">
                                <span style="width:{{$percent}}%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption info">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-briefcase"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                @php
                                    $job_count=App\Job::where('jobpro',1)->count();
                                    $percent=($job_count/100)*100;
                                @endphp
                                <h3>${{$job_count}}</h3>
                                <span>Total Transection</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-info">
                                <span style="width:{{$percent}}%;" class="bg-info widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption danger">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-happy"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            @php
                                $all_user=App\All_user::all();
                                $percent=(count($all_user)/100)*100;
                            @endphp
                            <div class="widget-detail">
                                <h3>{{count($all_user)}}</h3>
                                <span>Total Members</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-danger">
                                <span style="width:{{$percent}}%;" class="bg-danger widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption success">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-tools"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                 @php
                                    $job_count=App\Job::where('jobpro',0)->count();
                                    $percent=($job_count/100)*100;
                                @endphp
                                <h3>{{$job_count}}</h3>
                                <span>Tasks Posted</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-sucess">
                                <span style="width:{{$percent}}%;" class="bg-success widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="widget standard-widget">
                <div class="row">
                    <div class="widget-caption warning">
                        <div class="col-xs-4 no-pad">
                            <i class="icon icon-trophy"></i>
                        </div>
                        <div class="col-xs-8 no-pad">
                            <div class="widget-detail">
                                <h3>870</h3>
                                <span>Scholarship</span>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="widget-line bg-warning">
                                <span style="width:70%;" class="bg-warning widget-horigental-line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- row -->
    <div class="row">
    
        <!-- Area Chart -->
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-more"></i>
                            </button>
                            <ul class="dropdown-menu pull-right animated flipInX">
                                <li><a href="#">This Month</a></li>
                                <li><a href="#">Last Month</a></li>
                                <li><a href="#">From 6 Month</a></li>
                            </ul>
                        </div>
                    </div>
                    <h4 class="mb-0">Your Profile Views</h4>
                </div>
                <div class="card-body">
                    <ul class="list-inline text-center m-t-40">
                        <li>
                            <h5><i class="fa fa-circle m-r-5 cl-purple"></i>Page View</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 cl-inverse"></i>Appy Job</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 cl-success"></i>Registerd User</h5>
                        </li>
                    </ul>
                    <div class="chart" id="profile-view" style="height: 300px;"></div>
                </div>
            </div>
        </div>
        
        <!-- Donut Chart -->
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">View</h4>
                </div>
                <div class="card-body">
                    <ul class="list-inline text-center m-t-40">
                        <li>
                            <h5><i class="fa fa-circle m-r-5 cl-inverse"></i> 12 Sales</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 cl-purple"></i> 20 Order</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 cl-success"></i> 200 Store</h5>
                        </li>
                    </ul>
                    <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                </div>
            </div>	
        </div>
        
    </div>
    <!-- /.row -->
    
    <!-- Row -->
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="social social-box">
                <div class="social-slick-4 facebook-box">
                    <i class="fa fa-facebook"></i>
                    @php
                        $facebook=DB::table('social_shares')->where('medium','facebook')->count();
                        $tweeter=DB::table('social_shares')->where('medium','tweeter')->count();
                        $instagram=DB::table('social_shares')->where('medium','instagram')->count();
                        $linkedin=DB::table('social_shares')->where('medium','linkedin')->count();
                    @endphp
                    <h3>{{$facebook}}</h3>
                    <span>Facebook Shares</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="social social-box">
                <div class="social-slick-4 google-plus-box">
                    <i class="fa fa-linkedin"></i>
                    <h3>{{$linkedin}}</h3>
                    <span>Linkedin</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="social social-box">
                <div class="social-slick-4 twitter-box">
                    <i class="fa fa-twitter"></i>
                    <h3>{{$tweeter}}</h3>
                    <span>Twitter Shares</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
            <div class="social social-box">
                <div class="social-slick-4 instagram-box">
                    <i class="fa fa-instagram"></i>
                    <h3>{{$instagram}}</h3>
                    <span>Instagra Followers</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Row -->
    <div class="row">
        <!-- col-md-6 -->
        <div class="col-md-6">
            <div class="card">
            
                <div class="card-header">
                    <h4>Popular Freelancer</h4>
                </div>
                
                <div class="card-body">
                    <div class="todo-list todo-list-hover todo-list-divided">
                        <div class="todo todo-default">
                            <div class="sm-avater list-avater">
                                <img src="{{asset('_admin/assets/img/user-1.jpg')}}" class="img-responsive img-circle" alt="" />
                                <span class="user-status bage-warning"></span>
                            </div>
                            <h5 class="ct-title">Michel Chark<span class="ct-designation">UI/UX Designer</span></h5>
                            <div class="badge badge-action">
                                <a href="#" class="btn btn-user btn-default btn-round btn-outline">Hire</a>
                            </div>
                        </div>
                        <div class="todo todo-default">
                            <div class="sm-avater list-avater">
                                <img src="{{asset('_admin/assets/img/user-2.jpg')}}" class="img-responsive img-circle" alt="" />
                                <span class="user-status bage-status"></span>
                            </div>
                            <h5 class="ct-title">Michel Chark<span class="ct-designation">SEO Expert</span></h5>
                            <div class="badge badge-action">
                                <a href="#" class="btn btn-user btn-round btn-success">Hired</a>
                            </div>
                        </div>
                        <div class="todo todo-default">
                            <div class="sm-avater list-avater">
                                <img src="{{asset('_admin/assets/img/user-3.jpg')}}" class="img-responsive img-circle" alt="" />
                                <span class="user-status bage-danger"></span>
                            </div>
                            <h5 class="ct-title">Michel Chark<span class="ct-designation">PHP Expert</span></h5>
                            <div class="badge badge-action">
                                <a href="#" class="btn btn-user btn-round btn-success">Hired</a>
                            </div>
                        </div>
                        <div class="todo todo-default">
                            <div class="sm-avater list-avater">
                                <img src="{{asset('_admin/assets/img/user-4.jpg')}}" class="img-responsive img-circle" alt="" />
                                <span class="user-status bage-success"></span>
                            </div>
                            <h5 class="ct-title">Michel Chark<span class="ct-designation">App Designer</span></h5>
                            <div class="badge badge-action">
                                <a href="#" class="btn btn-user btn-default btn-round btn-outline">Hire</a>
                            </div>
                        </div>
                        <div class="todo todo-default">
                            <div class="sm-avater list-avater">
                                <img src="{{asset('_admin/assets/img/user-5.jpg')}}" class="img-responsive img-circle" alt="" />
                                <span class="user-status bage-warning"></span>
                            </div>
                            <h5 class="ct-title">Michel Chark<span class="ct-designation">Web Developer</span></h5>
                            <div class="badge badge-action">
                                <a href="#" class="btn btn-user btn-round btn-success">Hired</a>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
        <!-- /col-md-6 -->
        
        <!-- col-md-6 -->
        <div class="col-md-6">
            <div class="card">
            
                <div class="card-header">
                    <h4>New Notification</h4>
                </div>
                
                <div class="card-body">
                    <ul class="task">
                        <li>
                            <a href="#">
                                <div class="task-overview">
                                    <div class="alpha-box alpha-a">
                                        <span>A</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-overview">
                                    <div class="alpha-box alpha-h">
                                        <span>H</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-overview">
                                    <div class="alpha-box alpha-d">
                                        <span>D</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>	
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-overview">
                                    <div class="alpha-box alpha-g">
                                        <span>G</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-overview">
                                    <div class="alpha-box alpha-h">
                                        <span>H</span>
                                    </div>
                                    <div class="task-detail">
                                        <p>Hello, I am Maryam.</p>
                                        <span class="task-time">2 Min Ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>	
                </div>
            
            </div>
        </div>
        <!-- /col-md-6 -->
    </div>
    
</div>

@endsection

@push('scripts')
<script src="{{asset('_admin/assets/js/dashboard-4.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('_admin/assets/plugins/js/raphael.min.js')}}"></script>
<script src="{{asset('_admin/assets/plugins/js/morris.min.js')}}"></script>
@endpush		