<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NutritionMealItem extends Model
{
    use HasFactory;

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

    protected $with = ['meal'];

    public function meal()
    {
        return $this->belongsTo(NutritionMeal::class);
    }
}
