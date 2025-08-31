<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Training;
use App\Models\ProgressLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class TrainingTest extends TestCase
{
    use RefreshDatabase;

    public function test_training_belongs_to_user()
    {
        $user     = User    ::factory()->create();
        $training = Training::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $training->user);
        $this->assertEquals($user->id, $training->user->id);
    }

    public function test_scope_available_returns_only_not_done_trainings_for_user()
    {
        $user = User::factory()->create();

        $trainingAvailable = Training::factory()->create([
            'user_id' => $user->id,
            'is_done' => false,
        ]);

        $trainingDone = Training::factory()->create([
            'user_id' => $user->id,
            'is_done' => true,
        ]);

        $trainings = Training::available($user->id)->get();

        $this->assertTrue($trainings->contains($trainingAvailable));
        $this->assertFalse($trainings->contains($trainingDone));
    }

    public function test_scope_pending_returns_only_not_done_trainings()
    {
        $pending   = Training::factory()->create(['is_done' => false]);
        $done      = Training::factory()->create(['is_done' => true]);
        $trainings = Training::pending()->get();

        $this->assertTrue($trainings->contains($pending));
        $this->assertFalse($trainings->contains($done));
    }

    public function test_scope_for_user_returns_trainings_for_specific_user()
    {
        $userA     = User    ::factory()->create();
        $userB     = User    ::factory()->create();

        $trainingA = Training::factory()->create(['user_id' => $userA->id]);
        $trainingB = Training::factory()->create(['user_id' => $userB->id]);

        $trainings = Training::forUser($userA->id)->get();

        $this->assertTrue($trainings->contains($trainingA));
        $this->assertFalse($trainings->contains($trainingB));
    }

    public function test_weekly_progress_counts_logs_correctly()
    {
        $training = Training::factory()->create(['target_per_week' => 3]);

        ProgressLog::factory()->create([
            'training_id'  => $training->id,
            'status'       => 'done',
            'performed_at' => Carbon::now(),
        ]);

        ProgressLog::factory()->create([
            'training_id'  => $training->id,
            'status'       => 'done',
            'performed_at' => Carbon::now()->startOfWeek(),
        ]);

        $progress = $training->weeklyProgress();

        $this->assertEquals(2, $progress['done']);
        $this->assertEquals(1, $progress['remaining']);
        $this->assertEquals(3, $progress['target']);
        $this->assertTrue($progress['is_done_this_week']);
        $this->assertTrue($progress['is_done_this_today']);
    }
}
