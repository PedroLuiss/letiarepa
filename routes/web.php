<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ─── Single Landing Page Route ──────────────────────────────────
Route::get('/', [HomeController::class, 'show'])->name('home');
