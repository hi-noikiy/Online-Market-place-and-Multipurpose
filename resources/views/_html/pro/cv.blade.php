
  @php
      $pro=App\Pro::where('user_id',$user->id)->first();
      $cv=App\User::find($user->id)->cv;
     // print_r($cv);
     $path='/../uploads/user/'.$cv->cover_pic;
  @endphp


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <title>CV</title>
 
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
 
  <link href="{{asset('cvElement/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('cvElement/vendor/font-awesome/css/font-awesome.min.css')}}">
  
  <link href="{{asset('cvElement/vendor/nivo-lightbox/nivo-lightbox.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('cvElement/vendor/nivo-lightbox/themes/default/default.css')}}" type="text/css" />
  
  <link href="{{asset('cvElement/vendor/animate.css')}}" rel="stylesheet">
  
  <link href="{{asset('cvElement/css/styles.css')}}" rel="stylesheet"> 
</head>
<style>
body {
    font-family: 'Open Sans',sans-serif;
    /* background: #3b658a url(../img/background2.jpg) repeat-x center top fixed; */
     background: #3b658a url('<?= $path; ?>') repeat-x left top fixed!important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    position: relative!important;
    padding: 10px;
}

</style>
<body data-spy="scroll" data-target="#side-menu">

<!-- Page Loader
========================================================= -->
<div class="loader" id="page-loader"> 
  <div class="loading-wrapper">
    <div class="tp-loader spinner"></div>
    <!-- Edit With Your Name -->
    <div class="side-menu-name">
       <strong>{{$user->name}}</strong>
    </div>
    <!-- /Edit With Your Name -->
    <!-- Edit With Your Job -->
    <p class="side-menu-job">{{$pro->short_description}}</p>
    <!-- /Edit With Your Job -->
  </div>   
</div>
<!-- /End of Page loader
========================================================= -->

<!-- SIDE MENU
========================================================= -->
<div class="side-menu-open hidden-sm hidden-xs">
  <!-- Menu-button -->
    <a href="#" class="btn btn-default side-menu-button"><i class="fa fa-bars"></i> MENU</a>
  <!-- /menu-button -->
</div>
<!-- Side Menu container -->
<div class="side-menu">
  <!-- close button -->
  <span id="side-menu-close"><i class="fa fa-times"></i></span>
  <!-- /close button -->

  <!-- Menu header -->
  <div class="side-menu-name">
    <!-- edit with your name -->
    <strong>{{$user->name}}</strong>
    <!-- /edit with your name -->
  </div>
  <!-- edit with your Job -->
  <p class="side-menu-job">{{$pro->short_description}}</p>
  <!-- /edit with your job -->
  <!-- /Menu Header -->


  <!-- Other Buttons -->
  <div class="side-menu-buttons">
    <a href="{{url('export_pdt/'.urlencode(base64_encode($user->id)))}}" class="btn btn-side-menu"><i class="fa fa-download"></i> Download my resume</a>
   
    <a href="{{url('edit_cv/'.urlencode(base64_encode($user->id)))}}" class="btn btn-side-menu"><i class="fa fa-envelope-o"></i> Edit</a>
  </div>
  <!-- /Other Buttons-->
</div>
<!-- /side menu container -->

<!-- /SIDE MENU
========================================================= -->

<!-- CONTENT
========================================================= -->
<section id="content-body" class="container animated">
  <div class="row" id="intro">

    <!-- Header Colors -->
    <div class="col-md-10 col-sm-10  col-md-offset-2 col-sm-offset-1 clearfix top-colors">
      <div class="top-color top-color1"></div>
      <div class="top-color top-color2"></div>
      <div class="top-color top-color1"></div>
       <div class="top-color top-color2"></div>
      <div class="top-color top-color1"></div>
     
    </div>
    <!-- /Header Colors -->    
    
    <!-- Beginning of Content -->
    <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-1 resume-container">
      
      <!-- Header Buttons -->
      <div class="row">
        <div class="header-buttons col-md-10 col-md-offset-1">
          <!-- Download Resume Button -->
          <a href="#" class="btn btn-default btn-top-resume"><i class="fa fa-download"></i><span class="btn-hide-text">Download my resume</span></a>
          <!-- /Download Resume Button -->
         
        </div>
      </div>
      <!-- /Header Buttons -->

      <!-- =============== PROFILE INTRO ====================-->
      <div class="profile-intro row">
        <!-- Left Collum with Avatar pic -->
        <div class="col-md-4 profile-col">
          <!-- Avatar pic -->
          <div class="profile-pic">
            <div class="profile-border">
              <!-- Put your picture here ( 308px by 308px for retina display)-->
              <img src="{{asset('uploads/user/'.$pro->profile_image)}}" alt="">
              <!-- /Put your picture here -->
            </div>          
          </div>
           <!-- /Avatar pic -->
        </div>
        <!-- /Left columm with avatar pic -->
  
        <!-- Right Columm -->
        <div class="col-md-7">
          <!-- Welcome Title-->
          <h1 class="intro-title1">Hi, i'm <span class="color1 bold">{{$user->name}}</span></h1>
          <!-- /Welcome Title -->
          <!-- Job - -->
          <h2 class="intro-title2">{{$pro->short_description}}</h2>
          <!-- /job -->
          <!-- Description -->
          <p>
            <strong>
            {{$pro->long_description}}  
            </strong>.
          </p>
          <!-- /Description -->
        </div>
        <!-- /Right Collum -->
      </div>
      <!-- ============  /PROFILE INTRO ================= -->
      
      <!-- ============  TIMELINE ================= -->
      <div class="timeline-wrap">
        <div class="timeline-bg">

          <!-- ====>> SECTION: PROFILE INFOS <<====-->
          <section class="timeline profile-infos">

            <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
            <div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <!-- /VERTICAL MARGIN -->

            <!-- SECTION TITLE -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height">
              </div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <!-- Section title -->
                <h2 class="section-title">Profile</h2>
                <!-- /Section title -->
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- / Margin Collum-->
            </div>
            <!-- /SECTION TITLE -->

            <!-- SECTION ITEM -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <!-- Subtitle -->
                  <h3 class="section-item-title-1">Full Name</h3>
                  <!-- /Subtitle -->
                  <!-- content -->
                  <p>{{$user->name}}</p>
                  <!-- /Content -->
                </div>
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            <!-- /SECTION ITEM -->
            
            <!-- SECTION ITEM -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <!-- Subtitle -->
                  <h3 class="section-item-title-1">Born</h3>
                  <!-- /Subtitle -->
                  @php
                      $country=$pro->country_code;
                      if($country){
                        $country=App\Country::find($country);
                      }
                  @endphp
                  <!-- content -->
                  <p>{{$pro->birthday}} - {{$pro->address}},
                    @if($country)
                    {{$country->name}}
                    @endif
                  </p>
                  <!-- /Content -->
                </div>
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            <!-- /SECTION ITEM -->   

            <!-- SECTION ITEM -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <!-- Subtitle -->
                  <h3 class="section-item-title-1">Email</h3>
                  <!-- /Subtitle -->
                  <!-- content -->
                  <p>{{$user->email}}</p>
                  <!-- /Content -->
                </div>
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collums -->
            </div>
            <!-- /SECTION ITEM --> 

            <!-- SECTION ITEM -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <!-- Margin Collums (necessary for the timeline effect) -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <!-- Subtitle -->
                  <h3 class="section-item-title-1">Find Me On</h3>
                  <!-- /Subtitle -->
                  <!-- content -->
                  <a href="#" class="btn btn-default"><i class="fa fa-facebook"></i></a> 
                  <a href="#" class="btn btn-default"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="btn btn-default"><i class="fa fa-linkedin"></i></a>
                  <a href="#" class="btn btn-default"><i class="fa fa-link"></i></a>
                  <a href="#" class="btn btn-default"><i class="fa fa-paper-plane-o"></i></a>
                  <!-- /Content -->
                </div>
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum -->
            </div>
            <!-- /SECTION ITEM --> 
          </section>
          <!-- ==>> /SECTION: PROFILE INFOS -->     

          <!-- ====>> SECTION: EDUCATION <<====-->
          <section class="timeline education" id="education">

            <!-- Margin (necessary for the timeline effect) -->
            <div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <!-- /Margin -->

            <!-- SECTION TITLE -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height">
              </div>              
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <!-- Section title -->
                <h2 class="section-title">Education</h2>
                <!-- /Section title -->
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            <!-- /SECTION TITLE -->
              @php
                  $education=App\User::find($user->id)->education;
              @endphp
            <!-- SECTION ITEM -->
            @if($education)
              @foreach($education as $education)
              @php
                  $qualification=App\Qualification::find($education->qualification_id);
              @endphp
                <div class="line row">
                  <!-- Margin Collums (necessary for the timeline effect) -->
                
                  <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                  <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-education "></div>
                  <!-- /Margin Collums -->
                  <!-- Item Content -->
                  <div class="col-md-8 content-wrap bg1">
                    <div class="line-content line-content-education">
                      <!-- Graduation title -->
                      @if($qualification)
                      <h3 class="section-item-title-1">{{$qualification->name}}</h3>
                      @endif
                      <!-- /Graduation title -->
                      <!-- Graduation time -->
                      <h4 class="graduation-time"><i class="fa fa-university"></i> {{$education->school_name}} {{$education->start_date}} - <span class="graduation-date">{{$education->end_date}}</span></h4>
                      <!-- /Graduation time -->
                      <!-- content -->
                      <div class="graduation-description">
                        <p>{{$education->note}}.</p>
                      </div>
                      <!-- /Content -->
                    </div>
                  </div>
                  <!-- /Item Content -->
                  <!-- Margin Collum -->
                  <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                  <!-- /Margin Collum -->
                </div>
              @endforeach  
            @endif
            <!-- /SECTION ITEM -->   

            

            <!-- /SECTION ITEM -->       
          </section>
          <!-- ==>> /SECTION: EDUCATION <<==== -->  

          <!-- ====>> SECTION: WORK EXPERIENCE <<====-->
          <section class="timeline work-experience" id="works">

            <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
            <div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <!-- /VERTICAL MARGIN -->
                        <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height">
              </div>              
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <!-- Section title -->
                <h2 class="section-title">Experience</h2>
                <!-- /Section title -->
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            @php
                $experience=App\User::find($user->id)->experience;
            @endphp
            <!-- SECTION ITEM -->
             @if($experience)
              @foreach($experience as $experience)
                <div class="line row">
                
                  <!-- Margin Collums (necessary for the timeline effect) -->
                  <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                  <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-work "></div>
                  <!-- /Margin Collums -->
                  <!-- Item Content -->
                  <div class="col-md-8 content-wrap bg1">
                    <div class="line-content line-content-education">
                      <!-- Work Place -->
                      <h3 class="section-item-title-1">{{$experience->institution}}</h3>
                      <!-- /work place -->
                      <!-- Graduation time -->
                      <h4 class="job"><i class="fa fa-flag"></i> {{$experience->position}} - <span class="job-date">{{$experience->start_date}} - {{$experience->end_date}}</span></h4>
                      <!-- /Graduation time -->
                      <!-- content -->
                      <div class="job-description">
                        <p>{{$experience->note}}.</p>
                      </div>
                      <!-- /Content -->
                    </div>
                  </div>
                  <!-- /Item Content -->
                  <!-- Margin Collum-->
                  <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                  <!-- /Margin Collum-->
                </div>
                @endforeach
            @endif
            <!-- /SECTION ITEM -->  
          </section>
          <!-- ==>> /SECTION: WORK EXPERIENCE <<==== --> 

          <!-- ====>> SECTION: SKILLS <<====-->
          <section class="timeline skills" id="skills">

            <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
            <div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <!-- /VERTICAL MARGIN -->

            <!-- SECTION TITLE -->
            <div class="line row">
              <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height"></div>
              <!-- /VERTICAL MARGIN (necessary for the timeline effect) -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <!-- Section title -->
                <h2 class="section-title">Skills</h2>
                <!-- /Section title -->
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            <!-- /SECTION TITLE -->
            @php
                $skill=DB::table('skill_details')->where('user_id',$user->id)->get();
            @endphp
            <!-- SECTION ITEM -->
            @if($skill)
                @foreach ($skill as $skill)   
                @php
                    $s=DB::table('skills')->where('id',$skill->skill_id)->where('status',1)->first();
                @endphp               
                <div class="line row">
                  <!-- Margin Collums (necessary for the timeline effect) -->
                  <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                  <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
                  <!-- / Margin Collums -->
                  <!-- Item Content -->
                  <div class="col-md-8 content-wrap bg1">
                    <div class="line-content">
                      <!-- Subtitle -->
                      <h3 class="section-item-title-1">{{$s->name}}</h3>
                      <!-- /Subtitle -->
                      <!-- content -->
                      <ul class="skills-list">
                        <!-- item-list -->
                        <li>
                          <div class="progress">
                          <div class="progress-bar" role="progressbar" data-percent="{{$skill->percentage}}%" style="width: {{$skill->percentage}}%;">
                             <span class="sr-only">{{$skill->percentage}}% Complete</span>
                            </div>
                            {{-- <span class="progress-type">Comunication</span>
                            <span class="progress-completed">70%</span> --}}
                          </div>
                        </li>
                        <!-- /item list -->
                        <!-- item-list -->
                        {{-- <li>
                          <div class="progress">
                            <div class="progress-bar progress-bar-2" role="progressbar" data-percent="90%" style="width: 90%;">
                                <span class="sr-only">90% Complete</span>
                            </div>
                            <span class="progress-type">Leadership</span>
                            <span class="progress-completed">90%</span>
                          </div>
                        </li> --}}
                        <!-- /item list -->
                        <!-- item-list -->
                        {{-- <li>
                          <div class="progress" title="Doing my best!">
                            <div class="progress-bar progress-bar-3" role="progressbar" data-percent="85%" style="width: 85%;">
                                <span class="sr-only">85% Complete</span>
                            </div>
                            <span class="progress-type">Confidence</span>
                            <span class="progress-completed">85%</span>
                          </div>
                        </li> --}}
                        <!-- /item list -->
                      </ul>
                      <!-- /Content -->
                    </div>
                  </div>
                  <!-- /Item Content -->
                  <!-- Margin Collum-->
                  <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                  <!-- /Margin Collum-->
                </div>
              @endforeach
           @endif
          </section>
          <!-- ==>> /SECTION: SKILLS -->

          <!-- ====>> SECTION: INTERESTS <<====-->
          <section class="timeline" id="interests">

            <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
            <div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <!-- /VERTICAL MARGIN -->

            <!-- SECTION TITLE -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height"></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <!-- Section title -->
                <h2 class="section-title">Interests</h2>
                <!-- /Section title -->
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            <!-- /SECTION TITLE -->
            @php
                $interest=App\User::find($user->id)->interest;
            @endphp
            <!-- SECTION ITEM -->
            @if($interest)
              @foreach($interest as $interest)
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <!-- Subtitle -->
                  <h3 class="section-item-title-1">{{$interest->name}}</h3>
                  <!-- /Subtitle -->
                  <!-- content -->
                  <p>{{$interest->details}}.</p>
                  <!-- /Content -->
                </div>
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            @endforeach
            @endif
            <!-- /SECTION ITEM -->

          </section>
          <!-- ==>> /SECTION: INTERESTS -->

           <!-- ====>> SECTION: PORTFOLIO <<====-->
          <section class="timeline portfolio" id="portfolio">

            <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
            <div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <!-- /VERTICAL MARGIN -->

            <!-- SECTION TITLE -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height"></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <!-- Section title -->
                <h2 class="section-title">Projects</h2>
                <!-- /Section title -->
              </div>
              <!-- Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            <!-- /SECTION TITLE -->

            <!-- SECTION ITEM -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <!-- Subtitle -->
                  <h3 class="section-item-title-1">Some Works</h3>
                  <!-- /Subtitle -->
                  @php
                      $cv=DB::table('cvs')->where('user_id',$user->id)->first();
                      $cv_projects=App\Cv::find($cv->id)->CvProjects;
                     // print_r($cv_projects);
                     // exit();
                  @endphp
                  <!-- content -->
                  @if($cv_projects)
                    @foreach($cv_projects as $project)
                      <div>   
                        <h2> <b> {{$project->tytle}} </b> </h2>                 
                          <div class="line row">
                            
                    <!-- Margin Collums (necessary for the timeline effect) -->
                          <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                         
                          <!-- /Margin Collums -->
                          <!-- Item Content -->
                          <div class="col-md-8 content-wrap bg1">
                            <div class="line-content">
                              <!-- Subtitle -->
                              <h3 class="section-item-title-1"></h3>
                              <!-- /Subtitle -->
                              <!-- content -->
                              <p>{{$project->start_date}} to {{$project->end_date}}</p>
                               <p>{{$project->description}}.</p>
                                <h6>Supervisor:  {{$project->supervisor}}</h6>
                                   [ {{$project->skills_required}} ]
                              <!-- /Content -->
                            </div>
                            
                          </div>
                          <!-- /Item Content -->
                      
                          <!-- Margin Collum-->
                          <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                          <!-- /Margin Collum-->
                        </div>
                      </div>
                     
                    @endforeach
                  @endif
                  <!-- /Content -->
                </div>
              </div>
              <!-- Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- /Margin Collum-->
            </div>
            <!-- /SECTION ITEM -->
          </section>
          <!-- ==>> /SECTION: PORTFOLIO -->
        
          <!-- ====>> SECTION: CONTACT <<====-->
          <section class="timeline" id="contact">

            <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
            <div class="line row timeline-margin">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div>
            <!-- /VERTICAL MARGIN -->

            <!-- SECTION TITLE -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs timeline-title full-height"></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <!-- Section title -->
                <h2 class="section-title">Contact</h2>
                <!-- /Section title -->
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- / Margin Collum-->
            </div>
            <!-- /SECTION TITLE -->

            <!-- SECTION ITEM -->
            <div class="line row">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-mail "></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content contact-content">
                  <!-- Subtitle -->
                  {{-- <h3 class="section-item-title-1">Send me a message</h3> --}}
                  <!-- /Subtitle -->
                  <!-- content -->
                  <div class="row">
                    <div class="col-md-8 contact-form-wrapper">
                      <!-- Contact form -->
                        <div class="col-md-4 contact-infos">
                          <h4 class="contact-subtitle-1">Address</h4>
                          <p>{{$pro->address}} - U.S.A</p>
                          <h4 class="contact-subtitle-1">Phone</h4>
                          <p>{{$user->mobile}}</p>
                          <h4 class="contact-subtitle-1">Mail</h4>
                          <p>{{$user->email}}</p>
                        </div>
                      <!-- /Contact Form -->     
                    </div>
        
                  </div>
                  <!-- /Content -->
                </div>
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!--/ Margin Collum-->
            </div>
            <!-- /SECTION ITEM -->            
          </section>
          <!-- ==>> /SECTION: CONTACT -->

          <!-- ====>> SECTION: THANK YOU <<====-->
          <section class="timeline profile-infos">

            <!-- VERTICAL MARGIN (necessary for the timeline effect) -->
            {{-- <div class="line row timeline-margin timeline-margin-big">
              <div class="content-wrap">
                <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
                <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height"></div>
                <div class="col-md-9 bg1 full-height"></div>
              </div>
            </div> --}}
            <!-- /VERTICAL MARGIN -->

            <!-- SECTION ITEM -->
            <div class="line row line-thank-you">
              <!-- Margin Collums (necessary for the timeline effect) -->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <div class="col-md-2 timeline-progress hidden-sm hidden-xs full-height timeline-point "></div>
              <!-- /Margin Collums -->
              <!-- Item Content -->
              <div class="col-md-8 content-wrap bg1">
                <div class="line-content">
                  <!-- Subtitle -->
                  <h3 class="thank-you">Thank You!</h3>
                  <!-- /Subtitle -->
                </div>
              </div>
              <!-- /Item Content -->
              <!-- Margin Collum-->
              <div class="col-md-1 bg1 timeline-space full-height hidden-sm hidden-xs"></div>
              <!-- / Margin Collum-->
            </div>
            <!-- /SECTION ITEM -->            
          </section>
          <!-- ==>> /SECTION: PROFILE INFOS -->
        </div>
      </div>
      <!-- ============  /TIMELINE ================= -->

    </div> 
  </div> 
</section>
<!-- /CONTENT
========================================================= -->

<!-- Contact Form - Ajax Messages
========================================================= -->
<!-- Form Sucess -->
<div class="form-result modal-wrap" id="contactSuccess">
  <div class="modal-bg"></div>
  <div class="modal-content">
    <h4 class="modal-title"><i class="fa fa-check-circle"></i> Success!</h4>
    <p>Your message has been sent to us.</p>
  </div>
</div>
<!-- /Form Sucess -->
<!-- form-error -->
<div class="form-result modal-wrap" id="contactError">
  <div class="modal-bg"></div>
  <div class="modal-content">
    <h4 class="modal-title"><i class="fa fa-times"></i> Error</h4>
    <p>There was an error sending your message.</p>
  </div>
</div>
<!-- /form-error -->

<!-- Contact Form - Ajax Messages
========================================================= -->

<!-- Javascript Files
========================================================= -->
<!-- jQuery (necessary for plugins) -->
<script src="{{asset('cvElement/jquery.min.js')}}"></script>
<!-- /jquery -->
<!-- bootstrap -->
<script src="{{asset('cvElement/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- /bootstrap -->
<!-- easing -->
<script src="{{asset('cvElement/jquery.easing.min.js')}}"></script>
<!-- /easing -->
<!-- jQuery Mousewheel -->
<script src="{{asset('cvElement/vendor/jquery.mousewheel.min.js')}}"></script>
<!-- /jQuery Mousewheel -->
<!-- jQuery Mousewheel Smoothscroll -->
<script src="{{asset('cvElement/vendor/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('cvElement/vendor/jquery.nicescroll.plus.js')}}"></script>
<!-- /jQuery Mousewheel Smoothscroll  -->
<!-- Waypoints (for CSS3 animations) -->
<script src="{{asset('cvElement/vendor/waypoints.min.js')}}"></script>
<!-- /waypoints -->
<!-- Modal box-->
<script src="{{asset('cvElement/vendor/nivo-lightbox/nivo-lightbox.min.js')}}"></script>
<!-- /Modal Box -->
<!-- Carousel-->
<script src="{{asset('cvElement/vendor/jquery.bxslider.min.js')}}"></script>
<!-- /Carousel -->
<!-- Front-end Validator (for forms) -->
<script src="{{asset('cvElement/vendor/jquery.validate.min.js')}}"></script>
<!-- /Front-end Validator -->
<!-- placeholder Support for IE -->
<script src="{{asset('cvElement/vendor/placeholders.jquery.min.js')}}"></script>
<!-- /placeholder support -->
<!-- Cross-browser -->
<script src="{{asset('cvElement/js/cross-browser.js')}}"></script>
<!-- /Cross-browser -->
<!-- Configurations -->
<script src="{{asset('cvElement/js/main.js')}}"></script>
<!-- /Configurations -->
>
</body>


</html>