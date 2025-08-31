<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_id',
        'status',
        'performed_at',
    ];

    public function scopeDoneThisWeek($query, $userId)
    {
        return $query->where('user_id', $userId)
            ->where('status', 'done')
            ->whereBetween('performed_at', [now()->startOfWeek(), now()->endOfWeek()]);
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
