<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\NewMessage as MessageEvent;
use App\Mail\NewMessage as MessageMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Message;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewMessage  $event
     * @return void
     */
    public function handle(MessageEvent $event)
    {
        //hanlde event when a new message has been created
        $message = $event->getMessage();
        $id = $message -> id;
        $replyTo = "platimuswaddimus+".$id."@gmail.com";
        
        //getting email address to reply back
        $mailto = $message->to;
        $initialMessageId = explode("+", $mailto);
        
        if(count($initialMessageId)>1){
            $initialMessageIdPart = explode("@", $initialMessageId[1]);
            $initialMessage = Message::find($initialMessageIdPart[0]);
            //var_dump($initialMessage->from);die();
            $messageMaillable = new MessageMail($message);
            $messageMaillable ->replyTo($replyTo, 'Reply Guy');
            $messageMaillable -> subject($message->subject);
            Mail::to($initialMessage->from)
                    ->send($messageMaillable);
        } else{
            $messageMaillable = new MessageMail($message);
            $messageMaillable ->replyTo($replyTo, 'Reply Guy');
            $messageMaillable -> subject($message->subject);
            Mail::to('my@esokia-webagency.com')
                    ->send($messageMaillable);
        }
        
        
        
        
        //dump($message->from);die();
    }
}
