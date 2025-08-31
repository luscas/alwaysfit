<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// ** Models
use App\Models\{User, NutritionPlan};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NutritionPlan>
 */
class NutritionPlanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'start_date' => now()->toDateString(),
            'end_date' => null,
            'calories' => fake()->numberBetween(1500, 3000),
            'protein_g' => fake()->numberBetween(150, 200),
            'carbs_g' => fake()->numberBetween(150, 250),
            'fat_g' => fake()->numberBetween(50, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
