<?php

use App\Http\Controllers\OrderPaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerminalController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('terminals', TerminalController::class)
    ->only(['edit', 'update'])
    ->middleware(['auth', 'verified']);

Route::resource('orders.payments', OrderPaymentController::class)
    ->only(['create', 'store']);


require __DIR__.'/auth.php';
