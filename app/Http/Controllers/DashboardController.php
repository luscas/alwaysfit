<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Services\TrainingMetricsService;

class DashboardController extends Controller
{
    public function index(TrainingMetricsService $service)
    {
        $metrics = $service->forUser(auth()->id());

        return Inertia::render('Dashboard', [
            'metrics' => $metrics
        ]);
    }
}
