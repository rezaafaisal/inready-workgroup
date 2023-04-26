<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Admin\Bph;
use App\Models\Note;
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

        $notes = [
            [
                'type' => 'welcome',
                'body' => 'Inready Workgroup adalah study club yang berada dilingkup Universitas Islam Negeri Aladdin Makassa. Study club ini fokus pada keilmuan Teknologi Informasi seperti Mobile Development, Web Development, dan UI/UX Design.'
            ],
            [
                'type' => 'footer',
                'body' => 'Inready Workgroup adalah salah satu studi club external di lingkup UIN Alauddin Makassar, kunjungi sekretariat kami.'
            ],
            [
                'type' => 'generation',
                'body' => 'Anggota inready dari generasi ke generasi',
            ],
            [
                'type' => 'about',
                'body' => 'Inready Workgroup adalah Study Club yang berfokus pada dunia IT khususnya di bidang web, mobile dan desain. Study Club ini sudah berdiri sejak tahun 2007 serta menghimpun mahasiwa jurusan Teknik Informatika dan Sistem Informasi UIN Alauddin Makassar. Bagi mahasiswa, study club menjadi salah satu alternatif untuk belajar. Sebab, dengan mengikuti study club, mereka mendapatkan ilmu tambahan selain dari dosen ketika belajar di kelas.'
            ]
        ];

        User::insert($users);
        Profile::insert($profiles);
        Note::insert($notes);
    }
}
