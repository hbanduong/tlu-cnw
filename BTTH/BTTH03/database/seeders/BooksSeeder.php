<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $libraryIds = DB::table('libraries')->pluck('library_id');

        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->randomElement(['Programming', 'Fiction', 'Non-Fiction', 'Science', 'Fantasy', 'Biography']),
                'library_id' => $faker->randomElement($libraryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
