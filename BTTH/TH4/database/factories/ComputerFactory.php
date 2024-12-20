<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
            'computer_name'=>$this->faker->word(). '-' . $this->faker->bothify('PC##'), // e.g., Lab-PC05
            'model'=>$this->faker->company.'-'.$this->faker->word(),

            'operating_system'=>$this->faker->randomElement(['win 10','win 11','win xp']),

            'processor'=>$this->faker->randomElement(['core i5','ryzen','core i7']),

            'memory'=>$this->faker->randomElement([8,16,32,64,128]),

           'available' => $this->faker->boolean(80), // 80% chance of being true



        ];
    }
}
