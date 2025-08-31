<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'status',
        'is_done',
        'user_id',
    ];

    public $with = [
        'user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function weeklyProgress()
    {
        $startOfWeek     = now()->startOfWeek(\Carbon\Carbon::MONDAY);
        $endOfWeek       = now()->endOfWeek(\Carbon\Carbon::SUNDAY);

        $logsQuery       = $this->progressLogs()
                                ->where('status', 'done')
                                ->whereBetween('performed_at', [
                                    $startOfWeek,
                                    $endOfWeek
                                ]);

        $done            = $logsQuery->count();
        $target          = $this->target_per_week;
        $remaining       = max($target - $done, 0);

        $isDoneThisWeek  = $done > 0;
        $isDoneThisToday = $logsQuery->whereDate('performed_at', now())->exists();

        return [
            'done'               => $done,
            'remaining'          => $remaining,
            'target'             => $target,
            'is_done_this_week'  => $isDoneThisWeek,
            'is_done_this_today' => $isDoneThisToday,
        ];
    }

    public function progressLogs()
    {
        return $this->hasMany(ProgressLog::class);
    }

    public function scopeAvailable($query, $userId)
    {
        return $query->where('user_id', $userId)
            ->where('is_done', false);
    }

    public function scopeForUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopePending($query)
    {
        return $query->where('is_done', false);
    }
}
