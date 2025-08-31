<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NutritionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'calories',
        'protein_g',
        'carbs_g',
        'fat_g',
        'user_id',
    ];

    protected $hidden = [
        'user_id'
    ];

    public $with = [
        'user',
        'meals'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function meals() {
        return $this->hasMany(NutritionMeal::class)->orderBy('order', 'asc');
    }
}
