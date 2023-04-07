<?php

namespace App\Http\Controllers\Admin\Structure;

use App\Helper\Alert;
use App\Helper\Data;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

use function PHPUnit\Framework\returnSelf;

class BphController extends Controller
{
    private $type = "bph";
    private $division = ['leader', 'secretary', 'treasurer'];
    
    public function index($period = null){
        $latest = ($period != null) ? Period::where('year', $period)->first() : Period::orderBy('id', 'DESC')->first();
        $bph = Structure::where([
            'type' => 'bph',
            'period_id' => $latest->id
        ])->get();
        $data = [
            'period' => Period::orderBy('id', 'DESC')->get(),
            'current' => $period??$latest->year,
            'latest' => $latest,
            'bph' => $bph,
        ];

        return view('admin.structure.daily', Data::view('bph', $data));
    }

    public function createDivision(Request $request){
        $request->validate([
            'division' => 'required'
        ]);

        $period = Period::where('year', $request->period)->first();
        $structure = new Structure();
        $structure->period_id = $period->id;
        $structure->division = $request->division;
        $structure->type = $this->type;
        $success = $structure->save();

        if($success) return Alert::success('Berhasil', 'Divisi BPH telah ditambahkan, silahkan tentukan pengurusnya');

        return Alert::error('Gagal', 'Terjadi kesalahan');
    }

    public function setDivision(Request $request){
        $request->validate([
            'structure_id' => 'required'
        ]);

        $structure = Structure::find($request->structure_id);
        $structure->division = $request->division;
        $structure->user_id = $request->user;
        $success = $structure->save();

        if($success) return Alert::success('Berhasil', 'Pengurus berhasil ditentukan');

        return Alert::error('Gagal', 'Terjadi kesalahan');
    }

    public function destroyDivision(Request $request){
        $id = Crypt::decryptString($request->destroy_id);

        $structure = Structure::find($id);
        if($structure->important == true) return Alert::error('Gagal', 'Divisi ini tidak dapat dihapus');
        $success = $structure->delete();

        if($success) return Alert::success('Berhasil', 'Divisi telah dihapus');

        return Alert::error('Gagal', 'Terjadi kesalahan');
    }

    public function search(Request $request, $period = null){

        $period_id = Period::where('year', $period)->first('id')->id;
        $exclude_user = [];
        $data = [];

        $exclude_user = Structure::whereIn('type', ['bph', 'bpo'])->where('period_id', $period_id)->get()->map(function($row){
            return $row->user_id ?? 0;
        });

        // return $exclude_user;

        if($request->filled('q')){
            $data = User::where('name', 'LIKE', '%'. $request->get('q'). '%')->whereNotIn('id', $exclude_user)
                        ->get()->map(function($row){
                            return [
                                'name' => $row->name,
                                'id' => $row->id,
                                // 'generation' => $row->profile->generation->name
                            ];
                        });
        }
        return response()->json($data);
    }
}
