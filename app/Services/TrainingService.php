<?php

namespace App\Services;

use App\Models\Training;
use App\Services\Contracts\TrainingServiceInterface;

class TrainingService implements TrainingServiceInterface
{
    public function forUser(int $userId): array
    {
        $startOfWeek = now()->startOfWeek();
        $endOfWeek   = now()->endOfWeek();

        $available   = Training   ::available($userId)->sum('target_per_week');
        $done        = ProgressLog::doneThisWeek($userId)->count();

        return [
            'week' => [
                'start' => $startOfWeek->toDateString(),
                'end'   => $endOfWeek->toDateString(),
            ],
            'trainings' => [
                'available' => $available,
                'done' => $done,
                'remaining' => max($available - $done, 0),
            ],
        ];
    }

    public function toggle(Training $training, int $userId): void
    {
        $log = $training->progressLogs()
                ->where('user_id', $userId)
                ->whereBetween('performed_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->first();

        if (!$log) {
            $training->progressLogs()->create([
                'user_id'      => $userId,
                'training_id'  => $training->id,
                'performed_at' => now(),
                'status'       => 'done',
            ]);

            return;
        }

        $log->update([
            'status' => $log->status === 'done' ? 'skipped' : 'done',
        ]);
    }
}
