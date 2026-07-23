<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

// 1. HALAMAN LANDING PAGE (Publik - Bisa diakses tanpa login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. HALAMAN BERANDA SISTEM (Private - Harus login)
Route::get('/dashboard', function () {
    $userId = \Illuminate\Support\Facades\Auth::id();

    // Cek apakah user punya data di tabel assessments
    $hasAssessment = \Illuminate\Support\Facades\DB::table('assessments')
                        ->where('user_id', $userId)
                        ->exists();

    $data = [
        'hasAssessment' => $hasAssessment,
    ];

    if ($hasAssessment) {
        // 1. Hitung total asesmen (Biar tampil 15x, 2x, dll sesuai riwayat)
        $data['totalAsesmen'] = \Illuminate\Support\Facades\DB::table('assessments')
                                    ->where('user_id', $userId)
                                    ->count();

        // 2. Ambil data yang paling baru (terakhir diisi)
        $latest = \Illuminate\Support\Facades\DB::table('assessments')
                        ->where('user_id', $userId)
                        ->orderBy('created_at', 'desc')
                        ->first();

        // 3. Format tanggal dan ambil hasil rekomendasinya
        $data['tanggalTerakhir'] = \Carbon\Carbon::parse($latest->created_at)->translatedFormat('d F Y');
        $data['rekomendasiUtama'] = $latest->hasil_rekomendasi ?? 'Belum ada'; 
    }

    return view('dashboard', $data);
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