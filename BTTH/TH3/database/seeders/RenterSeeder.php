<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Renter;
use Faker\Factory as Faker;

class RenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) { // Tạo 20 người thuê giả
            Renter::create([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
