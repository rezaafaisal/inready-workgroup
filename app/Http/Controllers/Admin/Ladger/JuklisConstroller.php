<?php

namespace App\Http\Controllers\Admin\Ladger;

use App\Helper\Alert;
use Carbon\Carbon;
use App\Helper\Data;
use App\Helper\Filename;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generation;
use Illuminate\Support\Facades\Storage;

class JuklisConstroller extends Controller
{
    private $type = 'juklak-juknis';
    private $path = 'documents/juklak-juknis/';

    public static function route($path){
        return "admin.ledger.juklis.".$path;
    }
    public static function view($path){
        return "admin.ledger.juklak-juknis.".$path;
    }
    
    public function index(){
        return view($this->view('index'), Data::view('juklis'));
    }

    public function create(){
        $data = Generation::all();
        return view($this->view('create'), Data::view('juklis', $data));
    }

    public function store(Request $request){
        $request->validate([
            'filename' => 'required',
            'file' => 'required|mimes:pdf,doc,docx',
            'generation' => 'required'
        ]);

        $is_exist = Document::where(['type' => $this->type, 'generation_id' => $request->generation])->count();
        // cek apakah sudah ada dokumen
        if($is_exist > 0){
            return Alert::error('Gagal', 'Dokumen sudah ada untuk periode angkatan '.Generation::find($request->generation)->name, $this->route('index'));
        }

        // set all to false
        $generation_active = Generation::where('active', true)->first()->id;
        if(Document::all()->count() > 0){
            Document::where('status', true)->where('generation_id', '!=', $generation_active)->update(['status' => false]);
        }
        
        $file = $request->file;
        $filename = Filename::hash($this->type, $request->file->extension());
        Storage::putFileAs($this->path, $file, $filename);
        
        $document = new Document();
        $document->name = $request->filename;
        $document->generation_id = $request->generation;
        $document->file = $filename;
        $document->status = ($request->generation == $generation_active) ? true : false;
        $document->type = $this->type;
        $success = $document->save();

        if($success){
            return Alert::default(true, 'Ditambah', $this->route('index'));
        }

        return Alert::default(false, 'Ditambah');
    }

    public function edit($id){
        $data = [
            'generation' => Generation::all(),
            'document' => Document::find($id)
        ];
        return view($this->view('edit'), Data::view('juklis', $data));
    }

    public function update(Request $request, $id){
        $request->validate([
            'filename' => 'required|min:3',
        ]);  
        
        $document = Document::find($id);
        
        if($request->file){
            Storage::delete($this->path.$document->file);
            $file = $request->file;
            $filename = Filename::hash($this->type, $request->file->extension());
            Storage::putFileAs($this->path, $file, $filename);

            $document->file = $filename;
        }

        $document->name = $request->filename;
        $success = $document->save();

        if($success){
            return Alert::default(true, 'Diedit', $this->route('index'));
        }

        return Alert::default(false, 'Diedit');

    }

    public function destroy(){

    }

    public function set($id){

    }
}
