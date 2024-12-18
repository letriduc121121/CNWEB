<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Computer;
use Faker\Factory as Faker;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        for ($i = 0; $i < 50; $i++) {
            Computer::create([
                'computer_name' => $faker->unique()->word . '-' . $faker->word,  
                'model' => $faker->word . ' ' . $faker->numberBetween(1000, 9999),  
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Linux', 'macOS']),  
                'processor' => $faker->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5']),  
                'memory' => $faker->randomElement([4, 8, 16]),  
                'available' => $faker->boolean(),  
            ]);
        }
    }
}
