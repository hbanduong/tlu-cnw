<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $computerIds = DB::table('computers')->pluck('computer_id');

        for ($i = 0; $i < 100; $i++) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds),
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear,
                'description' => $faker->sentence(10),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}