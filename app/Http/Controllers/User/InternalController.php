<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function history(){
        return view('user.internal.history');
    }

    public function leader(){
        return view('user.internal.leader');
    }
}
