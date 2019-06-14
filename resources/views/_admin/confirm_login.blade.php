<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
		<meta name="description" content="">
		<meta name="author" content="">

        <title>Admin Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="{{asset('_admin/assets/plugins/css/plugins.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables/datatables.min.css')}}">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('_admin/assets/css/style.css')}}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	
	<body class="login-bg">
        <div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Confirm Sign In</h3>
						</div>
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<div class="panel-body">
							<img src="assets/img/logo.png" class="img-responsive" alt=""/>
							<form method="POST" action="{{url('admin/submission/00/confirm')}}">
                                @csrf
								<fieldset>
                                    <input type="hidden" value="{{$secondary_eamil}}" name="secondary_eamil">
									<div class="form-group">
										<input class="form-control" placeholder="Confirm_code_1" name="code_1" type="password" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Confrim_code_2" name="code_2" type="password" autofocus>
									</div>
									
									<div class="form-group">
										<input class="form-control"  type="Submit" value="Submit">
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
  
</div>
	<!-- jQuery -->
	<script src="{{asset('_admin/assets/plugins/js/jquery.min.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/sweetalert.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/datepicker.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/ckeditor.js')}}"></script>
	<script src="{{asset('_admin/assets/plugins/js/select2.min.js')}}"></script>
	<script src="{{asset('_admin/assets/js/loader.js')}}"></script>

		<!-- Custom Theme JavaScript -->
	<script src="{{asset('_admin/assets/js/custom.js')}}"></script>

	</body>
</html>