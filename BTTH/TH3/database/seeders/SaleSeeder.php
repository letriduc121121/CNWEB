<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Medicine;
use Faker\Factory as Faker;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicines = Medicine::pluck('medicine_id')->toArray(); // Lấy danh sách ID thuốc

        for ($i = 1; $i <= 50; $i++) { 
            Sale::create([
                'medicine_id' => $faker->randomElement($medicines),
                'quantity' => $faker->numberBetween(1, 20),
                'sale_date' => $faker->dateTimeThisYear,
                'customer_phone' => $faker->optional()->numerify('09########'), 
            ]);
        }
    }
}
