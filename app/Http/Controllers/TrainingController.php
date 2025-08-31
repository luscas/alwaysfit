<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// ** Models
use App\Models\Training;

// ** Resources
use App\Http\Resources\TrainingProgressResource;

// ** Services
use App\Services\TrainingService;

// ** Services Contracts
use App\Services\Contracts\TrainingServiceInterface;

class TrainingController extends Controller
{
    public function index() {
        $trainings = Training::forUser(auth()->id())
                             ->pending()
                             ->get();

        return Inertia::render('Trainings/List', [
            'data' => TrainingProgressResource::collection($trainings)->resolve()
        ]);
    }

    public function show(Training $training)
    {
        $this->authorize('view', $training);

        if ($training->user_id !== auth()->id() || $training->is_done) {
            abort(404, 'Training not found');
        }

        return Inertia::render('Trainings/Detail', [
            'data' => new TrainingProgressResource($training),
        ]);
    }

    public function log(Training $training, TrainingServiceInterface $service)
    {
        $this->authorize('log', $training);

        $service->toggle($training, auth()->id());

        return redirect()->back();
    }
}
