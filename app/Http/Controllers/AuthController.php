<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function verify(Request $request){
        $credentials = $request->validate([
            'username' => 'min:3',
            'password' => 'min:2'
        ]);
        
        $remember = $request->remember ? true : false;


        if(Auth::attempt($credentials, $remember = $remember)){
            $request->session()->regenerate();
            return redirect()->route('user.profile');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');

    }

    public function username(){
        return "username";
    }
}
