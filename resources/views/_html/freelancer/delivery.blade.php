@extends('_html.layouts.app')
@section('content')
<section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
    <div class="container">
        <h1>DELIVERY</h1>
    </div>
</section>
<section class="accordion">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <form action="{{url('project_delivery/'.$proposal)}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <textarea class="form-control" >Descripton about the delivery</textarea>
                <label>Attachment</label>
                <input type="file" name="file" class="form-control">
                <input type="submit" class="btn btn-success">
            </form>
           
       
        </div>
    </div>
</section>
@endsection