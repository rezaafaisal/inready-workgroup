<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $details = [
            'title' => 'Mail from websitepercobaan.com',
            'body' => 'This is for testing email using smtp'
        ];
        
            Mail::to('rzvect@gmail.com')->send(new \App\Mail\MyTestMail($details));
    }

    public function verifyEmail(){
        $details = [
            'title' => 'haha',
            'name' => 'sjd',
            'email' => 'akljsk',
            'link' => 'akjsdl'
        ];

        Mail::to('60200119075@uin-alauddin.ac.id')->send(new VerifyEmail($details));
    }

    public function view(){
        return view('emails.verify_email');
    }
}
