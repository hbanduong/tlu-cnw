<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $cinemaIds = DB::table('cinemas')->pluck('cinema_id');

        for ($i = 0; $i < 100; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(90, 240),
                'cinema_id' => $faker->randomElement($cinemaIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
