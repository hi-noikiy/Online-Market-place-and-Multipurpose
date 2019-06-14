@extends('_html.layouts.app')
@section('title','Reset PIn')
@section('content')
<section class="inner-header-title blank">
	<div class="container">
		<h1>Reset PIN</h1>
	</div>
</section>
<div class="clearfix"></div>
<div class="container">


<div class="card col-md-5 col-sm-5 ">
    <form action="{{url('resetpin')}}" method="POST" id="form">
        @csrf
        
        <div class="form-group">
            <label for="">New PIN</label>
            <input type="password" class="form-control" name="new_password" id="pass1" placeholder="New PIN">
        </div>
        <div class="form-group">
            <label for="">Confirm New PIN</label>
            <input type="password" class="form-control" onkeyup="match()" id="pass2" placeholder="Confirm">
        </div>
        <small style="diaplay:none" id="p">PIN Doesn't match</small>
    </form>


</div>
</div>
<script>
    function match(){
       var pass1= $('#pass1').val();
       var pass2=$('#pass2').val();
       if(pass1!= pass2){
           $('#p').show();

       }else{
           $('#p').hide();
           $('#form').submit();
       }

    }
</script>
@endsection