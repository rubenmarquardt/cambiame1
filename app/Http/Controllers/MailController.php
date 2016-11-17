<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;

class MailController extends Controller
{
    //
    public function send(Request $request){
        Mail::send('auth.emails.welcome', ['title' => "asdf", 'content' => "asdf"], function ($message)
        {

            $message->from('mc2mvd@gmail.com', 'MC2 Montevideo');

            $message->to('mc2mvd@gmail.com');

        });

        return response()->json(['message' => 'Request completed']);
    }
}
