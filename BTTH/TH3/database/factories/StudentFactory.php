<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\A1class;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->date('Y-m-d', '-10 years'),
            'parent_phone' => $this->faker->phoneNumber(),
            'class_id' => A1class::factory(), // Tạo liên kết tới Aclass
        ];
    }
}
