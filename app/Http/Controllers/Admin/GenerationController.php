<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Alert;
use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Generation;
use Generator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GenerationController extends Controller
{
    public function index(){
        $data = Generation::orderBy('id', 'DESC')->get();
        return view('admin.generation', Data::view('generation', $data));
    }

    public function create(Request $request){
        $latest = $request->latest;

        $success = Generation::create([
            'name' => (int)$latest+1,
            'status' => 'member'
        ]);

        if($success){
            return Alert::default(true, 'Ditambah');
        }
        return Alert::default(false, 'Ditambah');
    }

    public function set(Request $request){
        $status = $request->status;
        $id = Crypt::decryptString($request->id);

        if($status == 'outgoing'){
            if(Generation::where('name', $id-1)->first()->status == 'active') return Alert::error('Terjadi Kesalahan', 'Kepengurusan belum selesai, tidak bisa menjadi demisioner!');

            if(Generation::where('name', $id+1)->first() == null) return Alert::error('Terjadi Kesalahan', 'Setidaknya jadikan pengurus generasi selanjutnya sebelum demisioner');
        }
        $success = Generation::where('name', $id)->update([
            'status' => ($status == 'active') ? 'active' : 'outgoing'
        ]);

        if($success) return Alert::default(true, 'Diperbarui');
        return Alert::default(false, 'Diperbarui');
    }
}
