<?php

namespace App\Policies;

use App\Models\{User, NutritionPlan};

class NutritionPlanPolicy
{
    public function view(User $user, NutritionPlan $plan): bool
    {
        return $plan->user_id === $user->id;
    }
}
