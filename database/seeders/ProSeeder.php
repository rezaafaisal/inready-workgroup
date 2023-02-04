<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passwd = Hash::make('passwd');
        $users = [
            [
                'role_id' => 1,
                'name' => 'reza',
                'username' => 'rezafaisal',
                'email' => 'reza@gmail.com',
                'password' => $passwd,
            ]
        ];

        $profiles = [
            [
                'user_id' => 1,
                'gender_id' => 2,
                'generation_id' => 5
            ]
        ];

        User::insert($users);
        Profile::insert($profiles);
    }
}
