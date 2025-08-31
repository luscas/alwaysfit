<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{User, Exercise, Training};

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::where('email', 'eu@lucaspaz.com')->first()->id;
        $exerciseId = Exercise::where('title', 'Membros superiores')->first()->id;

        Training::insert([
            [
                'user_id' => $userId,
                'exercise_id' => $exerciseId,
                'title' => 'Supino Reto',
                'description' => 'Foco em supino, remada',
                'level' => 'intermediate',
                'target_per_week' => 4,
                'image' => '/images/uploads/4.png',
                'is_done' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'exercise_id' => $exerciseId,
                'title' => 'Supino Inclinado',
                'description' => 'Foco em supino inclinado',
                'level' => 'intermediate',
                'target_per_week' => 8,
                'image' => '/images/uploads/4.png',
                'is_done' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
