<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        
        $this->call([
            CountrySeeder::class,
            DimSeeder::class,
            ProSeeder::class,
            FactSeeder::class
        ]);
        // \App\Models\User::factory(47)->create();

        // for ($i=4; $i <= 50 ; $i++) { 
        //     $generation = rand(1,5);
        //     $gender = rand(1,2);

        //     Profile::create([
        //         'user_id' => $i,
        //         'gender_id' => $gender,
        //         'generation_id' => $generation,
        //         'job' => $faker->jobTitle,
        //         'headline' => $faker->jobTitle,
        //         'address' => $faker->address
        //     ]);
        // }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
