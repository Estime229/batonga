<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    //
    public function inboxMail(Message $message )
    {
        
        $message=Message::where("user_id2" , Auth::id())->OrderBy('created_at', 'desc')->get();
        return view('Mailbox.inbox', compact('message'));
    }

    public function composeMail(User $users)
    {
        $users=User::all();
        return view('Mailbox.compose',compact('users'));
    }

    
    public function readMail(Request $request, Message $message)
    {
        return view('Mailbox.read', compact('message'));
    }

}
