<?php

namespace App\Listeners;

use App\Events\NewMessage;
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
    public function handle(NewMessage $event)
    {
        //hanlde event when a new message has been created
        $message = $event->getMessage();
        //dump($message->from);die();
    }
}
