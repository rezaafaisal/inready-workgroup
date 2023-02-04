<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
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
        $passwd = Hash::make('passwd');
        $genders = [
            ['name' => 'perempuan'],
            ['name' => 'laki-laki']
        ];

        $roles = [
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'user']
        ];

        $users = [
            [
                'role_id' => 1,
                'name' => 'reza',
                'username' => 'rezafaisal',
                'email' => 'reza@gmail.com',
                'password' => $passwd,
            ]
        ];

        Gender::insert($genders);
        Role::insert($roles);
        User::insert($users);
    }
}
