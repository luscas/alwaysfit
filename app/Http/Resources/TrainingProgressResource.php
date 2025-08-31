<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingProgressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'image'           => $this->image,
            'title'           => $this->title,
            'description'     => $this->description,
            'level'           => $this->level,
            'target_per_week' => $this->target_per_week,
            'weekly_progress' => $this->weeklyProgress(),
            'progressLogs'    => $this->progressLogs()->get(),
        ];
    }
}
