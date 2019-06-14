@extends('_admin.layouts.app')

@section('title', 'Setting')

@section('content')

<div id="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Settings</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <!-- /row -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                    
                        <div class="card-header">
                            <h4>Basic Settings</h4>
                        </div>
                        
                        <div class="card-body">
                            <form class="form-horizontal" method="post">
                            
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Name:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" class="form-control" value="Your Site - Responsive Job & Listing Website">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">URL:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" class="form-control" value="https://www.jobboard.com/">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Title:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" class="form-control" value="Best job Board Website">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Keyword:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" class="form-control" value="listing, job, job portal">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Description:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" class="form-control" value="This job board is very useful and featuredful website wher you can search all type of jobs.">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Contact email:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" class="form-control" value="support@yougamil.com">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Enable Mobile Site:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <div class="sl-box">
                                            <select class="form-control">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Main Content:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <textarea name="content" class="form-control" id="editor"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Submission Terms:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <textarea class="form-control" name="content" id="editor1"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Google Analytics Code:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <textarea class="form-control height-100"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">HTTP Character Set:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <div class="sl-box">
                                            <select class="form-control wide">
                                                <option value="ASMO-708" id="CHARSET-0">Arabic (ASMO 708) - ASMO-708</option>
                                                <option value="DOS-720" id="CHARSET-1">Arabic (DOS) - DOS-720</option>
                                                <option value="iso-8859-6" id="CHARSET-2">Arabic (ISO) - iso-8859-6</option>
                                                <option value="x-mac-arabic" id="CHARSET-3">Arabic (Mac) - x-mac-arabic</option>
                                                <option value="windows-1256" id="CHARSET-4">Arabic (Windows) - windows-1256</option>
                                                <option value="ibm775" id="CHARSET-5">Baltic (DOS) - ibm775</option>
                                                <option value="iso-8859-4" id="CHARSET-6">Baltic (ISO) - iso-8859-4</option>
                                                <option value="windows-1257" id="CHARSET-7">Baltic (Windows) - windows-1257</option>
                                                <option value="ibm852" id="CHARSET-8">Central European (DOS) - ibm852</option>
                                                <option value="iso-8859-2" id="CHARSET-9">Central European (ISO) - iso-8859-2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Upload Logo:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <label class="btn-bs-file btn">
                                            Browse
                                            <input type="file">
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-3">Upload Favicon:</label>
                                    <div class="col-md-10 col-sm-9">
                                        <label class="btn-bs-file btn">
                                            Browse
                                            <input type="file">
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 text-center">
                                        <button type="button" class="btn btn-info sweet-1" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);">Save & Update</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>	
    </div>

    @endsection