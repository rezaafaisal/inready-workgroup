<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $data = [
            'text' => Note::where('type', 'about')->first()->body
        ];
        return view('user.about', Data::view('about', $data));
    }
}
