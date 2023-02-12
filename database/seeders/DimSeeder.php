<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Generation;
use App\Models\LedgerType;
use App\Models\Major;
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
            ['name' => 'perempuan'],
            ['name' => 'laki-laki']
        ];

        $roles = [
            ['name' => 'admin'],
            // ['name' => 'manager'],
            ['name' => 'user']
        ];

        $generations = [
            ['name' => 9, 'active' => false],
            ['name' => 10, 'active' => false],
            ['name' => 11, 'active' => false],
            ['name' => 12, 'active' => true],
            ['name' => 13, 'active' => false],
        ];

        $major = [
            ['name' => 'teknik informatika'],
            ['name' => 'sistem informasi']
        ];

        $ledger_type = [
            ['type' => 'juklak-juknis'],
            ['type' => 'ad-art'],
            ['type' => 'gbho']
        ];

        LedgerType::insert($ledger_type);
        Gender::insert($genders);
        Role::insert($roles);
        Generation::insert($generations);
        Major::insert($major);
    }
}
