@extends('_html.layouts.app') 
@section('title', 'My Job') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>My Orders</h1>
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
                        <a href="#Active" role="tab" data-toggle="tab"><i class="fa fa-cube"></i> Active</a>
                    </li>
                    {{-- <li role="presentation">
                        <a href="#Pending" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Pending</a>
                    </li> --}}
                    <li role="presentation">
                        <a href="#Complete" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Complete</a>
                    </li>
                    <li role="presentation">
                        <a href="#Cancel" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Cancel</a>
                    </li>
                    <li role="presentation">
                        <a href="#Revision" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Revision</a>
                    </li>
                    <li role="presentation">
                        <a href="#Dispute" role="tab" data-toggle="tab"><i class="fa fa-cube"></i>Dispute</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabs" id="home">

                    {{-- Active tab --}}
                    <div role="tabpanel" class="tab-pane fade in active" id="Active">
                        <div class="item-click">
                            <article>
                                <div id="activeJob">
                                    @include('_html.ajax.ajaxActiveJob')
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Pending --}}
                    {{-- <div role="tabpanel" class="tab-pane fade" id="Pending">
                        <div class="item-click">
                            <article>
                                <div id="pendingJob">
    @include('_html.ajax.ajaxPendingJob')
                                </div>
                            </article>
                        </div>
                    </div> --}}

                    {{-- Complete --}}
                    <div role="tabpanel" class="tab-pane fade" id="Complete">
                        <div class="item-click">
                            <article>
                                <div id="completeJob">
    @include('_html.ajax.ajaxCompleteJob')
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Cancel --}}
                    <div role="tabpanel" class="tab-pane fade" id="Cancel">
                        <div class="item-click">
                            <article>
                                <div id="calcelJob">
    @include('_html.ajax.ajaxCancelJob')
                                </div>
                            </article>
                        </div>

                    </div>

                    {{-- Revision --}}
                    <div role="tabpanel" class="tab-pane fade" id="Revision">
                        <div class="item-click">
                            <article>
                                <div id="revisionJob">
    @include('_html.ajax.ajaxRevisionJob')
                                </div>
                            </article>
                        </div>

                    </div>

                    {{-- Dispute --}}
                    <div role="tabpanel" class="tab-pane fade" id="Dispute">
                        <div class="item-click">
                            <article>
                                <div id="disputeJob">
    @include('_html.ajax.ajaxDisputeJob')
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
    //Active          
    $('#activeJob').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageActiveJobData(page);
    });

    function paginageActiveJobData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "ActiveJobAjax?page=" + page,
            success: function(data) {
                $('#activeJob').html(data);
            }
        });
    }

    //Pending          
    $('#pendingJob').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginagePendingJobData(page);
    });

    function paginagePendingJobData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "PendingJobAjax?page=" + page,
            success: function(data) {
                $('#pendingJob').html(data);
            }
        });
    }

    //Complete          
    $('#completeJob').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageCompleteJobData(page);
    });

    function paginageCompleteJobData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "CompleteJobAjax?page=" + page,
            success: function(data) {
                $('#completeJob').html(data);
            }
        });
    }

    //Calcel          
    $('#cancelJob').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageCalcelJobData(page);
    });

    function paginageCalcelJobData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "CalcelJobAjax?page=" + page,
            success: function(data) {
                $('#cancelJob').html(data);
            }
        });
    }

    //Revision          
    $('#revisionJob').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageRevisionJobobData(page);
    });

    function paginageRevisionJobobData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "CompleteJobAjax?page=" + page,
            success: function(data) {
                $('#revisionJob').html(data);
            }
        });
    }
    
    //Dispute          
    $('#disputeJob').on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageDisputeJobobData(page);
    });

    function paginageDisputeJobobData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + "DisputeJobAjax?page=" + page,
            success: function(data) {
                $('#disputeJob').html(data);
            }
        });
    }

</script>
<script type="text/javascript" src="{{asset('_html/pages/jobs.js')}}"></script>




@endpush