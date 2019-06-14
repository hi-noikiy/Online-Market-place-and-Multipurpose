@extends('_html.layouts.app') 
@section('title', 'Profile') 
@section('content')
<!-- Header Title Start -->
<section class="inner-header-title blank">
	<div class="container">
		<h1>Update Profile</h1>
	</div>
</section>
<div class="clearfix"></div>
<!-- Header Title End -->

<!-- General Detail Start -->
<div class="section detail-desc">
	<div class="container white-shadow">

		<div class="row">
			<div class="detail-pic js">
				<div class="box">
					<input type="file" name="upload-pic[]" id="upload-pic" class="inputfile" />
					<label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
				</div>
			</div>
		</div>

		<div class="container col-md-12">
			<div class="row bottom-mrg">
				<form id="userUpdateForm">
					<input type="hidden" name="user_id" value="{{ Auth::id() }}">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" value="{{ $profileById->name }}" placeholder="name" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" name="mobile" id="mobile" value="{{ $profileById->mobile }}" placeholder="mobile"
							 required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" value="{{ $profileById->email }}" placeholder="email" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<select name="gender" id="gender" class="form-control" required>
							<option value="1" @if($profileById->gender ==1) selected @endif>Male</option>
							<option value="2" @if($profileById->gender ==2) selected @endif>Female</option>
						</select>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="col-md-12 col-sm-12">
						<div class="form-group">
							<textarea class="form-control" id="physical_add" placeholder="Physical Address" name="physical_add" required>{{ $profileById->physical_add }}</textarea>
							<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="col-md-12 col-sm-12">
						<button type="submit" class="btn btn-success pull-right" onclick="updateUser()">Update</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- General Detail End -->
@endsection
 @push('scripts')
<script type="text/javascript" src="{{asset('_html/pages/users.js')}}"></script>