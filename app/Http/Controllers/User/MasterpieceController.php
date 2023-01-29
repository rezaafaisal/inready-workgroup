<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterpieceController extends Controller
{
    public function index(){
        return view('user.masterpiece');
    }
}
