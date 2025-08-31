<?php

namespace App\Policies;

use App\Models\{User, Training};

class TrainingPolicy
{
    public function view(User $user, Training $training): bool
    {
        return $training->user_id === $user->id;
    }

    public function log(User $user, Training $training): bool
    {
        return $training->user_id === $user->id;
    }
}
