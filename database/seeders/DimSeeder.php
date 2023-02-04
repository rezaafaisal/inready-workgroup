<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Generation;
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
            ['name' => 'manager'],
            ['name' => 'user']
        ];

        $generations = [
            ['year' => '2018'],
            ['year' => '2019'],
            ['year' => '2020'],
            ['year' => '2021'],
            ['year' => '2022'],
            ['year' => '2023'],
        ];

        Gender::insert($genders);
        Role::insert($roles);
        Generation::insert($generations);
    }
}
