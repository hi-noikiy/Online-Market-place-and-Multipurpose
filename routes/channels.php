<?php
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('messages.{id}', function ($user, $id) {
//     return $user->id === (int) $id;
// });

// //
// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int)$user->id === (int)$id;
// });
// Broadcast::channel('chat', function ($user) {
//     return ['name' => $user->name];
// });
Broadcast::channel( 'chatroomId{chatRoomId}', function ($user, $chatRoomId) {
    // return $user->id === Order::findOrNew($orderId)->user_id;
   return  true;
}, ['guards' =>  ['web','admin']]);
// Broadcast::channel('chat-roomId{chatRoomId}', function ($user, $chatRoomId) {
//     // $user=Auth::guard('admin')->user();
//     // $chtroom = App\Chatroom::find($chtroom);
//     // if (in_array( $user->id, explode(',', $chtroom->chatRoomId))) {
//     //     return true;
//     // } else {
//     //     return false;
//     // }
//     return true;
// }, ['guards' =>  'admin']);

// Broadcast::channel('online-{roomId}', function ($user, $roomId) {
//     return true;
// });
// Broadcast::channel('messagesent-{receiver}', function ($user, $receiver) {


//     return true;
// });