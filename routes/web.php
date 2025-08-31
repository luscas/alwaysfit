<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\{DashboardController, TrainingController};

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => '/trainings'], function () {
        Route::get('/', [TrainingController::class, 'index'])->name('trainings');
        Route::get('/{training}', [TrainingController::class, 'show'])->name('trainings.detail');
        Route::post('/{training}/log', [TrainingController::class, 'log'])->name('trainings.log');
    });
});


require __DIR__.'/auth.php';
