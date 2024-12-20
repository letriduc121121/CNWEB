<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Issue;
use App\Models\Computer; //
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_id' => Computer::factory(), // Create a related Computer record
            'reported_by' => $this->faker->name(), // Generate a random name
            'reported_date' => $this->faker->dateTimeThisYear(), // Generate a random date within this year
            'description' => $this->faker->paragraph(3), // Generate a random description
            'urgency' => $this->faker->randomElement(['Low', 'Medium', 'High']), // Random urgency level
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Resolved']), // Random status
        ];
    }
}
