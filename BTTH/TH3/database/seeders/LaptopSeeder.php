<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laptop;
use App\Models\Renter;
use Faker\Factory as Faker;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy tổng số người thuê để sử dụng
        $totalRenters = Renter::count();

        for ($i = 1; $i <= 50; $i++) { // Tạo 50 laptop giả
            $rentalStatus = $faker->boolean; // Trạng thái thuê

            Laptop::create([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'Acer']),
                'model' => $faker->word . ' ' . $faker->numberBetween(1000, 9999),
                'specifications' => $faker->randomElement([
                    'i3, 4GB RAM, 128GB SSD',
                    'i5, 8GB RAM, 256GB SSD',
                    'i7, 16GB RAM, 512GB SSD',
                ]),
                'rental_status' => $rentalStatus,
                'renter_id' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
