<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Events\NewMessage as MessageEvent;
use App\Mail\NewMessage as MessageMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        Mail::to('my@esokia-webagency.com')->send(new MessageMail());
        //dump($message->from);die();
    }
}
