<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// ** Models
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exercise::create([
            'title' => 'Membros superiores',
            'description' => 'Exercício para membros superiores',
            'image' => '/images/uploads/4.png',
        ]);
    }
}
