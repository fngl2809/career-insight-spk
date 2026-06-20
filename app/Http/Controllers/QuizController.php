<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment; // Panggil model Gudang kita
use Illuminate\Support\Facades\Auth; // Buat ngecek siapa user yang lagi login

class QuizController extends Controller
{
    // ==============================================================
    // 1. PAYUNG UTAMA: BAHAN BAKU AHP (5 BIDANG UTAMA)
    // ==============================================================
    private $ahp_weights = [
        'bidang_data'   => 0.0, 
        'bidang_game'   => 0.0, 
        'bidang_mobile' => 0.0, 
        'bidang_web'    => 0.0, 
        'bidang_ai'     => 0.0  
    ];

    // ==============================================================
    // 2. ANAK RANTING: KAMUS PROFILE MATCHING (TARGET & CF/SF)
    // ==============================================================
    
    // 🔥 Aturan Mutlak Pak Wid: 60% Core Factor, 40% Secondary Factor 🔥
    private $persentase_cf = 0.60;
    private $persentase_sf = 0.40;

    private $profile_targets = [
        
        // --- SESI 1: 3D AR (Soal q1 sampai q15) ---
        'q1'  => ['target' => 5, 'type' => 'CF'],
        'q2'  => ['target' => 4, 'type' => 'CF'],
        'q3'  => ['target' => 4, 'type' => 'SF'],
        'q4'  => ['target' => 4, 'type' => 'SF'],
        'q5'  => ['target' => 5, 'type' => 'CF'],
        'q6'  => ['target' => 4, 'type' => 'CF'],
        'q7'  => ['target' => 3, 'type' => 'SF'],
        'q8'  => ['target' => 5, 'type' => 'CF'],
        'q9'  => ['target' => 5, 'type' => 'CF'],
        'q10' => ['target' => 5, 'type' => 'CF'],
        'q11' => ['target' => 4, 'type' => 'SF'],
        'q12' => ['target' => 5, 'type' => 'CF'],
        'q13' => ['target' => 3, 'type' => 'CF'],
        'q14' => ['target' => 3, 'type' => 'CF'],
        'q15' => ['target' => 3, 'type' => 'SF'],

        // --- SESI 2: 3D VR (Soal q16 sampai q30) ---
        'q16' => ['target' => 4, 'type' => 'CF'],
        'q17' => ['target' => 4, 'type' => 'CF'],
        'q18' => ['target' => 3, 'type' => 'SF'],
        'q19' => ['target' => 4, 'type' => 'SF'],
        'q20' => ['target' => 5, 'type' => 'CF'],
        'q21' => ['target' => 4, 'type' => 'CF'],
        'q22' => ['target' => 5, 'type' => 'SF'],
        'q23' => ['target' => 5, 'type' => 'CF'],
        'q24' => ['target' => 5, 'type' => 'CF'],
        'q25' => ['target' => 5, 'type' => 'CF'],
        'q26' => ['target' => 5, 'type' => 'CF'],
        'q27' => ['target' => 4, 'type' => 'SF'],
        'q28' => ['target' => 4, 'type' => 'CF'],
        'q29' => ['target' => 4, 'type' => 'CF'],
        'q30' => ['target' => 3, 'type' => 'SF'],

        // --- SESI 3: 3D GAME (Soal q31 sampai q45) ---
        // (Tempat buat naruh data Sesi 3 nanti)
    ];


    // ==============================================================
    // 3. FUNGSI EKSEKUSI PENYIMPANAN DATA KUESIONER
    // ==============================================================
    public function store(Request $request)
    {
        // Ambil semua jawaban (q1 sampai q135) dari form, buang data keamanan '_token'
        $data_jawaban = $request->except('_token');

        // Tempelin ID user yang lagi login biar ketahuan ini jawaban punya siapa
        $data_jawaban['user_id'] = Auth::id();

        // Masukin semua 135 jawaban itu ke tabel 'assessments' di Laragon!
        Assessment::create($data_jawaban);

        // Pesan sukses sementara sebelum dihitung rumus SPK
        return "ALHAMDULILLAH YEYYY! DATA 135 JAWABANMU UDAH SUKSES TERSIMPAN PERMANEN DI DATABASE LARAGON! 🎉 BENTAR LAGI KITA HITUNG PAKAI METODE SPK!";
    }
}