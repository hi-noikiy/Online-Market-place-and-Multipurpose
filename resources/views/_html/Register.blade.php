@extends('_html.layouts.app') 
@section('title', 'Registration') 
@section('content')
<div class="clearfix"></div>
<section class="inner-header-title blank">
        <div class="container">
            <h1>Register User</h1>
        </div>
</section>

<!-- General Detail Start -->
<div class="section detail-desc">
    <div class="container white-shadow">
        <div class="card row" style="padding:4px">
            <form method="POST" action="{{url('/all_users')}}">
                @csrf
                <div class="form-group">
                    <label for="inname">Name</label>
                    <input type="text" name="name" class="form-control" id="inname" aria-describedby="nameHelp" placeholder="Enter Name" required>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="inphone">Phone Number</label>
                    <input type="text" name="mobile" class="form-control" id="inphone" aria-describedby="phoneHelp" placeholder="Enter Phone number">
                    <small id="phoneHelp" class="form-text text-muted">We'll never share your Phone number with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="Password1">Password</label>
                    <input type="password" name="password" class="form-control" id="Password1" placeholder="Password"  required>
                </div>
                <div class="form-group">
                    <label for="Password2">Confirm Password</label>
                    <input type="password" class="form-control" id="Password2" onkeyup="passconfirm()" placeholder="Retype Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="Check" onClick="passconfirm()" required>
                    <label class="form-check-label" for="Check">Agree with kcephas general terms and service</label>
                </div>
                <button type="submit" class="btn btn-primary" id="submit" style="display:none">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    $('#submit').hide();
    function passconfirm(){
        var old= $('#Password1').val();
       var check=$('#Check').is(':checked')
       
        var n =$('#Password2').val();
        
        if(old==n && old!= ""){
            console.log(old);
            if(check==true){
                 $('#submit').toggle(100);
            }
           
            $("#Password2").css({"background-color": "white"}); 
        }
        else{
            console.log('bad');
            $("#Password2").css({"background-color": "#f49f9f"});
            $('#submit').hide();
        }
    }
</script>
@endsection