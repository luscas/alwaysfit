<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExerciseTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_be_created_with_factory()
    {
        $exercise = Exercise::factory()->create();

        $this->assertDatabaseHas('exercises', [
            'id' => $exercise->id,
        ]);
    }

    public function test_allows_mass_assignment_of_fillable_fields()
    {
        $data = [
            'title'       => 'Push Up',
            'image'       => 'pushup.png',
            'description' => 'A basic push up exercise',
        ];

        $exercise = Exercise::create($data);

        $this->assertEquals('Push Up', $exercise->title);
        $this->assertEquals('pushup.png', $exercise->image);
        $this->assertEquals('A basic push up exercise', $exercise->description);
    }
}
