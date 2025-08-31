<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\NutritionPlan;
use App\Models\NutritionMeal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NutritionPlanTest extends TestCase
{
    use RefreshDatabase;

    public function test_nutrition_plan_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $plan = NutritionPlan::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $plan->user);
        $this->assertEquals($user->id, $plan->user->id);
    }

    public function test_nutrition_plan_has_many_meals_ordered_by_order_column()
    {
        $plan = NutritionPlan::factory()->create();

        $mealB = NutritionMeal::factory()->create([
            'nutrition_plan_id' => $plan->id,
            'order' => 2,
        ]);

        $mealA = NutritionMeal::factory()->create([
            'nutrition_plan_id' => $plan->id,
            'order' => 1,
        ]);

        $meals = $plan->meals;

        $this->assertEquals(2, $meals->count());
        $this->assertEquals($mealA->id, $meals->first()->id);
        $this->assertEquals($mealB->id, $meals->last()->id);
    }
}
