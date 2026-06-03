<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// ─── Single Landing Page Route ──────────────────────────────────
Route::get('/', [HomeController::class, 'show'])->name('home');

// ─── Global Product Search (AJAX) ───────────────────────────────
Route::get('/search', [SearchController::class, 'search'])->name('search');

// ─── Language Switcher ──────────────────────────────────────────
Route::get('/language/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'es'], true)) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('language.switch');
