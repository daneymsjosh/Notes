<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteFavoriteController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('notes', NoteController::class)->middleware(['auth']);

Route::resource('categories', CategoryController::class)->middleware(['auth']);


Route::get('favorites', NoteFavoriteController::class)->middleware('auth')->name('favorites');

Route::post('notes/{note}/favorite', [NoteFavoriteController::class, 'favorite'])->middleware('auth')->name('notes.favorite');

Route::post('notes/{note}/unfavorite', [NoteFavoriteController::class, 'unfavorite'])->middleware('auth')->name('notes.unfavorite');
