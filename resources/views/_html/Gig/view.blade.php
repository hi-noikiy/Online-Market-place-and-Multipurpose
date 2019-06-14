@extends('_html.layouts.app') 
@section('title', 'Gigs') 
@section('content')
<style>
.main-content {
    position: relative;
}

.user-page-perseus {
    margin: 30px auto;
}
.user-page-perseus .seller-card {
    border-bottom: 1px solid #ddd;
    max-width: 550px;
    margin: 0 auto;
    margin-bottom: 20px;
}
.seller-card .user-profile-image {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: 15px;
}
.user-profile-image .user-pict-150 {
    width: 150px;
    height: 150px;
    display: block;
    overflow: visible;
    border-radius: 50%;
}
.user-name{
    color:black;
    background: #fff;
    font-size: 1.00rem;
    text-align: center;
}
</style>
<section class="inner-header-title">
    <div class="container">
        <h1>GIGS</h1>
    </div>
</section>
@php
   
@endphp
<section class="container">
    
@include('_html.Gig.gigs_view')
    
</section>

@endsection


