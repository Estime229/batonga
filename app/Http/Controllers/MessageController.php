<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function sendMessage(Request $request)
    {
        $request->validate([


            'user_id2' => 'required',
            'contenumessage' => 'required',
        ]);

        // Créez un nouveau message
        $message = new Message([
            'user_id1' => Auth()->id(),
            'user_id2' => $request->user_id2,
            'contenumessage' => $request->contenumessage,
        ]);

        $message->save();

        return redirect()->route('composeMail')->with('success', 'Message envoyé avec succès!');
    }
}
