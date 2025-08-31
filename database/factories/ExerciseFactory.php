<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// ** Models
use App\Models\Exercise;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'image' => fake()->imageUrl(300, 200, 'sports'),
            'description' => fake()->paragraph(),
        ];
    }
}
