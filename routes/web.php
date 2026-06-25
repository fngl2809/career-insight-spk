<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

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
    
    // Rute Panduan & Kuesioner
    Route::get('/assessment', function () { return view('assessment'); })->name('assessment.index');
    Route::get('/quiz', function () { return view('quiz'); })->name('quiz.index');
    
    // Rute Submit Kuesioner
    Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');

    // Rute Hasil Rekomendasi Terakhir
    Route::get('/result', [QuizController::class, 'showResult'])->name('result.index');

    // 🔥 INI RUTE RIWAYAT & DETAIL HASIL YANG HARUS ADA 🔥
    Route::get('/history', [QuizController::class, 'history'])->name('assessment.history');
    
    // Rute ini menangkap ID riwayat agar hasil yang muncul TIDAK SALAH
    Route::get('/result/{id}', [QuizController::class, 'showSpecificResult'])->name('result.show');
});

require __DIR__.'/auth.php';