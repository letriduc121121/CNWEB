<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;
use Faker\Factory as Faker;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 30; $i++) { // Tạo 30 loại thuốc giả
            Medicine::create([
                'name' => $faker->word,
                'brand' => $faker->randomElement(['Pfizer', 'GSK', 'Roche', 'Sanofi', null]), 
                'dosage' => $faker->randomElement(['10mg tablets', '5mg capsules', '250ml syrup']),
                'form' => $faker->randomElement(['tablet', 'capsule', 'syrup']),
                'price' => $faker->randomFloat(2, 1, 100), 
                'stock' => $faker->numberBetween(10, 500),
            ]);
        }
    }
}
