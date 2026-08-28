<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
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

// ─── Admin Auth ─────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout',[AuthController::class, 'logout'])->name('logout');

    // ─── Panel protegido ────────────────────────────────────────
    Route::middleware('is_admin')->group(function () {
        Route::get('/', fn() => redirect()->route('admin.products.index'))->name('dashboard');
        Route::get('guide', fn() => view('admin.guide'))->name('guide');
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products', [ProductController::class, 'store'])->name('products.store');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::delete('images/{image}', [ProductController::class, 'destroyImage'])->name('images.destroy');
    });
});
