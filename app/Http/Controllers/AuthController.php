<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    protected $username;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }
    
    public function login(){
        return view('auth.login');
    }

    public function verify(Request $request){
        $request->validate([
            'username' => 'min:3',
            'password' => 'min:2'
        ]);
        
        $remember = $request->remember ? true : false;


        if(Auth::attempt([
                $this->username => $request->username,
                'password' => $request->password
            ], $remember = $remember)){
            $request->session()->regenerate();
            return redirect()->route('user.profile');
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('username');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function findUsername(){
        $login = request()->input('username');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

    public function username(){
        return $this->username;
    }
}
