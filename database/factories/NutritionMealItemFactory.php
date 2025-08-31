<?php

namespace Database\Factories;

use App\Models\NutritionMeal;
use App\Models\NutritionMealItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class NutritionMealItemFactory extends Factory
{
    protected $model = NutritionMealItem::class;

    public function definition(): array
    {
        return [
            'nutrition_meal_id' => NutritionMeal::factory(),
            'food'              => $this->faker->word(),
            'description'       => $this->faker->sentence(),
            'quantity'          => $this->faker->randomFloat(1, 1, 5),
            'unit'              => $this->faker->randomElement(['g', 'ml', 'cup']),
            'protein_g'         => $this->faker->numberBetween(1, 50),
            'carbs_g'           => $this->faker->numberBetween(1, 100),
            'fat_g'             => $this->faker->numberBetween(1, 30),
            'calories'          => $this->faker->numberBetween(50, 500),
        ];
    }
}
