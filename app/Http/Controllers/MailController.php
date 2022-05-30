<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
class MailController extends Controller
{
    public function mailsend()
    {
        $details = [
            '$name' => 'name',
            '$email' => 'email',
            '$message' => 'message'
        ];

        \Mail::to('nasnickmd@gmail.com')->send(new SendMail($details));
        return view('email.thanks');
    }
}