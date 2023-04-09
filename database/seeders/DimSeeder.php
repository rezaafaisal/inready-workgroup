<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Generation;
use App\Models\LedgerType;
use App\Models\Major;
use App\Models\Period;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            ['name' => 'laki-laki'],
            ['name' => 'perempuan'],
        ];

        $roles = [
            ['name' => 'admin'],
            // ['name' => 'manager'],
            ['name' => 'user']
        ];

        $periods = [
            ['period' => '2019 - 2020', 'year' => '2019'],
            ['period' => '2020 - 2021', 'year' => '2020'],
            ['period' => '2021 - 2022', 'year' => '2021'],
            ['period' => '2022 - 2023', 'year' => '2022'],
        ];

        $generations = [];
            for ($i=0; $i <= 13; $i++) { 
                if($i >= 0 && $i <= 12) $status = 'outgoing';
                else $status = 'active';
                array_push($generations, [
                    'name' => $i,
                    'status' => $status
                ]);
            }

        $major = [
            ['name' => 'teknik informatika'],
            ['name' => 'sistem informasi']
        ];
        Period::insert($periods);
        Gender::insert($genders);
        Role::insert($roles);
        Generation::insert($generations);
        Major::insert($major);
    }
}
