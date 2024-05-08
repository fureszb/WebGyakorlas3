<?php

use App\Http\Controllers\IngatlanokController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SzakdogaController;
use App\Models\szakdoga;
use Illuminate\Support\Facades\Route;



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
});

Route::get('/ajanlataink', [IngatlanokController::class, 'index'])->name('ingatlanok.index');
Route::post('/ajanlataink', [IngatlanokController::class, 'store'])->name('ingatlanok.store');
Route::get('ajanlataink/{id}', [IngatlanokController::class, 'show'])->name('ingatlanok.show');

require __DIR__ . '/auth.php';
