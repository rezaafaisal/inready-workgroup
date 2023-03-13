<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\Structure;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    private $type = ['elder', 'dpo', 'bph'];
    
    public function index($year, $division){

        $period = Period::where('year', $year)->first();
        // cek apakah bukan bpo
        if(in_array($division, $this->type)){
            $structure = Structure::where([
                'type' => 'bpo',
                'division' => $division,
                'period_id' => $period->id, 
            ])->get();

            $leader = $structure->where('position', 'leader')->first();
            $member = $structure->where('position', 'member');

            if($division == 'dpo') $division_name = 'Dewan Pertimabangan Organisasi';
            else if($division == 'elder') $division_name = 'Pembina';
            else if($division == 'bph') $division_name = 'Badan Pengurus Harian';
        }

        else{
            $division = str_replace('-', ' ', $division);
            $structure = Structure::where([
                'type' => 'bpo',
                'division' => $division,
                'period_id' => $period->id, 
            ])->get();

            $leader = $structure->where('position', 'leader')->first();
            $member = $structure->where('position', 'member');
            
        }

        $data = [
            'leader' => $leader,
            'member' => $member,
            'period' => $period->period,
            'division' => ucwords($division_name ?? $division),
        ];
        
        return view('user.manager', Data::view('manager', $data));
    }
}
