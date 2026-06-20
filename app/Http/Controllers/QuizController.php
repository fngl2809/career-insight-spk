<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment; // Panggil model Gudang kita
use Illuminate\Support\Facades\Auth; // Buat ngecek siapa user yang lagi login

class QuizController extends Controller
{
    // ==============================================================
    // 1. PAYUNG UTAMA: BOBOT AHP (DARI PAK WID) UNTUK 5 KRITERIA
    // ==============================================================
    // Catatan: K = Kognitif, H = Hardskill, S = Softskill, M = Minat, P = Pengalaman
    private $ahp_weights = [
        
        // 1. Kelompok 3D (Dipakai buat ngaliin nilai Profile Matching Sesi AR, VR, Game)
        'bidang_3d' => [
            'kognitif'   => 0.1043,
            'hardskill'  => 0.3130,
            'softskill'  => 0.0519,
            'minat'      => 0.2749,
            'pengalaman' => 0.2558,
        ],

        // 2. Kelompok DATA (Dipakai buat Sesi Data Analyst, Data Mining, Data Science)
        'bidang_data' => [
            'kognitif'   => 0.0351,
            'hardskill'  => 0.0685,
            'softskill'  => 0.4698,
            'minat'      => 0.1523,
            'pengalaman' => 0.2744,
        ],

        // 3. Kelompok WEB (Dipakai buat Sesi Web)
        'bidang_web' => [
            'kognitif'   => 0.0678,
            'hardskill'  => 0.5028,
            'softskill'  => 0.0348,
            'minat'      => 0.1344,
            'pengalaman' => 0.2602,
        ],

        // 4. Kelompok AI (Dipakai buat Sesi AI)
        'bidang_ai' => [
            'kognitif'   => 0.0748,
            'hardskill'  => 0.2397,
            'softskill'  => 0.0352,
            'minat'      => 0.1391,
            'pengalaman' => 0.5112,
        ],

        // 5. Kelompok MOBILE (Dipakai buat Sesi Mobile)
        'bidang_mobile' => [
            'kognitif'   => 0.0870,
            'hardskill'  => 0.5406,
            'softskill'  => 0.0355,
            'minat'      => 0.1030,
            'pengalaman' => 0.2339,
        ],
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
        'q31' => ['target' => 5, 'type' => 'CF'],
        'q32' => ['target' => 4, 'type' => 'SF'],
        'q33' => ['target' => 5, 'type' => 'CF'],
        'q34' => ['target' => 4, 'type' => 'SF'],
        'q35' => ['target' => 5, 'type' => 'CF'],
        'q36' => ['target' => 5, 'type' => 'CF'],
        'q37' => ['target' => 5, 'type' => 'SF'],
        'q38' => ['target' => 4, 'type' => 'CF'],
        'q39' => ['target' => 3, 'type' => 'CF'],
        'q40' => ['target' => 5, 'type' => 'CF'],
        'q41' => ['target' => 5, 'type' => 'CF'],
        'q42' => ['target' => 5, 'type' => 'SF'],
        'q43' => ['target' => 5, 'type' => 'CF'],
        'q44' => ['target' => 5, 'type' => 'CF'],
        'q45' => ['target' => 1, 'type' => 'SF'],

        // --- SESI 4: DATA ANALYST (Soal q46 sampai q60) ---
        'q46' => ['target' => 5, 'type' => 'CF'],
        'q47' => ['target' => 4, 'type' => 'SF'],
        'q48' => ['target' => 5, 'type' => 'CF'],
        'q49' => ['target' => 4, 'type' => 'SF'],
        'q50' => ['target' => 4, 'type' => 'CF'],
        'q51' => ['target' => 4, 'type' => 'CF'],
        'q52' => ['target' => 5, 'type' => 'CF'],
        'q53' => ['target' => 4, 'type' => 'SF'],
        'q54' => ['target' => 4, 'type' => 'SF'],
        'q55' => ['target' => 4, 'type' => 'SF'],
        'q56' => ['target' => 4, 'type' => 'CF'],
        'q57' => ['target' => 5, 'type' => 'CF'],
        'q58' => ['target' => 3, 'type' => 'SF'],
        'q59' => ['target' => 4, 'type' => 'CF'],
        'q60' => ['target' => 3, 'type' => 'SF'],

        // --- SESI 5: DATA MINING (Soal q61 sampai q75) ---
        'q61' => ['target' => 4, 'type' => 'CF'],
        'q62' => ['target' => 4, 'type' => 'CF'],
        'q63' => ['target' => 4, 'type' => 'SF'],
        'q64' => ['target' => 4, 'type' => 'CF'],
        'q65' => ['target' => 4, 'type' => 'CF'],
        'q66' => ['target' => 4, 'type' => 'SF'],
        'q67' => ['target' => 4, 'type' => 'CF'],
        'q68' => ['target' => 4, 'type' => 'CF'],
        'q69' => ['target' => 4, 'type' => 'SF'],
        'q70' => ['target' => 4, 'type' => 'SF'],
        'q71' => ['target' => 4, 'type' => 'SF'],
        'q72' => ['target' => 5, 'type' => 'CF'],
        'q73' => ['target' => 4, 'type' => 'CF'],
        'q74' => ['target' => 4, 'type' => 'SF'],
        'q75' => ['target' => 4, 'type' => 'CF'],

        // --- SESI 6: DATA SCIENCE (Soal q76 sampai q90) ---
        'q76' => ['target' => 4, 'type' => 'CF'],
        'q77' => ['target' => 4, 'type' => 'SF'],
        'q78' => ['target' => 4, 'type' => 'CF'],
        'q79' => ['target' => 4, 'type' => 'CF'],
        'q80' => ['target' => 4, 'type' => 'CF'],
        'q81' => ['target' => 3, 'type' => 'SF'],
        'q82' => ['target' => 4, 'type' => 'CF'],
        'q83' => ['target' => 4, 'type' => 'CF'],
        'q84' => ['target' => 4, 'type' => 'SF'],
        'q85' => ['target' => 4, 'type' => 'CF'],
        'q86' => ['target' => 4, 'type' => 'SF'],
        'q87' => ['target' => 4, 'type' => 'CF'],
        'q88' => ['target' => 4, 'type' => 'CF'],
        'q89' => ['target' => 4, 'type' => 'SF'],
        'q90' => ['target' => 4, 'type' => 'CF'],

       // --- SESI 7: WEB (Soal q91 sampai q105) ---
        'q91'  => ['target' => 5, 'type' => 'CF'],
        'q92'  => ['target' => 3, 'type' => 'SF'],
        'q93'  => ['target' => 5, 'type' => 'CF'],
        'q94'  => ['target' => 5, 'type' => 'CF'],
        'q95'  => ['target' => 3, 'type' => 'SF'],
        'q96'  => ['target' => 5, 'type' => 'CF'],
        'q97'  => ['target' => 4, 'type' => 'CF'],
        'q98'  => ['target' => 3, 'type' => 'SF'],
        'q99'  => ['target' => 5, 'type' => 'CF'],
        'q100' => ['target' => 3, 'type' => 'CF'],
        'q101' => ['target' => 5, 'type' => 'CF'],
        'q102' => ['target' => 3, 'type' => 'SF'],
        'q103' => ['target' => 3, 'type' => 'SF'],
        'q104' => ['target' => 4, 'type' => 'CF'],
        'q105' => ['target' => 4, 'type' => 'CF'],

        // --- SESI 8: AI (Soal q106 sampai q120) ---
        'q106' => ['target' => 5, 'type' => 'CF'],
        'q107' => ['target' => 5, 'type' => 'SF'],
        'q108' => ['target' => 5, 'type' => 'CF'],
        'q109' => ['target' => 4, 'type' => 'CF'],
        'q110' => ['target' => 4, 'type' => 'CF'],
        'q111' => ['target' => 4, 'type' => 'SF'],
        'q112' => ['target' => 4, 'type' => 'CF'],
        'q113' => ['target' => 3, 'type' => 'SF'],
        'q114' => ['target' => 4, 'type' => 'CF'],
        'q115' => ['target' => 4, 'type' => 'CF'],
        'q116' => ['target' => 3, 'type' => 'SF'],
        'q117' => ['target' => 3, 'type' => 'SF'],
        'q118' => ['target' => 3, 'type' => 'SF'],
        'q119' => ['target' => 3, 'type' => 'SF'],
        'q120' => ['target' => 5, 'type' => 'CF'],

        // --- SESI 9: MOBILE (Soal q121 sampai q135) ---
        'q121' => ['target' => 5, 'type' => 'CF'],
        'q122' => ['target' => 5, 'type' => 'SF'],
        'q123' => ['target' => 5, 'type' => 'CF'],
        'q124' => ['target' => 4, 'type' => 'CF'],
        'q125' => ['target' => 4, 'type' => 'CF'],
        'q126' => ['target' => 4, 'type' => 'SF'],
        'q127' => ['target' => 4, 'type' => 'CF'],
        'q128' => ['target' => 4, 'type' => 'CF'],
        'q129' => ['target' => 4, 'type' => 'SF'],
        'q130' => ['target' => 3, 'type' => 'SF'],
        'q131' => ['target' => 3, 'type' => 'SF'],
        'q132' => ['target' => 4, 'type' => 'CF'],
        'q133' => ['target' => 5, 'type' => 'CF'],
        'q134' => ['target' => 4, 'type' => 'SF'],
        'q135' => ['target' => 4, 'type' => 'SF'],
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