@extends('_html.layouts.app') 
@section('title', 'Job|Find Job') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{asset('_html/assets/img/banner-10.jpg')}});">
    <div class="container">
        <h1>Find Job</h1>
    </div>
</section>

<!-- bottom form section start -->
<section class="bottom-search-form">
    <div class="container">
        <form class="bt-form" id="searchForm">
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" name="keyword" placeholder="Keyword">
            </div>

            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" name="skills" placeholder="Skills">
            </div>

            <div class="col-md-4 col-sm-6">
                <select class="form-control" name="category">
                    <option value="">Search By Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 col-sm-6">
                <select class="form-control" name="experience">
                      <option value="">Search By Experience</option>
                      <option value="1">1 Year</option>
                      <option value="2">2 Year</option>
                      <option value="3">3 Year</option>
                      <option value="4">4 + Year</option>
                    </select>
            </div>
            <div class="col-md-4 col-sm-6">
                <select id="location" class="form-control" name="location">
                    <option value="">Choose Location</option>
                    @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" name="budgetFrom" placeholder="Budget From">
            </div>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" name="budgetTo" placeholder="Budget To">
            </div>

            <div class="col-md-4 col-sm-6">
                <select id="country" class="form-control" name="country">
                    <option value="">Choose Country</option>
                    <option value="">Bangladesh</option>
                    <option value="">Canade</option>
                    <option value="">USA</option>
                    <option value="">England</option>
                </select>
            </div>

            <div class="col-md-4 col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="searchJob()">Search Job</button>
            </div>
        </form>
    </div>
</section>
<!-- Bottom Search Form Section End -->
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- Manage Company List Start -->
<section class="manage-company gray">
    <div class="container">
        <div class="row">
            <div id="jobList">
    @include('_html.ajax.ajaxJob')
            </div>
        </div>
    </div>
</section>
<!-- Manage Company List End -->
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
            url: baseUrl + "Job/Read?page=" + page,
            success: function(data) {
                $('#jobList').html(data);
            }
        });
    }

</script>
<script type="text/javascript" src="{{asset('_html/pages/jobs.js')}}"></script>
@endpush