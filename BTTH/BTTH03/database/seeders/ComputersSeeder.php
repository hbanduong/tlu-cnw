<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('computers')->insert([
                'computer_name' => 'Lab' . $faker->randomNumber(1) . '-PC' . $faker->randomNumber(2),
                'model' => $faker->randomElement(['Dell', 'Lenovo', 'Asus', 'Acer']) . ' ' . $faker->randomElement(['Pro', 'Max', 'Gaming']) . ' ' . $faker->randomNumber(2),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Linux Mint', 'Ubuntu', 'Arch Linux', 'Fedora']),
                'processor' => $faker->randomElement(['AMD', 'Intel Xeon', 'AMD Ryzen', 'Intel Core']) . ' ' . $faker->randomNumber(3),
                'memory' => $faker->randomElement([8, 16, 24, 32]),
                'available' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
