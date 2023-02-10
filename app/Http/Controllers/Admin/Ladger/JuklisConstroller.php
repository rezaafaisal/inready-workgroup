<?php

namespace App\Http\Controllers\Admin\Ladger;

use App\Helper\Alert;
use Carbon\Carbon;
use App\Helper\Data;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class JuklisConstroller extends Controller
{
    private $type = 'juklak-juknis';
    private $path = 'documents/juklak-juknis/';

    public function index(){
        return view('admin.ledger.juklak-juknis.index', Data::view('juklis'));
    }

    public function create(){
        return view('admin.ledger.juklak-juknis.create', Data::view('juklis'));
    }

    public function store(Request $request){
        $request->validate([
            'filename' => 'required',
            'file' => 'required|mimes:pdf,doc,docx',
        ]);

        $file = $request->file;
        $filename = $this->type.'_'.Carbon::now()->format('YmdHis').'.'.$request->file->extension();
        Storage::putFileAs($this->path, $file, $filename);
        
        $document = new Document();
        $document->name = $request->filename;
        $document->file = $filename;
        $document->type = $this->type;
        $success = $document->save();

        if($success){
            return Alert::default(true, 'Ditambah', 'admin.ledger.juklis.index');
        }

        return Alert::default(false, 'Ditambah');
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy(){

    }

    public function set($id){

    }
}
