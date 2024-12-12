<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => $faker->unique()->numberBetween(101, 999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
