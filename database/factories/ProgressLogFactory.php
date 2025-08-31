<?php

namespace Database\Factories;

use App\Models\ProgressLog;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgressLog>
 */
class ProgressLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'training_id' => Training::factory(),
            'performed_at' => fake()->dateTimeBetween('-1 week', 'now'),
            'status' => 'done',
        ];
    }

    public function thisWeek(): static
    {
        return $this->state(fn (array $attributes) => [
            'performed_at' => fake()->dateTimeBetween(now()->startOfWeek(), now()),
        ]);
    }
}
