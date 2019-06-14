@extends('_html.layouts.app')

@section('content')
<section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
    <div class="container">
        <h1>Project Details</h1>
    </div>
</section>
@php
    $order=App\ProFreeOrder::where('proposal_id',$proposal->id)->first();
    
@endphp
<div class="clearfix"></div>
<section class="accordion">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="simple-tab">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                   About The Project
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p>Name: {{$project->title}}</p>
                                <p>Delivery Time: {{$proposal->delivery_time}}</p>
                                <p>Budge: ${{$proposal->price}}</p>
                                <p>Time Remaining: </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Comments
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                       
                         @php
                               $comment=App\SingleProjectComment::where('order_id',$order->id)->get();
                             //  print_r($comment);
                              // exit();
                              
                           @endphp
                           @if($comment)
                                @foreach($comment as $comm)
                                    <div class=" col-md-3 float-left">
                                    @if($comm->sender== Auth::guard('admin')->user()->id)

                                    @php
                                        $sender=Auth::guard('admin')->user();
                                        $image=App\Image::where('type',9)->where('item_id',$sender->id)->first();
                                    @endphp
                                        @if($image)
                                            <img src="{{asset('uploads/user/'.$image->image)}}" class="float-left" height="20px" width="20px" style="border-radius:10%">
                                        @else 
                                            <img src="" class="float-left" height="20px" width="20px" style="border-radius:10%">
                                        @endif
                                    
                                        <h6 class="float-left">Me: </h6>
                                    @else 
                                    @php
                                         $sender=App\User::find($order->customer_id);
                                         $image=App\Image::where('type',2)->where('item_id',$sender->id)->first();
                                    @endphp
                                        @if($image)
                                            <img src="{{asset('uploads/user/'.$image->image)}}" class="float-left" height="20px" width="20px" style="border-radius:10%">
                                        @else 
                                            <img src="" class="float-left" height="20px" width="20px" style="border-radius:10%">
                                        @endif
                                        <h6 class="float-left">Customer: </h6>
                                    @endif
                                    </div>
                                    <div class=" col-md-8 float-left ">
                                        <p>
                                            {{$comm->comment}}
                                            @if($comm->file!=-10)
                                            <a href="{{asset('uploads/file/'.$comm->file)}}">file</a>
                                            @endif
                                            at:{{$comm->created_at}}
                                        </p>
                                    </div>
                                    <br>
                                @endforeach    
                           
                            @endif
                            <form action="{{url('add_commnet')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="order" value="{{$order->id}}">
                                @php
                                    $sender=Auth::guard('admin')->user()->id;
                                @endphp
                                <input type="hidden" name="sender" value="{{$sender}}">
                               
                                <label for="">Add A comment</label>
                                <textarea class="form-control" name="comment">
                                    Comment
                                </textarea>
                                <input type="file" name="file">
                                <input type="submit" class="btn btn-success" value="send">
                            </form>
                           
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Delivery and Resulation Center
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                    <a class="btn btn-success float-right" href="{{url('project_delivery/'.urlencode(base64_encode($proposal->id)))}}" >Deliver Now</a>
                                    <a class="btn btn-info float-left" onclick="show_resulations()">Resulation</a>
                                    <a class="btn btn-danger float-left post-resulation" onclick="show_cancel()" style="display:none">Cancel</a>
                                    <a href="{{url('project_cancel_request/'.urlencode(base64_encode($proposal->id)))}}" class="btn btn-danger float-left cancel" style="display:none">Confirm to send Cancel Request</a>
                                    <a data-toggle="modal" data-target="#exampleModalCenter"  class="btn btn-warning float-left post-resulation" style="display:none">Extend the time</a>
                                    {{-- <a class="btn btn-secondary float-left post-resulation" style="display:none">Modify</a> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modal -->
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Extension Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{url('project_extend_time_request/'.urlencode(base64_encode($proposal->id)))}}">
            @csrf 
            <div class="modal-body" style="padding:4px">
                <label for="">Whe Your requesting this</label>
                <br>
                <label for="I didn't get time">I didn't get time</label>
                <input type="radio" name="extension" class="s " value="I didn't get time" id="I didn't get time">
                <br>
                <label for="I didn't get time">Buyer Extends scope</label>
                <input type="radio" name="extension" class="s" value="Buyer Extends scope" id="Buyer Extends scope">
                
                <br>
                <label for="Buyer not responding">Buyer not responding</label>
                <input type="radio" name="extension" class="s" value="Buyer not responding" id="Buyer not responding">
                <br>
                <label for="Due to technical reason I couldn't complete">Due to technical reason I couldn't complete</label>
                <input type="radio" name="extension" class="s" value="Due to technical reason I couldn't complete" id="Due to technical reason I couldn't complete">
                <hr>
                <h6 style="cursor:pointer;margin:4px" onclick="show_other()">Other</h6>
                <input style="display:none" id="show_other" type="text" name="extension" placeholder="Other Reason">
                <hr>
                <label for="" class="form-group">Day</label>
                <input type="number" class="form-control" name="day" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="send">
            </div>
      </form>
     
    </div>
  </div>
</div>
<!-- -->
</section>
<script>
 function show_resulations(){
     $('.post-resulation').show('100');
 }
 function show_cancel(){
      $('.post-resulation').hide();
     $('.cancel').show('100');
 }
 function show_other(){
     $('#show_other').show();
     $('.s').hide();
 }
</script>

@.show();endsection