<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $renterIds = DB::table('renters')->pluck('renter_id');

        for ($i = 0; $i < 100; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'Lenovo', 'MSI', 'Mac', 'Acer']),
                'model' => $faker->randomElement(['Pro', 'Max', 'Gaming']) . ' ' . $faker->randomNumber(2),
                'specifications' => $faker->sentence(5),
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->randomElement($renterIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
