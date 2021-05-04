<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details=[
            'title'=>'Mail from admin',
            'body'=>'This is for testing mail'
        ];
        Mail::to("shankarwebsenor2@gmail.com")->send(new TestMail($details));
        return "EMail Sent";
    }
}
