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
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_date' => now()->toDateString(),
            'end_date' => null,
            'calories' => $this->faker->numberBetween(1500, 3000),
            'protein_g' => $this->faker->numberBetween(150, 200),
            'carbs_g' => $this->faker->numberBetween(150, 250),
            'fat_g' => $this->faker->numberBetween(50, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
