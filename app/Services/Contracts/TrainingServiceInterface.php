<?php

namespace App\Services\Contracts;

use App\Models\Training;

interface TrainingServiceInterface
{
    public function forUser(int $userId): array;
    public function toggle(Training $training, int $userId): void;
}
