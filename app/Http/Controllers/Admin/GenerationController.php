<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Generation;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function index(){
        $data = Generation::all();
        return view('admin.generation', Data::view('generation', $data));
    }
}
