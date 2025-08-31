<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{User, NutritionPlan};

class NutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::where('email', 'eu@lucaspaz.com')->first()->id;

        $nutritionPlan = NutritionPlan::create([
            'user_id' => $userId,
            'title' => 'Plano Cutting - 2.100 kcal',
            'description' => 'Plano focado em perda de gordura mantendo massa muscular',
            'start_date' => now()->toDateString(),
            'end_date' => null,
            'calories' => 2100,
            'protein_g' => 170,
            'carbs_g' => 200,
            'fat_g' => 70,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $meals = [
            [
                'type' => 'breakfast',
                'order' => 1,
                'title' => '🥞 Café da manhã',
                'scheduled_time' => '07:30:00',
                'calories' => 500,
                'items' => [
                    [
                        'food' => 'Omelete Proteico 🍳',
                        'description' => '3 claras e 1 gema, tomate, cebola e queijo branco',
                        'quantity' => 1,
                        'unit' => 'un',
                        'protein_g' => 21,
                        'carbs_g' => 5,
                        'fat_g' => 17,
                        'calories' => 257
                    ],
                    [
                        'food' => 'Vitamina de Banana e Aveia 🍌🥛',
                        'description' => 'Leite desnatado, 1 banana, 2 colheres de aveia',
                        'quantity' => 1,
                        'unit' => 'copo',
                        'protein_g' => 13,
                        'carbs_g' => 52,
                        'fat_g' => 3,
                        'calories' => 287
                    ]
                ],
            ],
            [
                'type' => 'breakfast_snack',
                'order' => 2,
                'title' => '🍏 Lanche da Manhã',
                'scheduled_time' => '10:00:00',
                'calories' => 500,
                'items' => [
                    [
                        'food' => 'Iogurte Natural com Granola 🥣',
                        'description' => 'Iogurte desnatado, granola e mel',
                        'quantity' => 1,
                        'unit' => 'un',
                        'protein_g' => 18,
                        'carbs_g' => 24,
                        'fat_g' => 15,
                        'calories' => 303
                    ],
                ],
            ],
        ];

        foreach ($meals as $mealItem) {
            $meal = $nutritionPlan->meals()->create([
                'type' => $mealItem['type'],
                'order' => $mealItem['order'],
                'title' => $mealItem['title'],
                'scheduled_time' => $mealItem['scheduled_time'],
                'calories' => $mealItem['calories'],
            ]);

            foreach ($mealItem['items'] as $itemData) {
                $meal->items()->create($itemData);
            }
        }
    }
}
