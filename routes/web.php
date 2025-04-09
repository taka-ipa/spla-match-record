<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MatchResultController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [MatchResultController::class, 'home'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/matches', [MatchResultController::class, 'index'])->name('matches.index');
    Route::get('/matches/create', [MatchResultController::class, 'create'])->name('matches.create');
    Route::post('/matches', [MatchResultController::class, 'store'])->name('matches.store');
});

require __DIR__.'/auth.php';
