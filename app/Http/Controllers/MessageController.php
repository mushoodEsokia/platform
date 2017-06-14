<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Client;

class MessageController extends Controller
{
    public function index(){

        $oClient = new Client([
            'host'          => 'imap.gmail.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => 'platimuswaddimus@gmail.com',
            'password'      => 'fr3aking!',
        ]);

        //Connect to the IMAP Server
        $oClient->connect();

        //Get all Mailboxes
        $aMailboxes = $oClient->getFolders();
       
        //Loop through every Mailbox
        /** @var \Webklex\IMAP\Folder $oMailbox */
        foreach($aMailboxes as $oMailbox){
            echo $oMailbox -> fullName;

            //Get all Messages of the current Mailbox
            /** @var \Webklex\IMAP\Message $oMessage */
            foreach($oMailbox->getMessages() as $oMessage){
                echo $oMessage->subject.'<br />';
                echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
                echo $oMessage->getHTMLBody(false);

                //Move the current Message to 'INBOX.read'
                if($oMessage->moveToFolder('INBOX.read') == true){
                    echo 'Message has ben moved';
                }else{
                    echo 'Message could not be moved';
                }
            }
        }
        dump($aMailboxes);die();
        return view('email.index',compact('blogs'));
    }
}
