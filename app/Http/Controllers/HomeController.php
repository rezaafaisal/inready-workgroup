<?php

namespace App\Http\Controllers;

use App\Helper\Data;
use App\Http\Controllers\Admin\Ledger\DocumentController;
use App\Models\Document;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('user.index', Data::view('home'));
    }
}