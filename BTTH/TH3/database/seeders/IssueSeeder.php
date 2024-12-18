<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Issue;
use App\Models\Computer; // Đảm bảo có model Computer để tham chiếu đến `computer_id`
use Faker\Factory as Faker;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        $totalComputers = Computer::count();

   
        for ($i = 0; $i < 50; $i++) {
            Issue::create([
                'computer_id' => $faker->numberBetween(1, $totalComputers),  
                'reported_by' => $faker->name,  
                'reported_date' => $faker->dateTimeThisYear, 
                'description' => $faker->sentence(6, true), 
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']), 
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']), 
            ]);
        }
    }
}
