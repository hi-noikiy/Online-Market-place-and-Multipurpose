@extends('_html.layouts.app') 
@section('title', 'My Job') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>My Job</h1>
    </div>
</section>

<!-- Tab Section Start -->
<section class="tab-sec">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="tab tool-tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#AppliedJob" role="tab" data-toggle="tab"><i class="fa fa-cube"></i> Applied Job</a>
                    </li>
                    <li role="presentation">
                        <a href="#MatchJob" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Match Job</a>
                    </li>
                    <li role="presentation">
                        <a href="#InvitationJob" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Invitation Job</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabs" id="home">

                    {{-- Applied job tab --}}
                    <div role="tabpanel" class="tab-pane fade in active" id="AppliedJob">
                        <div class="item-click">
                            <article>
                                <div id="appliedJobList">
    @include('_html.ajax.ajaxJobSeekerAppliedJob')
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Match job tab --}}
                    <div role="tabpanel" class="tab-pane fade" id="MatchJob">
                        <div class="item-click">
                            <article>
                                <div id="matchJobList">
    @include('_html.ajax.ajaxJobSeekerMatchJob')
                                </div>
                            </article>
                        </div>
                    </div>
                    
                    {{-- Invitation job tab --}}
                    <div role="tabpanel" class="tab-pane fade" id="InvitationJob">
                        <div class="item-click">
                            <article>
                                <div id="invitationJobList">
    @include('_html.ajax.ajaxJobSeekerInvitationJob')
                                </div>
                            </article>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tab section End -->
@endsection
 @push('scripts')
<script type="text/javascript">
    $(function(){ 
        getJobSeekerAppliedJobs();
        getJobSeekerMatchJobs();
        getJobSeekerInvitationJobs();
   })

</script>
<script type="text/javascript" src="{{asset('_html/pages/jobs.js')}}"></script>

@endpush