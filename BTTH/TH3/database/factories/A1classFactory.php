<?php

namespace Database\Factories;

use App\Models\A1class;
use Illuminate\Database\Eloquent\Factories\Factory;

class A1classFactory extends Factory
{
    protected $model = A1class::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'grade_level' => $this->faker->randomElement(['Pre-K', 'Kindergarten']),
            'room_number' => 'VH' . $this->faker->numberBetween(1, 20),
        ];
    }
}
