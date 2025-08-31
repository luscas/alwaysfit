<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// ** Models
use App\Models\{User, Exercise, Training};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'           => $this->faker->sentence(3),
            'image'           => $this->faker->imageUrl(300, 200, 'sports'),
            'level'           => 'beginner',
            'is_done'         => false,
            'target_per_week' => $this->faker->numberBetween(1, 7),
            'exercise_id'     => Exercise::factory(),
            'user_id'         => User    ::factory(),
        ];
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_done' => true,
            'status' => 'completed',
        ]);
    }
}
