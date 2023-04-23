<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Data;
use App\Models\Note;
use App\Helper\Alert;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index(){
        return view('admin.note', Data::view('note'));
    }

    public function store(Request $request){
        $request->validate([
            'type' => 'required|min:3',
            'body' => 'required|min:5'
        ]);

        $note = new Note();
        $note->type = Str::slug($request->type);
        $note->description = $request->description;
        $note->body = $request->body;
        $success = $note->save();

        if($success){
            return Alert::default(true, 'Ditambahkan');
        }

        return Alert::default(false, 'Ditambahkan');
    }
}
