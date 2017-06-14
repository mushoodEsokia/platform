<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Client;
use App\Message;

class MessageController extends Controller
{
    public function index(){
        
        //get count of all message from our database
        $messagesInDatabase = Message::count();
        echo $messagesInDatabase . "<br />";

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
        echo $oClient -> countRecentMessages().'<br />';
        echo $oClient -> countMessages().'<br />';
        $messagesInMailbox = $oClient -> countMessages();
       
        //Loop through every Mailbox
        /** @var \Webklex\IMAP\Folder $oMailbox */
        foreach($aMailboxes as $oMailbox){
            echo $oMailbox -> fullName .'<br />';
            if($oMailbox -> fullName == 'INBOX'){
                //Get all Messages of the current Mailbox
                /** @var \Webklex\IMAP\Message $oMessage */
                $index = 0;
                $criteria = 'ALL'; //get all messages in inbox
                $criteria = 'UNSEEN'; //get only unread messages in inbox
                foreach($oMailbox->getMessages($criteria) as $key => $oMessage){
                    $index++;
                    echo $oMessage->subject.'<br />';
                    $from = $oMessage->from;
                    //print_r($from);
                    echo $from[0]->mail.'<br />';
                    $to = $oMessage->to;
                    //print_r($to);
                    echo $to[0]->mail.'<br />';
                    //echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
                    echo $oMessage->getHTMLBody(true);
                    echo "key: " . $index . " <br />";
                    //since we read only unread, no need to check
                    //if($index>$messagesInDatabase){
                        echo "you have one new message <br />";
                        
                        $message = new Message();
                        $message->from = $from[0]->mail;
                        $message->to = $to[0]->mail;
                        $message->subject = $oMessage->subject;
                        $message->content = $oMessage->getHTMLBody(true);
                        $message->save();
                        dump($oMessage);
                         
                    //}
                }
            }
        }
        dump($aMailboxes);die();
        return view('email.index',compact('blogs'));
    }
}
