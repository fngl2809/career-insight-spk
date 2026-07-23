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
    $hasAssessment = \Illuminate\Support\Facades\DB::table('assessments')->where('user_id', $userId)->exists();
    
    $data = ['hasAssessment' => $hasAssessment];

    if ($hasAssessment) {
        $data['totalAsesmen'] = \Illuminate\Support\Facades\DB::table('assessments')->where('user_id', $userId)->count();
        $latest = \Illuminate\Support\Facades\DB::table('assessments')->where('user_id', $userId)->orderBy('created_at', 'desc')->first();

        $data['tanggalTerakhir'] = \Carbon\Carbon::parse($latest->created_at)->translatedFormat('d F Y');
        $data['rekomendasiUtama'] = $latest->hasil_rekomendasi ?? 'Belum ada'; 

        // Bongkar rahasia JSON dari database
        $detailSkor = json_decode($latest->detail_skor, true);

        // Jika data JSON ada (dari tes terbarumu)
        if ($detailSkor) {
            $rankingLengkap = $detailSkor['ranking_lengkap'] ?? [];
            $skorKriteria = $detailSkor['skor_kriteria'] ?? [];

            // 1. Siapkan data untuk 9 jalur
            $formattedRanking = [];
            $labels = [
                '3d_ar' => '3D / AR', '3d_vr' => '3D / VR', '3d_game' => '3D Game Dev',
                'data_analyst' => 'Data Analyst', 'data_mining' => 'Data Mining', 'data_science' => 'Data Science',
                'web' => 'Web Dev', 'ai' => 'AI', 'mobile' => 'Mobile Dev'
            ];
            foreach($rankingLengkap as $key => $score) {
                $formattedRanking[] = [
                    'nama' => $labels[$key] ?? ucwords(str_replace('_', ' ', $key)),
                    'skor' => $score
                ];
            }
            $data['top3'] = array_slice($formattedRanking, 0, 3);
            $data['semuaJalur'] = $formattedRanking;

            // 2. Ubah skor kriteria ke skala 100% (asumsi maksimal bobot Profile Matching adalah 5)
            $data['skorKognitif'] = round((($skorKriteria['kognitif'] ?? 0) / 5) * 100);
            $data['skorHardskill'] = round((($skorKriteria['hardskill'] ?? 0) / 5) * 100);
            $data['skorSoftskill'] = round((($skorKriteria['softskill'] ?? 0) / 5) * 100);
            $data['skorMinat'] = round((($skorKriteria['minat'] ?? 0) / 5) * 100);
            $data['skorPengalaman'] = round((($skorKriteria['pengalaman'] ?? 0) / 5) * 100);

            // 3. Hitung kompetensi yang terpenuhi (Skor di atas 80%)
            $terpenuhi = 0; $namaTerpenuhi = [];
            if($data['skorKognitif'] >= 80) { $terpenuhi++; $namaTerpenuhi[] = 'Kognitif'; }
            if($data['skorHardskill'] >= 80) { $terpenuhi++; $namaTerpenuhi[] = 'Hardskill'; }
            if($data['skorSoftskill'] >= 80) { $terpenuhi++; $namaTerpenuhi[] = 'Softskill'; }
            if($data['skorMinat'] >= 80) { $terpenuhi++; $namaTerpenuhi[] = 'Minat'; }
            if($data['skorPengalaman'] >= 80) { $terpenuhi++; $namaTerpenuhi[] = 'Pengalaman'; }
            
            $data['jumlahTerpenuhi'] = $terpenuhi;
            $data['teksTerpenuhi'] = count($namaTerpenuhi) > 0 ? implode(', ', array_slice($namaTerpenuhi, 0, 2)) : 'Perlu diasah';

        } else {
            // Fallback kalau JSON kosong (data lama)
            $data['top3'] = []; $data['semuaJalur'] = [];
            $data['skorKognitif'] = 0; $data['skorHardskill'] = 0; $data['skorSoftskill'] = 0; $data['skorMinat'] = 0; $data['skorPengalaman'] = 0;
            $data['jumlahTerpenuhi'] = 0; $data['teksTerpenuhi'] = '-';
        }
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