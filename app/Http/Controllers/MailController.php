<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Models\VerifyKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class MailController extends Controller
{
    public function index(){
        $details = [
            'title' => 'Mail from websitepercobaan.com',
            'body' => 'This is for testing email using smtp'
        ];
        
            Mail::to('rzvect@gmail.com')->send(new \App\Mail\MyTestMail($details));
    }

    public function verifyEmail(Request $request){
        
        $email = $request->email;
        $combined = $email.'|'.Auth::user()->username;
        $encrypt_key = Crypt::encryptString($combined);

        VerifyKey::create([
            'user_id' => Auth::id(),
            'type' => 'verify',
            'token' => $encrypt_key
        ]);

        $details = [
            'title' => 'haha',
            'name' => Auth::user()->name,
            'email' => $email,
            'link' => route('verifyEmail', ['key' => $encrypt_key])
        ];
        Mail::to($email)->send(new VerifyEmail($details));

        return redirect()->back();
    }

    public function view(){
        return view('emails.verify_email');
    }
}
