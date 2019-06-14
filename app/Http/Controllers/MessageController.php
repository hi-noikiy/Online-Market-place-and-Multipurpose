<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('_html.message');
    }

    public function chatContacts()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();
        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        $messages = Message::where('from', $id)->orWhere('to', $id)->get();
        return response()->json($messages);
    }

    public function send(Request $request)
    {        
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);        

        broadcast(new NewMessage($message));
        return response()->json($message);
    }
}
