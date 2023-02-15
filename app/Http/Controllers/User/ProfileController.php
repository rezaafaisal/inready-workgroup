<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $data = Auth::user();
        return view('user.profile.index', Data::view('profile', $data));
    }

    public function profile(){
        return view('user.profile.profile', Data::view('profile'));
    }

    public function personal(){
        return view('user.profile.personal', Data::view('personal'));
    }
    
    public function account(){
        return view('user.profile.account', Data::view('account'));
    }
}
