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

        $bphs = [
            [
                'period_id' => 1,
                'division' => 'ketua umum',
            ],
            [
                'period_id' => 1,
                'division' => 'Bendahara umum',
            ],
            [
                'period_id' => 1,
                'division' => 'Sekretaris umum',
            ],
        ];

        User::insert($users);
        Profile::insert($profiles);
        Bph::insert($bphs);
    }
}
