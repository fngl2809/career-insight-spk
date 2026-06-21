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
    
    // Rute Submit Kuesioner (Cuma buat nyimpen data)
    Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');

    // 🔥 RUTE BARU: KAMAR KHUSUS HASIL REKOMENDASI (Ada Satpamnya) 🔥
    Route::get('/result', [QuizController::class, 'showResult'])->name('result.index');
});

require __DIR__.'/auth.php';