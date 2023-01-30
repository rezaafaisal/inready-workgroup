<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function index(){
        return view('user.generation.index');
    }

    public function show($generation){
        return view('user.generation.detail');
    }
}
