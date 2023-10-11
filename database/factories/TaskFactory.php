<?php

namespace Database\Factories;

use App\Enum\StatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => fake()->text(15),
            'description' => fake()->text(75),
            'status' => fake()->randomElement(StatusEnum::values()),
        ];
    }
}
