<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/assessment', function () {return view('assessment');})->name('assessment.index');
});

// Ini rute untuk halaman Panduan (Warning)
Route::get('/assessment', function () {
    return view('assessment');
})->name('assessment.index');

// TAMBAHKAN INI: Rute untuk halaman Kuesioner (Soal 1-135)
Route::get('/quiz', function () {
    return view('quiz');
})->name('quiz.index');

require __DIR__.'/auth.php';
