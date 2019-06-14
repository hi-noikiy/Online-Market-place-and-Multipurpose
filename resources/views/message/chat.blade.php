
@extends('_html.layouts.app')
@section('title','Chat')
@section('hed')
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' =>  auth()->guard('admin')->user()
        ]) !!};
        var fetchChatURL = null;
    </script>
@endsection
@section('content')
@include('message.chatJs')
@include('message.chatCss')

<section class="inner-header-title">
    <div class="container">
        <h1>Message</h1>
    </div>
</section>
 <section class="tab-sec">
    <div class="">
        <div class="col-md-12 col-sm-12">
            <div class="First-tab tool-tab">
                <ul class="nav simple nav-tabs" id="simple-design-tab">
                <li class="active"><a onclick="choseuser('1')" href="#sectionA">All</a></li>
                <li ><a href="#sectionA" onclick="choseuser('3')" >Freelancer</a></li>
                <li><a href="#sectionB" onclick="choseuser('4')" >Pros</a></li>
                <li><a href="#sectionC" onclick="choseuser('2')" >Customer</a></li>
                <li><a href="#sectionC" onclick="choseuser('6')" >Employee</a></li>
                <li><a href="#sectionC" onclick="choseuser('5')" >Job Sekeer</a></li>
                </ul>
                <div class="tab-content">
                
                    <div id="sectionA" class="tab-pane fade in active">
                        <h3>All</h3>
                        <p>All Kind of users</p>
                    </div>
                    <div id="sectionA" class="tab-pane fade in active">
                        <h3>Freelancer</h3>
                        <p>Chat with Only Freelancers</p>
                    </div>
                    
                    <div id="sectionB" class="tab-pane fade">
                        <h3>Pros</h3>
                        <p>Chat With Pros</p>
                    </div>
                    
                    <div id="sectionC" class="tab-pane fade">
                        <h3>Customers</h3>
                        <p>Chat with customers.</p>
                    </div>
                    <div id="sectionC" class="tab-pane fade">
                        <h3>Employees</h3>
                        <p>Chat with Employees.</p>
                    </div>
                    <div id="sectionC" class="tab-pane fade">
                        <h3>Job Seeker</h3>
                        <p>Chat with Jobseeker.</p>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</section>  
@php
    if(!isset($roomId)){
        $roomId=-10;
    }
@endphp
 <script>
   var roomid="{{  $roomId }}";
 </script>   

<div class="container"  >
       

    <div  class="col-md-5 float-left" id="reg">

        <div class="" >
            <a class="dropdown-toggle " href="#" role="button" id="drop" data-toggle="dropdown" data-toggle="dropdown" aria-expanded="true">
               All conversation
           </a> 
            <div class="dropdown-menu " >
              
                <li class="dropdown-item "  id="unrea" aria-expanded="false" >Unread</li>                
                <hr>
                
                <li class="dropdown-item" href="#">Archive</li>
                <li  class="dropdown-item "  aria-expanded="false" id="sss">Spam</li>
           
                <li class="dropdown-item" id="report" aria-expanded="false">Report</li>
                
                <hr>              
                <div id="lll">

                </div>

            </div>
            <input type="text" placeholder="Search with name" class="form-controller" id="search" name="search"></input>

           
           {{-- spam body --}}
            <div id="spambody" >
    
            </div >
            {{-- unread body --}}
            <div id="unread" >
            
            </div>
            {{--report body --}}
            <div id="reportbody" >
            
            </div>
            {{-- level --}}
            <div id="indeviduallevelsearch">

            </div>
           
            <table class="table table-bordered table-hover text-success" >          
                <tbody id="tbod">
        
                </tbody>          
            </table>
        </div>
       
        <ul class="table " style="overflow-y: hidden;height:100% ;width:100%" > 
           @foreach($receivers as $receiver)          
                @php
                   $user=Auth::guard('admin')->user();
                   
                   
                    if($user->id==$receiver->id){
                        continue;
                    }
               
                    if($receiver->id > $user->id){
                    $chatRoomId = $user->id.','.$receiver->id;
                    }
                    else{
                    $chatRoomId = $receiver->id.','.$user->id;
                    }
                    $room=App\Chatroom::where('chatRoomId',$chatRoomId)->first();
                    $timestring=' ';
                    $messages=App\Chatmessage::where('RoomId',$room->id)                                           
                                            ->where('sender','!=',$user->id)
                                            ->orderBy('created_at','DESC')
                                            ->first();
                    $messageunread=0;                        
                    if($messages){
                        if($messages->readWriteStatus != 1){
                             $messageunread = App\Chatmessage::where('RoomId',$room->id)
                                            ->where('readWriteStatus','!=',1)
                                            ->where('sender','!=',$user->id)
                                            ->orderBy('created_at','DESC')
                                            ->count();
                        }else{
                            $messageunread=0;
                        }
                        $timestring= \App\Helpers\GeneralHelper::ago($messages->created_at);
                    }
                    
                    $starlevel=App\LevelTag::where('userleveler',$user->id)
                                    ->where('userbeenleveled',$receiver->id)
                                    ->where('value','star')->count();
                                 
                   
                    @endphp
                    
                     
                    @if( $messageunread>0)
                        <li class=""  style="overflow: hidden;background:lightgray;">
                    @else
                        <li class="" style="overflow: hidden;">
                    @endif        
                            <img class="receiver-profile-image float-left"  src="{{asset('uploads/user/defaultpic.jpg')}}"  height="50px" width="50px"  alt="{{asset('uploads/user/defaultpic.jpg')}}"  >
                            @if($receiver->onlineStatus==1)
                                <sub class="badge badge-success" style="position: relative; left:14%; top: 38px; color: rgb(255, 255, 255);display:inline;float:left">.</sub>

                                @else 
                                <sub class="badge badge-warning" style="position: relative; left:14%; top: 38px; color: rgb(255, 255, 255);display:inline;float:left">.</sub>
                            @endif
                            <a  href="{{url('privateChat/'.$chatRoomId)}}">
                                {{-- <div class="chatlistname" style="float:left"> --}}
                                     <h5 class="float-left"  style="display:inline" >  {{$receiver->name}}  </h5> 
                                     @if($starlevel !=0)
                                      <i class="far fa-star time staryellow"></i><span class="time">{{$timestring}}</span> 
                                    @else 
                                    <i class="far fa-star time ">{{$timestring}}</i>
                                    @endif 
                                {{-- </div> --}}
                               
                                @if($messages)
                                @if($messageunread>0)
                                <h5 class="col-md-10 well-sm " style="display:inline;" ><b>{{ $messages->message}}</b></h5>
                                <span class="badge badge-success">{{$messageunread}}</span>
                                @else
                                 <h5 class=" col-md-10 text-center" style= "display:inline;overflow:hidden;" >{{ $messages->message}}</h5>
                                @endif
                                @endif  

                             </a>
                           
                        
                        </li>
                              
             @endforeach 
            
             
        </ul>

    </div>
  
     @php
       $fullurl=url()->full();
       $dashurl= url('/').'/'.'chatdashboard';
       //echo $fullurl.'<br>'.$dashurl;
       
      @endphp 
      @if($fullurl == $dashurl)
      <div class="jumbotron col-md-8 text-justify float-right message_font "><h2>Hi..  You don't start chat yet... Let's find someone and start talking <i class="far fa-smile"></i> </h2> </div>
     
      @endif
     
  
     @yield('chatcontent')
    

      <div style="position:fixed; right:0%; bottom:0%;" id="messagepop" >

      </div>

   
</div>
   
   <!-- Scripts -->
   <script type="text/javascript">
         @yield('routes')

    </script>
   
    <script src="{{ asset('chatjs/app.js') }}"></script>
     @yield('script')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
       
{{-- <script>
      $(document).ready(function(){
         $.ajax({
            type:'get',
            url:'{{url('/getmessagepopup')}}',
           
            success:function(data){
                console.log(data);
                $('#messagepop').html(data);
                $('.ketamoti').hide();

            }
        });
      }) ;
 
        function messagepo(data){          
           var data1='m'+data;
           var imgdata='msgimg'+data;
           var onlyimg='i'+data;
           console.log(data);
           console.log(imgdata);
             $('#'+data1).show(1000);
             $('#cross'+data).hide();
             
         
        }
        function messagepo2(data){
             var data1='m'+data;
              $('#'+data1).hide(1000);
              $('#cross'+data).show(1010);
        }
       function messagecross(data){
           var imgdata='msgimg'+data;
            $('#'+imgdata).hide(1000);
           $.ajax({
                type:'get',
                data:{'messagecrossid':data},
                url:'{{url('/getmessagepopup')}}',
           
                success:function(data){
                    console.log(data);
                    $('#messagepop').html(data);
                    $('.ketamoti').hide();

                }
          });
        }
   
    
</script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
        <script>
        var user_type_search=0;
        function choseuser(data){
            user_type_search=data;
        }
        </script>
        <script type="text/javascript">

            $('#search').on('keyup',function(){
            
                 $value=$(this).val();
                 console.log($value);
                 $.ajax({
            
                type : 'get',
            
                 url : '{{URL::to('chatsearch')}}',
            
                 data:{'search':$value,'user_type_search':user_type_search},
            
                 success:function(data){
                    console.log(data);
                  $('#tbod').html(data);
            
                 }
            
                 });
        
            })
        
        </script>
        <script type="text/javascript">
        function closeall(){
           
             location.reload();
        };
        $(document).ready(function(){
            $("#sss").click(function(){
                $.ajax({
                    type: 'get',
                    data:{'value':'Spam'}, 
                    url : '{{URL::to('defaullevelsearch')}}',
                   // data:{'authid':$userid},
                    success:function(data){
                        console.log(data);
                        $('#spambody').html(data);
                      
                    }
                })
            });
            $("#report").click(function(){
                $.ajax({
                    type: 'get',
                    data:{'value':'Report'},
                    url : '{{URL::to('defaullevelsearch')}}',
                   // data:{'authid':$userid},
                    success:function(data){
                        console.log(data);
                        $('#reportbody').html(data);
                      
                    }
                })
            });
            });
        </script>
        <script type="text/javascript">
        $(document).ready(function(){
            $("#drop").click(function(){
                $.ajax({
                    type: 'get',
                    url : '{{URL::to('levelsearch')}}',
                    //data:{'authid':roomid },
                    success:function(data){
                     $('#lll').html(data);
                     //  console.log('success');
                    }
                })
            });
            });
        </script>
        <script>
            
            function indeviduallevelsearch(id){
                console.log(id);
                $.ajax({
                    type:'get',
                    url:'{{url('indeviduallevelsearch')}}',
                    data:{'levelid':id},
                    success:function(data){
                        console.log('success');
                        console.log(data);
                        $('#indeviduallevelsearch').html(data);
                    }
                })
            };
        </script>
        <script type="text/javascript">
        $(document).click(function(){
            $("#spamclose").click(function(){
                $.ajax({
                    type: 'get',
                    url : '{{URL::to('spamsearch')}}',
                    data:{'close':'close'},
                    success:function(data){
                     $('#spambody').html(data);
                     //  console.log('success');
                    }
                })
            });
            });
        </script>
         <script type="text/javascript">
        $(document).ready(function(){
            $("#unrea").click(function(){
                //console.log('unread isie');
                $.ajax({
                    type: 'get',
                    url : '{{URL::to('unreadsearch')}}',
                   data:{'authid':roomid },
                    success:function(data){
                       
                     $('#unread').html(data);
                      // console.log('success');
                    }
                })
            });
            });
        </script>

@endsection