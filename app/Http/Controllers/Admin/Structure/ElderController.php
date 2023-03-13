<?php

namespace App\Http\Controllers\Admin\Structure;

use App\Helper\Alert;
use App\Helper\Data;
use App\Models\User;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Structure;

class ElderController extends Controller
{
    private $type = "elder";
    public function index($period = null){
        $latest = ($period != null) ? Period::where('year', $period)->first() : Period::orderBy('id', 'DESC')->first();
        $elders = $latest->structure?->where([
            'type' => 'elder',
            'period_id' => $latest->id
        ]);
        $data = [
            'period' => Period::orderBy('id', 'DESC')->get(),
            'current' => $period??$latest->year,
            'elders' => $elders,
            'elder_options' => $elders?->map(function($row){
              return [
                'id' => $row->user->id,
                'name' => $row->user->name
              ]; 
            })
        ];

        return view('admin.structure.elder', Data::view('elder', $data));
    }

    public function create(Request $request){

        $users = $request->elders;
        $period_id = Period::where('year', $request->period)->first()->id;
        
        Structure::where([
            'period_id' => $period_id,
            'type' => 'elder'
        ])->delete();
        
        foreach ($users as $user) {
            // tambahkan pembina baru
            $structure = new Structure();
            $structure->period_id = $period_id;
            $structure->user_id = $user;
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
