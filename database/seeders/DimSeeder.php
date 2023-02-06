<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Generation;
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
            ['name' => 9],
            ['name' => 10],
            ['name' => 11],
            ['name' => 12],
            ['name' => 13],
            ['name' => 14],
        ];

        $major = [
            ['name' => 'teknik informatika'],
            ['name' => 'sistem informasi']
        ];

        Gender::insert($genders);
        Role::insert($roles);
        Generation::insert($generations);
        Major::insert($major);
    }
}
