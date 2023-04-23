<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        return view('admin.note', Data::view('note'));
    }
}
