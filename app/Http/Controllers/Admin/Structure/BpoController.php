<?php

namespace App\Http\Controllers\Admin\Structure;

use App\Helper\Data;
use App\Models\User;
use App\Helper\Alert;
use App\Models\Period;
use App\Models\Structure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class BpoController extends Controller
{
    private $type = "bpo";
    
    public function index($period = null){
        $latest = ($period != null) ? Period::where('year', $period)->first() : Period::orderBy('id', 'DESC')->first();

        // get divisi
        $division = Structure::where([
            'type' => $this->type,
            'period_id' => $latest->id
        ])->orderBy('division')->get()->unique('division');
        
        // get bpo
        $bpo = Structure::where([
            'type' => $this->type,
            'period_id' => $latest->id
        ])->orderBy('position')->get();

        $data = [
            'period' => Period::orderBy('id', 'DESC')->get(),
            'current' => $period??$latest->year,
            'latest' => $latest,
            'division' => $division,
            'bpo' => $bpo
        ];

        return view('admin.structure.bpo', Data::view('bpo', $data));
    }

    public function createDivision(Request $request){
        $request->validate([
            'division' => 'required',
            'elder' => 'required',
            // 'members' => 'required'
        ]);
        
        $period = Period::where('year', $request->period)->first();

        if($request->elder){
            $structure = new Structure();
            $structure->user_id = $request->elder;
            $structure->period_id = $period->id;
            $structure->position = 'leader';
            $structure->division = $request->division;
            $structure->type = $this->type;
            $success = $structure->save();
        }

        if($success && $request->members){
            foreach ($request->members as $member) {
                $structure = new Structure();
                $structure->user_id = $member;
                $structure->period_id = $period->id;
                $structure->position = 'member';
                $structure->division = $request->division;
                $structure->type = $this->type;
                $success = $structure->save();
            }
        }

        if($success) return Alert::success('Berhasil', 'Divisi BPO telah ditambahkan, silahkan tentukan pengurusnya');
        return Alert::error('Gagal', 'Terjadi kesalahan');
    }

    public function setDivision(Request $request){
        $request->validate([
            'division' => 'required',
            'leader' => 'required'
        ]);

        $period = Period::where('year', $request->period)->first();

        // delete structure old
        Structure::where([
            'period_id' => $period->id,
            'division' => $request->old_division
        ])->delete();

        // insert leader of division
        $structure = new Structure();
        $structure->user_id = $request->leader;
        $structure->division = $request->division;
        $structure->position = 'leader';
        $structure->type = $this->type;
        $structure->period_id = $period->id;
        $success = $structure->save();


        foreach ($request->members ?? [] as $member) {
            $structure = new Structure();
            $structure->user_id = $member;
            $structure->division = $request->division;
            $structure->period_id = $period->id;
            $structure->position = 'member';
            $structure->type = $this->type;
            $success = $structure->save();
        }

        if($success) return Alert::success('Berhasil', 'Pengurus berhasil ditentukan');

        return Alert::error('Gagal', 'Terjadi kesalahan');
    }

    public function destroyDivision(Request $request){
        $structure = Structure::where([
            'period_id' => $request->period,
            'division' => $request->division
        ])->get();

        $structure->map(function($row){
            if($row->important == true) return Alert::error('Gagal', 'Divisi ini tidak dapat dihapus');
        });

        $success = Structure::where([
            'period_id' => $request->period,
            'division' => $request->division
        ])->delete();

        if($success) return Alert::success('Berhasil', 'Divisi telah dihapus');

        return Alert::error('Gagal', 'Terjadi kesalahan');
    }
}
