<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\NutritionPlan;

class NutritionPlanController extends Controller
{
    public function index()
    {
        $data = auth()->user()->nutritionPlans()->get();

        return Inertia::render('nutrition-plans/List', [
            'data' => $data
        ]);
    }

    public function show(NutritionPlan $nutritionPlan)
    {
        $this->authorize('view', $nutritionPlan);

        return Inertia::render('nutrition-plans/Detail', [
            'data' => $nutritionPlan
        ]);
    }
}
