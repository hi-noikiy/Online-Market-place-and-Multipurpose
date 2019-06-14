<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Events\ChatEvent;
use App\Events\OnlineEvent;
use Session;
use App\Chatroom;
use App\User;
use App\Chatmessage;

class ChatController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function readwrite(){
        
    }
    public function setonline(Request $request){
        $id =$request->id;
        $user = User::where('id',$id)->first();
        $user->onlineStatus = 1;
        $user->save();
    }
    public function setoffline(Request $request){

    }
    public function spam(Request $request, $id)
    {
        $class;
        $message=Chatmessage::where('id',$id)->first();
        
        if($message->activationStatus == 0){
            $message->activationStatus =1;
            $class='false';
        }else{
             $message->activationStatus=0;
             $class='true';
        }
        //$message->activationStatus=1;
        $message->save();

       return [
           'id'=> $message,
           'spamClass'=>$class,
       ];
    }
    public function unread(Request $request){
            
        $receivers=$request->totalreceivers;
        $unread=array();
        for($i=0;$i<sizeof($receivers);$i++){
            $userid = Auth::guard('admin')->user()->id;
            $receiverid = $receivers->id;
            if ($userid == $receiverid) {
                continue;
            }
            if ($receiverid > $userid) {
                $chatRoomId = Auth::guard('admin')->user()->id. ',' .$receiver->id;
            } else {
                $chatRoomId = $receiver->id. ',' .$userid;
            }
            $romid = Chatroom::where('chatRoomId', $chatRoomId)->first();
            $romid = $romid->id;
            $message = Chatmessage::where('RoomId', $romid)->orderBy('created_at', 'DSEC')->first();
            array_push($unread,$message->readWriteStatus);

        }
        return [
            'unread'=> $unread,
        ];
    }
   public function report(Request $request, $messageid){

   }
   public function getallOnlineUser(Request $request){
       $onlineUsers=User::where('onlineStatus',1)->get();
       $onlineUserId=array();
      foreach($onlineUsers as $onlineUser){
        array_push($onlineUserId,$onlineUser->id);
      }
     // print_r($onlineUserId);
      return [
          'onlineUserId'=>$onlineUserId,
      ];
   }


    public function getOldMessage(Request $request)
    {
        $messages = Chatmessage::where('roomId', $request->room)->get();
        $me=Auth::guard('admin')->user()->id;
        $cont=0;
        $color = [];
        $mgs = [];
        $time = [];
        $user = [];
        $messageid = [];
       
        $wasactive=[];
        $mgssender=[];
        $receiverOnline;
        $image=[];
        $rece;
        $chatroom=Chatroom::where('id',$request->room)->first();
        $r=explode(',',$chatroom->chatRoomId);
        if($r[0]==Auth::guard('admin')->user()->id){
            $rece=User::where('id',$r[1])->first();
            if($rece->onlineStatus==0){
                $receiverOnline='offline';
            }else{
                $receiverOnline = 'online';
            }
        }else{
            
            $rece = User::where('id', $r[0])->first();
            if ($rece->onlineStatus == 0) {
                $receiverOnline = 'offline';
            } else {
                $receiverOnline = 'online';
            }
        }
        foreach ($messages as $message) {
            if ($message->sender == Auth::guard('admin')->user()->id) {
                array_push($color, 'mesuccess');
                array_push($user, 'Me');
                
                array_push($mgssender,'true');
                array_push($image,Auth::guard('admin')->user()->avatar);

            } else {
                array_push($color, 'hesuccess');
                array_push($user, $rece->name);
                
                array_push($mgssender, 'false');
                array_push($image,$rece->avatar);
                if($message->readWriteStatus==1){
                    $cont++;
                }
            }
            array_push($mgs, $message->message);
            if($message->activationStatus == 1){
                array_push($wasactive,'true');
               
            }else{
                array_push($wasactive,'false');
               
            }
           
            array_push($messageid, $message->id);
           
            $localTime= $this->local( $request->utc,$message->created_at);
            array_push($time,$localTime);
            

        }
        return [

            'messages' => $mgs,
            'color' => $color,
            'time' => $time,
            'user' => $user,
            'messageid' => $messageid,        
            'receiverOnline'=> $receiverOnline,
            'image'=>$image,
            'mgssender'=> $mgssender,
            'wasactive'=> $wasactive,
            'cont'=>$cont,
        ];
       
    }
    public function local($utcDifference,$utc){
        $utcTimeAndDate= explode(' ',$utc);
        $utcDate=$utcTimeAndDate[0];
        $utcTime=$utcTimeAndDate[1];
        $utcTime= explode(':',$utcTime);
        $utcDate= explode('-',$utcDate);
        $utcDifference = (-1) * $utcDifference;
        $h=$utcDifference / 60;
        $m=$utcDifference % 60;
        $utcTime[1] = $utcTime[1]+$m;
        if($utcTime[1]>=60 || $utcTime[1]<0){
            if($utcTime[1]>=60){
                $utcTime[1]= $utcTime[1]-60;
                $h++;
            }
            if($utcTime[1]<0){
                $utcTime[1]= $utcTime[1]+60;
                $h--;
                $utcTime[1]= $utcTime[1]+$m;
            }

        }
        $utcTime[0] = $utcTime[0]+$h;
        if($utcTime[0]>=24 || $utcTime[0]< 0){
            if($utcTime[0]>=24){
                $utcTime[0]= $utcTime[0]-24;
                $utcDate[2]++;
            }
            if($utcTime[0]<0){
                $utcTime[0]= $utcTime[0]+24;
                $utcTime[0]= $utcTime[0]+$h;
                $utcDate[2]--;
            }
           
        }
        if($utcDate[2]>30 || $utcDate[2]<0){
            if($utcDate[2]>30){
                $utcDate[1]++;
            }
            if($utcDate[2]<0){
                $utcDate[1]--;
            }

        }
        if ($utcDate[1]>12 || $utcDate[1]<0){
            if($utcDate[1]>12){
                $utcDate[0]++;
            }
            if($utcDate[1]<0){
                $utcDate[0]--;
            }
        }
        $fmon;
       // $l= $utcDate[0]. '-'. $utcDate[1].'-'. $utcDate[2]. ' ' . $utcTime[0] .':' . $utcTime[1] . ':' . $utcTime[2];
        $month = ["kaka","Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        if($utcDate[1]=='01'){
            $fmon='Jan';
        }
        if($utcDate[1]=='02'){
            $fmon='Feb';
        }
        if($utcDate[1]=='03'){
            $fmon='Mar';
        }
        if($utcDate[1]=='04'){
            $fmon='April';
        }
        if($utcDate[1]=='05'){
            $fmon='May';
        }
        if($utcDate[1]=='06'){
            $fmon='Jun';
        }
        if($utcDate[1]=='07'){
            $fmon= 'July';
        }
        if($utcDate[1]=='08'){
            $fmon='Aug';
        }
        if($utcDate[1]=='09'){
            $fmon='Sep';
        }
        if($utcDate[1]=='10'){
            $fmon='Oct';
        }
        if($utcDate[1]=='11'){
            $fmon='Nov';
        }
        if($utcDate[1]=='12'){
            $fmon='Dec';
        }
        $l=$fmon.' '. $utcDate[2].','.' '. $utcTime[0].':'. $utcTime[1].':'. $utcTime[2];
        return $l;

        

    }
    
   
}

    /*public function send(){
    	$user = Auth::user();
    	$message = "Tushar";
    	event(new ChatEvent($message,$user));
    }*/

