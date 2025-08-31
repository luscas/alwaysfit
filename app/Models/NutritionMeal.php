<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NutritionMeal extends Model
{
    use HasFactory;

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
