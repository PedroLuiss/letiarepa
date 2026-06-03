<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ─── Single Landing Page Route ──────────────────────────────────
Route::get('/', [HomeController::class, 'show'])->name('home');

// ─── Language Switcher ──────────────────────────────────────────
Route::get('/language/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'es'], true)) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('language.switch');
