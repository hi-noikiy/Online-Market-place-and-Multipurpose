@extends('_html.layouts.app') 
@section('title', 'Login') 
@section('content')

<div class="clearfix"></div>

<!-- Title Header Start -->
<section class="login-plane-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <br>
                    <div class="panel-body">
                        {{-- Message --}}
                        <div class="alert" id="loginMessageDiv">
                            <div id="message"></div>
                        </div>

                        <form role="form" id="loginCheckForm">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>

                                <button type="submit" href="#" class="btn btn-login" onclick="loginCheck()">Sign Up</button>
                                
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 @push('scripts') {{--
<script type="text/javascript" src="{{asset('_html/pages/project.js')}}"></script> --}} 
@endpush