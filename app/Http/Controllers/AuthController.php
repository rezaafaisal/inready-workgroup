<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function verify(Request $req){
        $req->validate([
            'username' => 'min:3',
            'password' => 'min:2'
        ]);
    }
}
