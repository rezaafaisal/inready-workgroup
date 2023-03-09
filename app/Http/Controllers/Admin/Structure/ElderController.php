<?php

namespace App\Http\Controllers\Admin\Structure;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;

class ElderController extends Controller
{
    public function index($period = null){
        $data = [
            'period' => Period::orderBy('id', 'DESC')->get()
        ];
        return view('admin.structure.elder', Data::view('elder', $data));
    }
}
