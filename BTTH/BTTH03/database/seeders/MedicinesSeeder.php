<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->sentence(3),
                'brand' => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                'dosage' => $faker->randomNumber(2) . 'mg',
                'form' => $faker->randomElement(['Tablets', 'Capsules', 'Syrups', 'Powders', 'Chewables']),
                'price' => $faker->randomNumber(2),
                'stock' => $faker->numberBetween(0, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
