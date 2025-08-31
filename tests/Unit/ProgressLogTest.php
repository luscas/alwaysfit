<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\{User, Training, ProgressLog};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;

class ProgressLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_scope_done_this_week_returns_only_done_logs_for_user_within_week()
    {
        $user = User::factory()->create();
        $training = Training::factory()->create(['user_id' => $user->id]);

        $logThisWeek = ProgressLog::factory()->create([
            'user_id'      => $user->id,
            'training_id'  => $training->id,
            'status'       => 'done',
            'performed_at' => Carbon::now()->startOfWeek()->addDays(2),
        ]);

        $logLastWeek = ProgressLog::factory()->create([
            'user_id'      => $user->id,
            'training_id'  => $training->id,
            'status'       => 'done',
            'performed_at' => Carbon::now()->subWeek(),
        ]);

        $logPending = ProgressLog::factory()->create([
            'user_id'      => $user->id,
            'training_id'  => $training->id,
            'status'       => 'skipped',
            'performed_at' => Carbon::now(),
        ]);

        $logs = ProgressLog::doneThisWeek($user->id)->get();

        $this->assertTrue($logs->contains($logThisWeek));
        $this->assertFalse($logs->contains($logLastWeek));
        $this->assertFalse($logs->contains($logPending));
    }

    public function test_scope_for_user_returns_only_logs_for_that_user()
    {
        $userA = User::factory()->create();
        $userB = User::factory()->create();

        $logA = ProgressLog::factory()->create(['user_id' => $userA->id]);
        $logB = ProgressLog::factory()->create(['user_id' => $userB->id]);

        $logs = ProgressLog::forUser($userA->id)->get();

        $this->assertTrue($logs->contains($logA));
        $this->assertFalse($logs->contains($logB));
    }

    public function test_scope_pending_returns_only_logs_with_status_skipped()
    {
        $logSkipped = ProgressLog::factory()->create(['status' => 'skipped']);
        $logDone    = ProgressLog::factory()->create(['status' => 'done']);

        $logs = ProgressLog::pending()->get();

        $this->assertTrue($logs->contains($logSkipped));
        $this->assertFalse($logs->contains($logDone));
    }
}
