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
}
