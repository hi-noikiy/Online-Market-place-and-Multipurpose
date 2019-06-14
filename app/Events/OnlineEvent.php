<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\User;

class OnlineEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $RoomId;
    public function __construct(User $user,$RoomId)
    {
        $this->user = $user;
        $this->RoomId=$RoomId;
       // $user = User::find($useid);
        $this->dontBroadcastToCurrentUser();

    }

    
    public function broadcastOn()
    {
        return new PresenceChannel('online-'.$this->RoomId);
    }
}
