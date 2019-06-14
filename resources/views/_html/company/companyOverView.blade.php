@extends('_html.layouts.app') 
@section('title', 'Over View') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Over View</h1>
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
                        <a href="#JobHistory" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Job History</a>
                    </li>
                    <li role="presentation">
                        <a href="#AppliedJob" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Applied Job</a>
                    </li>
                    <li role="presentation">
                        <a href="#InvitationList" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Invitation List</a>
                    </li>
                    {{-- <li role="presentation">
                        <a href="#ActiveList" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Active List</a>
                    </li> --}}
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabs" id="home">

                    {{-- Job history tab --}}
                    <div role="tabpanel" class="tab-pane fade in active" id="JobHistory">
                        <div class="item-click">
                            <article>
                                <div id="jobHistoryList">
    @include('_html.ajax.ajaxCompanyJobHistory')
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Applied job tab --}}
                    <div role="tabpanel" class="tab-pane fade" id="AppliedJob">
                        <div class="item-click">
                            <article>
                                <div id="appliedJobList">
    @include('_html.ajax.ajaxCompanyAppliedJob')
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Invitation list tab --}}
                    <div role="tabpanel" class="tab-pane fade" id="InvitationList">
                        <div class="item-click">
                            <article>
                                <div id="invitationJobList">
    @include('_html.ajax.ajaxCompanyInvitationJob')
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Active list tab --}}
                    <div role="tabpanel" class="tab-pane fade" id="ActiveList">
                        <div class="item-click">
                            <article>
                                <div id="activeJobList">
                                    {{--
    @include('_html.ajax.ajaxJobSeekerInvitationJob') --}}
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
    getCompanyJobHistory();
    getCompanyAppliedJob();
    getCompanyInvitationJob();
})

</script>
<script type="text/javascript" src="{{asset('_html/pages/company.js')}}"></script>




@endpush