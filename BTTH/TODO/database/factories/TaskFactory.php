<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Task;
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence, // Tạo title ngẫu nhiên
            'description' => $this->faker->text, // Tạo description ngẫu nhiên
            'long_description' => $this->faker->paragraph, // Tạo long_description ngẫu nhiên
            'completed' => $this->faker->boolean, // Tạo completed ngẫu nhiên (TRUE/FALSE)
            'created_at' => now(), // Thời gian tạo
            'updated_at' => now(), // Thời gian cập nhật
        ];
    }
}
