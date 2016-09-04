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

            $message->from('alfonso.payra@gmail.com', 'alfonso payra');

            $message->to('alfonso.payra@gmail.com');

        });

        return response()->json(['message' => 'Request completed']);
    }
}
