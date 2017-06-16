<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index(){
        
        
        //dump($aMailboxes);
        $emails  = Message::orderBy('created_at', 'desc')->get();
        return view('email.index',compact('emails'));
    }
    
    public function privateMessage(){
        //dump($aMailboxes);
        $user = Auth::user();
        if($user){
            $emails  = Message::where('from',$user->email)
                    -> orWhere('to',$user->email)
                    ->orderBy('created_at', 'desc')
                    ->get();
            return view('email.index',compact('emails'));
        } else {
            return redirect('/');
        }
    }
}
