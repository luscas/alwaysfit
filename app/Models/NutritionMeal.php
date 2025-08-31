<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionMeal extends Model
{
    protected $fillable = [
        'type',
        'order',
        'title',
        'scheduled_time',
        'calories',
        'nutrition_plan_id'
    ];

    public $with = [
        'items'
    ];

    public function items() {
        return $this->hasMany(NutritionMealItem::class);
    }
}
