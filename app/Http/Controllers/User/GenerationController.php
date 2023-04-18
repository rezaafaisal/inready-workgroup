<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Generation;
use App\Models\Profile;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    public function index(){
        $data = [
            'generations' => Generation::all()
        ];

        return view('user.generation.index', Data::view('generation', $data));
    }

    public function show($generation){
        $generation_id = Generation::where('name', $generation)->first()->id;
        $data = [
            'members' => Profile::where('generation_id', $generation_id)->get(),
            'generation' => $generation
        ];
        return view('user.generation.detail', Data::view('detail', $data));
    }
}
