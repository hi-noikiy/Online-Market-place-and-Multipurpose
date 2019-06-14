@extends('_html.layouts.app') 
@section('title', 'Pro|Find Pro') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
{{-- <section class="inner-header-page">
    <div class="container">

        <h2>Hire The Best Pro</h2>
        <p>Work with the world’s best talent — the top freelancing website trusted by over 5 million businesses.</p>

    </div>
</section> --}}
<div class="clearfix"></div>
<!-- Title Header End -->


<!-- bottom form section start -->
<section class="inner-header-page">
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

            <div class="col-md-4 col-sm-3">
                <input type="text" class="form-control" name="budgetFrom" placeholder="Budget From">
            </div>
            <div class="col-md-4 col-sm-3">
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

            <div class="col-md-12 col-sm-12">
                <button type="submit" class="btn btn-primary form-control">Search For Pro</button>
            </div>
        </form>
    </div>
</section>
<!-- Bottom Search Form Section End -->
<div class="clearfix"></div>
<!-- Bottom Search Form Section End -->


<!-- Accordion Design Start -->
<section class="accordion">
    <div class="container">
        <div class="row" id="proList">
            @include('_html.ajax.ajaxPro')
        </div>
    </div>

</section>
<!-- Accordion Design End -->
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
            url: baseUrl + "Customer/ReadPro?page=" + page,
            success: function(data) {
                $('#proList').html(data);
            }
        });
    }

</script>
{{-- <script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script> --}}
@endpush