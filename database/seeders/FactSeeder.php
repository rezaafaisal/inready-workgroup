<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Structure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $juklak_juknis = [
            [
                'generation_id' => 3,
                'type' => 'juklak-juknis',
                'name' => 'nama file saya',
                'file' => 'document.pdf',
            ],
            [
                'generation_id' => 4,
                'type' => 'juklak-juknis',
                'name' => 'nama file saya lagi',
                'file' => 'document.pdf',
            ],
        ];

        // Document::insert($juklak_juknis);

        $elder = [
            [
                'user_id' => 3,
                'period_id' => 4,
                'type' => 'elder'
            ]
        ];

        Structure::insert($elder);
    }
}
