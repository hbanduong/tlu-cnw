<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $itCenterIds = DB::table('it_centers')->pluck('it_center_id');

        for ($i = 0; $i < 100; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->randomElement(['Samsung', 'Apple', 'Logitech', 'Razer']) . ' ' . $faker->randomElement(['Magic', 'Pro', 'Night']) . ' ' . $faker->randomNumber(2),
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,
                'center_id' => $faker->randomElement($itCenterIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
