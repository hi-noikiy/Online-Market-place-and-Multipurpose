@extends('_admin.layouts.app') 
@section('title', 'Send Message') 
@section('content')

<div id="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Message to Users</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Message</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <!-- /row -->
        <div class="">
            <div class="col-md-12 col-sm-12">
                <div class="card-header">
                        <h4>Message List</h4>
                    </div>
                     <div style="padding-bottom:2%">
                            <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal">
                                <i class=" glyphicon glyphicon-plus"></i> Semd New
                            </button>
                        </div>
               @if($messages)
                  @foreach($messages as $message)
                    <div class="card">
                        <p class="col-md-8 col-sm-10 float-left">
                            {{$message->message}}
                       
                        </p>
                        @php
                            $type=['a','a','Customer','Freelancer','Pro','Job Seeker','Company','General Users','Candidate'];
                            $admin=App\Admin::find($message->admin_id);
                        @endphp
                        <p style="position:fixed;right:10%;">
                            <h6 class="text-warning">From: {{$admin->name}}</h6>
                            <h6 class="text-success">To: {{$type[$message->user_type]}}</h6>
                            <h6>At: {{$message->created_at}}</h6>
                        </p>
                      

                    </div>
                  @endforeach
                @endif   
                {{ $messages->links() }}
            </div>
             <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Send new Message</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('Send/Message')}}" method="POST">
                                        @csrf
                                        <div>
                                            <h5 for="">Send to:</h5>
                                            <h6 for="">Only Freelancers
                                             <input type="checkbox" value="freelancer" name="freelancer"> 
                                            </h6>
                                            <h6 for="">Only Pros
                                              <input type="checkbox" value="pro" name="pro">
                                            </h6>
                                            <h6 for="">Only Customers
                                              <input type="checkbox" value="customer" name="customer">
                                            </h6>
                                            <h6 for="">Only Candidates
                                              <input type="checkbox" value="candidate" name="candidate">
                                            </h6>
                                            <h6 for="">Only Companies
                                              <input type="checkbox" value="company" name="company">
                                            </h6>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" name="message" id="message">

                                            </textarea>
                                           
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control" value="Send">
                                        </div>
                                    </form>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    {{-- modal --}}
        </div>
    </div>
</div>
@endsection