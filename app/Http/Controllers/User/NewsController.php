<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('user.news.index');
    }
    
    public function show($slug){
        return view('user.news.detail');
    }
}
