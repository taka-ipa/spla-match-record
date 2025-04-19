<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MatchResultController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



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
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
    
    Route::get('/matches', [MatchResultController::class, 'index'])->name('matches.index');
    Route::get('/matches/create', [MatchResultController::class, 'create'])->name('matches.create');
    Route::post('/matches', [MatchResultController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}', [MatchResultController::class, 'show'])->name('matches.show');
    Route::delete('/matches/{match}', [MatchResultController::class, 'destroy'])->name('matches.destroy');
    Route::post('/matches/{matchResult}/comments', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';
