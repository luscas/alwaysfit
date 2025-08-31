<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionMealItem extends Model
{
    protected $fillable = [
        'nutrition_meal_id',
        'food',
        'description',
        'quantity',
        'unit',
        'protein_g',
        'carbs_g',
        'fat_g',
        'calories',
    ];

    public $with = [
        'meal'
    ];

    public function meal() {
        return $this->belongsTo(NutritionMeal::class);
    }
}
