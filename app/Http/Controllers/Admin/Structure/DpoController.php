<?php

namespace App\Http\Controllers\Admin\Structure;

use App\Helper\Data;
use App\Models\User;
use App\Helper\Alert;
use App\Models\Period;
use App\Models\Structure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DpoController extends Controller
{
    private $type = "dpo";

    public function index($period = null){
        $latest = ($period != null) ? Period::where('year', $period)->first() : Period::orderBy('id', 'DESC')->first();
        $dpos = Structure::where([
            'type' => 'dpo',
            'period_id' => $latest->id
        ])->get();
        $data = [
            'period' => Period::orderBy('id', 'DESC')->get(),
            'current' => $period??$latest->year,
            'dpos' => $dpos,
            'dpo_lead' => collect([
                'id' => $dpos?->where('position', 'leader')->first()?->user->id,
                'name' => $dpos?->where('position', 'leader')->first()?->user->name
            ]),
            'dpo_options' => $latest->structure?->where([
                'type' => 'dpo',
                'period_id' => $latest->id,
                'position' => 'member',
            ])->map(function($row){
              return [
                'id' => $row->user->id,
                'name' => $row->user->name
              ]; 
            })
        ];

        return view('admin.structure.dpo', Data::view('dpo', $data));
    }

    public function create(Request $request){

        // return $request;
        // $request->validate()
        $dpo_members = $request->dpos;
        $period_id = Period::where('year', $request->period)->first()->id;
        
        Structure::where([
            'period_id' => $period_id,
            'type' => 'dpo'
        ])->delete();
        
        // insert dpo lead
        if($request->dpo_lead){
            $structure = new Structure();
            $structure->period_id = $period_id;
            $structure->user_id = $request->dpo_lead;
            $structure->position = 'leader';
            $structure->type = $this->type;
            $structure->position = 'leader';
            $structure->save();
        }

        // insert dpo member
        foreach ($dpo_members as $member) {
            // tambahkan pembina baru
            $structure = new Structure();
            $structure->period_id = $period_id;
            $structure->user_id = $member;
            $structure->type = $this->type;
            $structure->position = 'member';
            $success = $structure->save();
        }

        if($success) return Alert::success('Berhasil', 'Data DPO berhasil diperbarui');
        return Alert::error('Gagal', 'Gagal mengubah data');

    }

    public function search(Request $request){
        $data = [];

        if($request->filled('q')){
            $data = User::where('name', 'LIKE', '%'. $request->get('q'). '%')
                        ->get()->map(function($row){
                            return [
                                'name' => $row->name,
                                'id' => $row->id,
                                'generation' => $row->profile->generation->name
                            ];
                        });
        }
        return response()->json($data);
    }
}
