<?php

namespace App\Http\Controllers\Admin\Structure;

use App\Helper\Alert;
use App\Helper\Data;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Structure;
use App\Models\User;

class BphController extends Controller
{
    private $type = "bph";
    private $division = ['leader', 'secretary', 'treasurer'];
    
    public function index($period = null){
        $latest = ($period != null) ? Period::where('year', $period)->first() : Period::orderBy('id', 'DESC')->first();
        $bph = $latest->structure?->where([
            'type' => $this->type,
            'period_id' => $latest->id
        ])->get();
        $data = [
            'period' => Period::orderBy('id', 'DESC')->get(),
            'current' => $period??$latest->year,
            'bph' => $bph,
        ];

        return view('admin.structure.daily', Data::view('bph', $data));
    }

    public function create(Request $request){
        // return $request;
        $users = array([$request->leader, $request->secretary, $request->treasurer
        ]);
        
        $period_id = Period::where('year', $request->period)->first()->id;
        
        Structure::where([
            'period_id' => $period_id,
            'type' => $this->type
        ])->whereIn('division', $this->division)->delete();
        
        foreach ($users as $i => $user) {
            $structure = new Structure();
            $structure->period_id = $period_id;
            $structure->user_id = $user;
            $structure->division = $this->division[$i];
            $structure->type = $this->type;
            $success = $structure->save();
        }
        

        if($success) return Alert::success('Berhasil', 'Data pembina berhasil diperbarui');
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
