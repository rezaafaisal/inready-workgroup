<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        return view('user.activity.index');
    }

    public function show($slug){
        return view('user.activity.detail');
    }
}
