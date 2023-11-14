<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TaskStatus;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
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
            'name' => fake()->unique()->sentence(),
            'description' => fake()->text(100),
            'status_id' => TaskStatus::factory()->create()->id,
            'created_by_id' => User::pluck('id')->random(),
            'assigned_to_id' => User::pluck('id')->random(),
        ];
    }
}
