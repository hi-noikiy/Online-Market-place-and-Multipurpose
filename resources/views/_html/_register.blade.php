@extends('_html.layouts.app') 
@section('title', 'Register') 
@section('content')

<!-- Header Title Start -->
<section class="inner-header-title blank">
    <div class="container">
        <h1>Create Account</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Header Title End -->

<div id="content">
    <!-- General Detail Start -->
    <form class="add-feild2" id="createUserAccountForm">
        <div class="section detail-desc">
            <div class="container white-shadow">

                <div class="row">
                    <div class="detail-pic js">
                        <div class="box" title="Select Image">
                            <input type="file" name="upload-pic[]" id="upload-pic" class="inputfile" />
                            <label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
                        </div>
                    </div>
                </div>

                <div class="row bottom-mrg">
                    <div class="col-md-6 col-sm-6">
                        <input type="hidden" name="key" value="{{Request::segment(2)}}">
                        <div class="form-group">
                            <select class="form-control input-lg" id="userType" name="userType" onchange="getSubUserType()" required>
                                    <option value="">Select User Type</option>
                                    <option value="1">Customer</option>
                                    <option value="2">Freelancer</option>
                                    <option value="3">Pro</option>
                                </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6" id="userTypeStatus">
                        <div class="form-group">
                            <select class="form-control input-lg" id="userSubType" name="userSubType" onchange="getSubUserSubType()">
                                            <option value="">Select Sub User Type</option>
                                            <option value="1">Company</option>
                                            <option value="2">Individual</option>
                                        </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobileNumber" placeholder="Mobile Number" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="rePassword" placeholder="Re Password" data-match="#password" data-match-error="Whoops, these don't match"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control input-lg" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <textarea class="form-control" name="physicalAdd" placeholder="Physical Address" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- General Detail End -->

        <!-- Basic Full Detail Form Start -->
        <section class="full-detail" id="userSubTypeStatus">
            <div class="container">
                <div class="row bottom-mrg extra-mrg">
                    <h2 class="detail-title">Company Info</h2>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Company Name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tagLine" placeholder="Tag Line">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control input-lg" id="companyType" name="companyType">
                                    <option value="">Company Type</option>
                                    @if (count($data['companyTypies']) > 0)
                                    @foreach ($data['companyTypies'] as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control input-lg" id="companyCategory" name="companyCategory">
                                    <option value="">Category</option>
                                    @if (count($data['companyCategories']) > 0)
                                    @foreach ($data['companyCategories'] as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <textarea class="form-control" name="companyDes" id="companyDes" placeholder="Company Description"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Full Detail Form End -->

        {{-- Submit btn --}}
        <div class="row no-padd">
            <div class="detail pannel-footer">
                <div class="col-md-12 col-sm-12">
                    <div class="detail-pannel-footer-btn pull-center">
                        <button type="submit" class="btn btn-success btn-primary small-btn" onclick="createUserAccount()">Create User Account</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

</div>

{{-- Conformation modal --}}
<div id="conformationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Verification</h4>
            </div>
            <div class="modal-body">
                <br>
                <div class="subscribe wow fadeInUp">
                    {{-- Message --}}
                    <div class="col-sm-12">
                        <div class="alert" id="conformationMessageDiv">
                            <div id="conformationMessage"></div>
                        </div>
                    </div>

                    <form class="form-inline" id="verifyForm">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" id="code" name="code" class="form-control" placeholder="Conformation code" required>
                            </div>
                            <div class="form-group">
                                <div class="center">
                                    <button type="submit" id="login-btn" class="submit-btn" onclick="verify()"> Verify </button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
 @push('scripts')
<script type="text/javascript">
    $(function(){
        //Hide content
        $("#content").hide();    
        $("#conformationMessageDiv").hide();   
        $("#userTypeStatus").hide();   
        $("#userSubTypeStatus").hide();   
        // $('#verifyForm')[0].reset(); 
        //Modal
        $("#conformationModal").modal({
            backdrop: 'static',
            keyboard: false
            }); 
    })

</script>
<script type="text/javascript" src="{{asset('_html/pages/home.js')}}"></script>
@endpush