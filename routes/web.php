<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Welcome');
})->name('dashboard');

require __DIR__.'/auth.php';
