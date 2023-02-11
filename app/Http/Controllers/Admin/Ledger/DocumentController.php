<?php

namespace App\Http\Controllers\Admin\Ledger;

use App\Helper\Alert;
use App\Helper\Data;
use App\Helper\Filename;
use App\Models\Document;
use App\Models\Generation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class DocumentController extends Controller
{
    private function type(){
        return [
            'ad-art',
            'juklak-juknis',
            'gbho'
        ];
    }

    private function path($type){
        return "documents/".$type;
    }
    
    private function generation(){
        return Generation::where('active', true)->first()->id;
    }
    public static function route($path = null){
        if($path == null){
            return "admin.ledger.document.";
        }
        return "admin.ledger.document.".$path;
    }
    public static function view($path){
        return "admin.ledger.document.".$path;
    }
    
    public function index($type){
        if(!in_array($type, $this->type())){
            return abort(404);
        }
        $data = [
            'destroy_route' => route($this->route('destroy')),
            'route' => $this->route(),
            'type' => $type,
        ];
        return view($this->view('index'), Data::view($type, $data));
    }

    public function create($type){
        $data = Generation::all();
        return view($this->view('create'), Data::view($type, $data));
    }

    public function store(Request $request, $type){
        $request->validate([
            'filename' => 'required',
            'file' => 'required|mimes:pdf,doc,docx',
            'generation' => 'required'
        ]);

        $is_exist = Document::where(['type' => $type, 'generation_id' => $request->generation])->count();
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
        $filename = Filename::make($request->file->extension());
        Storage::putFileAs($this->path($type), $file, $filename);
    
        $document = new Document();
        $document->name = $request->filename;
        $document->generation_id = $request->generation;
        $document->file = $filename;
        $document->status = ($request->generation == $generation_active) ? true : false;
        $document->type = $type;
        $success = $document->save();

        if($success){
            return Alert::default(true, 'Ditambah', $this->route('index'));
        }

        return Alert::default(false, 'Ditambah');
    }

    public function edit($type, $id){
        $data = [
            'generation' => Generation::all(),
            'document' => Document::find($id),
            'route' => $this->route(),
            'type' => $type
        ];
        return view($this->view('edit'), Data::view($type, $data));
    }

    public function update(Request $request, $id){
        $request->validate([
            'filename' => 'required|min:3',
        ]);  
        
        $document = Document::find($id);
        
        if($request->file){
            Storage::delete($this->path($document->type).$document->file);
            $file = $request->file;
            $filename = Filename::make($request->file->extension());
            Storage::putFileAs($this->path($document->type), $file, $filename);

            $document->file = $filename;
        }

        $document->name = $request->filename;
        $success = $document->save();

        if($success){
            return Alert::default(true, 'Diedit', $this->route('index'));
        }

        return Alert::default(false, 'Diedit');

    }

    public function destroy(Request $request){
        $document = Document::find($request->id);
        
        // kalau periode aktif tidak dapat dihapus
        if($document->generation_id == $this->generation()){
            return Alert::error('Gagal', 'Dokumen periode yang aktif tidak dapat dihapus');
        }
        $success = $document->delete();
        if($success){
            Storage::delete($this->path($document->type).$document->file);
            return Alert::default(true, 'Dihapus', $this->route('index'));
        }

        return Alert::default(0, 'Dihapus');
    }
}
