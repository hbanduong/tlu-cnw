<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $classIds = DB::table('classes')->pluck('class_id');

        for ($i = 0; $i < 100; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date(),
                'parent_phone' => '0' . $faker->randomNumber(9),
                'class_id' => $faker->randomElement($classIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
