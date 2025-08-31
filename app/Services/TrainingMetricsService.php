<?php

namespace App\Services;

use App\Models\{Training, ProgressLog};

class TrainingMetricsService
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
}
