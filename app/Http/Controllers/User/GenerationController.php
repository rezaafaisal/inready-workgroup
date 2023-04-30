<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Models\User;
use App\Models\Profile;
use App\Models\Generation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Note;

class GenerationController extends Controller
{
    private $generation_id = null;
    
    public function index(){
        $data = [
            'generations' => Generation::all(),
            'text' => Note::where('type', 'generation')->first()->body
        ];

        return view('user.generation.index', Data::view('generation', $data));
    }

    public function all(Request $request){
        $keyword = $request->keyword;

        if($keyword){
            $generation = User::where('name', 'LIKE', '%'.$keyword.'%')->paginate(12);

            $generation->transform(function($row){
                return $row->profile;
            });
        }

        else{
            $generation = Profile::where('id', '!=', 1)->paginate(12);
        }

        $data = [
            'generation' => $generation,
            'keyword' => $keyword,
        ];
        

        return view('user.generation.all', Data::view('generation', $data));
    }

    public function show($generation, Request $request){
        $generation_id = $this->generation_id = Generation::where('name', $generation)->first()->id;

        // cek apakah menggunakan kolom search
        if($request->keyword){
            $members = User::where('name', 'like', '%'.$request->keyword.'%')->get()->map(function($row){
                if($row->profile->generation_id == $this->generation_id){
                    return $row->profile;
                }

            })->filter();
        }

        else {
            $members = Profile::where('generation_id', $generation_id)->get();
        }

        $data = [
            'members' => $members,
            'generation' => $generation,
        ];
        return view('user.generation.detail', Data::view('generation', $data));
    }
}
