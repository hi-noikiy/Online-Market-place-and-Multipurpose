@extends('_html.layouts.app') 
@section('title', 'Find Project') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="inner-header-title" >
    <div class="container">
        <h1>Find Project</h1>
    </div>
</section>

<!-- bottom form section start -->
<section class="search-form">
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
                    @foreach($response['categories'] as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="col-md-4 col-sm-6">
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
                    @foreach($response['locations'] as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" name="budgetFrom" placeholder="Budget From">
            </div>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" name="budgetTo" placeholder="Budget To">
            </div>

            {{-- <div class="col-md-4 col-sm-6">
                <select id="country" class="form-control" name="country">
                    <option value="">Choose Country</option>
                    <option value="">Bangladesh</option>
                    <option value="">Canade</option>
                    <option value="">USA</option>
                    <option value="">England</option>
                </select>
            </div> --}}

            <div class="col-md-4 col-sm-6">
                <button type="submit" class="btn btn-primary" onclick="searchProject()">Search Project</button>
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
            <div id="projectList">
    @include('_html.ajax.ajaxProject')
            </div>
        </div>
    </div>
</section>
<!-- Manage Company List End -->
@endsection
 @push('scripts')
<script type="text/javascript">
    var urlString = window.location.href;
    var url = urlString.split("/");
    length = url.length - 2;
            
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        paginageData(page);
    });

    function paginageData(page) {
        $.ajax({
            type: 'POST',
            url: baseUrl + url[length] +"/Read?page=" + page,
            success: function(data) {
                $('#projectList').html(data);
            }
        });
    }

</script>
<script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script>
@endpush