<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// ** Models
use App\Models\{User, NutritionPlan};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NutritionPlan>
 */
class NutritionMealFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nutrition_plan_id' => NutritionPlan::factory(),
            'type'              => $this->faker->randomElement(['breakfast', 'breakfast_snack', 'lunch', 'afternoon_snack', 'dinner', 'supper']),
            'title'             => $this->faker->sentence(3),
            'order'             => $this->faker->numberBetween(1,            10),
            'calories'          => $this->faker->numberBetween(150,          300),
        ];
    }
}
