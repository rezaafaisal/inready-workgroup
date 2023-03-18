<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Admin\Bph;
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
                'name' => 'admin',
                'username' => 'inready_admin',
                'password' => $passwd,
            ],
        ];

        $profiles = [
            [
                'user_id' => 1,
                'gender_id' => 1,
                'generation_id' => 1
            ],
        ];

        User::insert($users);
        Profile::insert($profiles);
    }
}
