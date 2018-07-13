<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Events\ChatEvent;

class ChatController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat(){
        return view("chat");
    }
    public function send(request $request){
        $user = User::find(Auth::id());
        event(new ChatEvent($request->message, $user));
    }
    // public function send(){
    //     $user = User::find(Auth::id());
    //     event(new ChatEvent("Hello Ephraim", $user));
    // }
}
