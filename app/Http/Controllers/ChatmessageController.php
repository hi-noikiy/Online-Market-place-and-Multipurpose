<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Chatroom;
use App\User;
class ChatmessageController extends Controller
{
//    public function index(){
//        $user=Auth::guard('admin')->user();
//        return view('message.chat');

//    }
    public function index()
    {
        $id = Auth::guard('admin')->user()->id;
        $receiver = $this->receivers($id);

      //  $user = Auth::guard('admin')->user();


        return view( 'message.chat')->with('receivers', $receiver);
           
          
    }
    public function receivers($id)
    {
        $receiver = array();

        $chatroom = Chatroom::where('chatRoomId', 'Like', '%' . $id . '%')->orderBy('updated_at')->get();
        // print_r($chatroom);
        foreach ($chatroom as $chat) {
            $arr = explode(',', $chat->chatRoomId);
            // print_r($arr);
            if ($arr[0] == $id) {

                array_push($receiver, User::find($arr[1]));
            } elseif ($arr[1] == $id) {
                array_push($receiver, User::find($arr[0]));
            } else {
                continue;
            }
        }
        return $receiver;
    }
}
