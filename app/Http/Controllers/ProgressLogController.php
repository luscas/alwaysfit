<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

// ** Models
use App\Models\Training;

// ** Resources
use App\Http\Resources\TrainingProgressResource;

class ProgressLogController extends Controller
{
    public function index()
    {
        $trainings = Training::forUser(auth()->id())
            ->pending()
            ->get();

        return Inertia::render('progress-log/List', [
            'data' => TrainingProgressResource::collection($trainings)->resolve()
        ]);
    }
}
