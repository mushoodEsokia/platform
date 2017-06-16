<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
    public function index(){
        
        
        //dump($aMailboxes);
        $emails  = Message::orderBy('created_at', 'desc')->get();
        return view('email.index',compact('emails'));
    }
}
