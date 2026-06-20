<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment; 
use Illuminate\Support\Facades\Auth; 

class QuizController extends Controller
{
    // ==============================================================
    // 1. PAYUNG UTAMA: BOBOT AHP (DARI PAK WID) UNTUK 5 KRITERIA
    // ==============================================================
    private $ahp_weights = [
        'bidang_3d' => [
            'kognitif'   => 0.1043,
            'hardskill'  => 0.3130,
            'softskill'  => 0.0519,
            'minat'      => 0.2749,
            'pengalaman' => 0.2558,
        ],
        'bidang_data' => [
            'kognitif'   => 0.0351,
            'hardskill'  => 0.0685,
            'softskill'  => 0.4698,
            'minat'      => 0.1523,
            'pengalaman' => 0.2744,
        ],
        'bidang_web' => [
            'kognitif'   => 0.0678,
            'hardskill'  => 0.5028,
            'softskill'  => 0.0348,
            'minat'      => 0.1344,
            'pengalaman' => 0.2602,
        ],
        'bidang_ai' => [
            'kognitif'   => 0.0748,
            'hardskill'  => 0.2397,
            'softskill'  => 0.0352,
            'minat'      => 0.1391,
            'pengalaman' => 0.5112,
        ],
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
    private $persentase_cf = 0.60;
    private $persentase_sf = 0.40;

    private $profile_targets = [
        // Sesi 1: 3D AR
        'q1'  => ['target' => 5, 'type' => 'CF'], 'q2'  => ['target' => 4, 'type' => 'CF'], 'q3'  => ['target' => 4, 'type' => 'SF'], 'q4'  => ['target' => 4, 'type' => 'SF'], 'q5'  => ['target' => 5, 'type' => 'CF'], 'q6'  => ['target' => 4, 'type' => 'CF'], 'q7'  => ['target' => 3, 'type' => 'SF'], 'q8'  => ['target' => 5, 'type' => 'CF'], 'q9'  => ['target' => 5, 'type' => 'CF'], 'q10' => ['target' => 5, 'type' => 'CF'], 'q11' => ['target' => 4, 'type' => 'SF'], 'q12' => ['target' => 5, 'type' => 'CF'], 'q13' => ['target' => 3, 'type' => 'CF'], 'q14' => ['target' => 3, 'type' => 'CF'], 'q15' => ['target' => 3, 'type' => 'SF'],
        // Sesi 2: 3D VR
        'q16' => ['target' => 4, 'type' => 'CF'], 'q17' => ['target' => 4, 'type' => 'CF'], 'q18' => ['target' => 3, 'type' => 'SF'], 'q19' => ['target' => 4, 'type' => 'SF'], 'q20' => ['target' => 5, 'type' => 'CF'], 'q21' => ['target' => 4, 'type' => 'CF'], 'q22' => ['target' => 5, 'type' => 'SF'], 'q23' => ['target' => 5, 'type' => 'CF'], 'q24' => ['target' => 5, 'type' => 'CF'], 'q25' => ['target' => 5, 'type' => 'CF'], 'q26' => ['target' => 5, 'type' => 'CF'], 'q27' => ['target' => 4, 'type' => 'SF'], 'q28' => ['target' => 4, 'type' => 'CF'], 'q29' => ['target' => 4, 'type' => 'CF'], 'q30' => ['target' => 3, 'type' => 'SF'],
        // Sesi 3: 3D GAME
        'q31' => ['target' => 5, 'type' => 'CF'], 'q32' => ['target' => 4, 'type' => 'SF'], 'q33' => ['target' => 5, 'type' => 'CF'], 'q34' => ['target' => 4, 'type' => 'SF'], 'q35' => ['target' => 5, 'type' => 'CF'], 'q36' => ['target' => 5, 'type' => 'CF'], 'q37' => ['target' => 5, 'type' => 'SF'], 'q38' => ['target' => 4, 'type' => 'CF'], 'q39' => ['target' => 3, 'type' => 'CF'], 'q40' => ['target' => 5, 'type' => 'CF'], 'q41' => ['target' => 5, 'type' => 'CF'], 'q42' => ['target' => 5, 'type' => 'SF'], 'q43' => ['target' => 5, 'type' => 'CF'], 'q44' => ['target' => 5, 'type' => 'CF'], 'q45' => ['target' => 1, 'type' => 'SF'],
        // Sesi 4: DATA ANALYST
        'q46' => ['target' => 5, 'type' => 'CF'], 'q47' => ['target' => 4, 'type' => 'SF'], 'q48' => ['target' => 5, 'type' => 'CF'], 'q49' => ['target' => 4, 'type' => 'SF'], 'q50' => ['target' => 4, 'type' => 'CF'], 'q51' => ['target' => 4, 'type' => 'CF'], 'q52' => ['target' => 5, 'type' => 'CF'], 'q53' => ['target' => 4, 'type' => 'SF'], 'q54' => ['target' => 4, 'type' => 'SF'], 'q55' => ['target' => 4, 'type' => 'SF'], 'q56' => ['target' => 4, 'type' => 'CF'], 'q57' => ['target' => 5, 'type' => 'CF'], 'q58' => ['target' => 3, 'type' => 'SF'], 'q59' => ['target' => 4, 'type' => 'CF'], 'q60' => ['target' => 3, 'type' => 'SF'],
        // Sesi 5: DATA MINING
        'q61' => ['target' => 4, 'type' => 'CF'], 'q62' => ['target' => 4, 'type' => 'CF'], 'q63' => ['target' => 4, 'type' => 'SF'], 'q64' => ['target' => 4, 'type' => 'CF'], 'q65' => ['target' => 4, 'type' => 'CF'], 'q66' => ['target' => 4, 'type' => 'SF'], 'q67' => ['target' => 4, 'type' => 'CF'], 'q68' => ['target' => 4, 'type' => 'CF'], 'q69' => ['target' => 4, 'type' => 'SF'], 'q70' => ['target' => 4, 'type' => 'SF'], 'q71' => ['target' => 4, 'type' => 'SF'], 'q72' => ['target' => 5, 'type' => 'CF'], 'q73' => ['target' => 4, 'type' => 'CF'], 'q74' => ['target' => 4, 'type' => 'SF'], 'q75' => ['target' => 4, 'type' => 'CF'],
        // Sesi 6: DATA SCIENCE
        'q76' => ['target' => 4, 'type' => 'CF'], 'q77' => ['target' => 4, 'type' => 'SF'], 'q78' => ['target' => 4, 'type' => 'CF'], 'q79' => ['target' => 4, 'type' => 'CF'], 'q80' => ['target' => 4, 'type' => 'CF'], 'q81' => ['target' => 3, 'type' => 'SF'], 'q82' => ['target' => 4, 'type' => 'CF'], 'q83' => ['target' => 4, 'type' => 'CF'], 'q84' => ['target' => 4, 'type' => 'SF'], 'q85' => ['target' => 4, 'type' => 'CF'], 'q86' => ['target' => 4, 'type' => 'SF'], 'q87' => ['target' => 4, 'type' => 'CF'], 'q88' => ['target' => 4, 'type' => 'CF'], 'q89' => ['target' => 4, 'type' => 'SF'], 'q90' => ['target' => 4, 'type' => 'CF'],
        // Sesi 7: WEB
        'q91' => ['target' => 5, 'type' => 'CF'], 'q92' => ['target' => 3, 'type' => 'SF'], 'q93' => ['target' => 5, 'type' => 'CF'], 'q94' => ['target' => 5, 'type' => 'CF'], 'q95' => ['target' => 3, 'type' => 'SF'], 'q96' => ['target' => 5, 'type' => 'CF'], 'q97' => ['target' => 4, 'type' => 'CF'], 'q98' => ['target' => 3, 'type' => 'SF'], 'q99' => ['target' => 5, 'type' => 'CF'], 'q100' => ['target' => 3, 'type' => 'CF'], 'q101' => ['target' => 5, 'type' => 'CF'], 'q102' => ['target' => 3, 'type' => 'SF'], 'q103' => ['target' => 3, 'type' => 'SF'], 'q104' => ['target' => 4, 'type' => 'CF'], 'q105' => ['target' => 4, 'type' => 'CF'],
        // Sesi 8: AI
        'q106' => ['target' => 5, 'type' => 'CF'], 'q107' => ['target' => 5, 'type' => 'SF'], 'q108' => ['target' => 5, 'type' => 'CF'], 'q109' => ['target' => 4, 'type' => 'CF'], 'q110' => ['target' => 4, 'type' => 'CF'], 'q111' => ['target' => 4, 'type' => 'SF'], 'q112' => ['target' => 4, 'type' => 'CF'], 'q113' => ['target' => 3, 'type' => 'SF'], 'q114' => ['target' => 4, 'type' => 'CF'], 'q115' => ['target' => 4, 'type' => 'CF'], 'q116' => ['target' => 3, 'type' => 'SF'], 'q117' => ['target' => 3, 'type' => 'SF'], 'q118' => ['target' => 3, 'type' => 'SF'], 'q119' => ['target' => 3, 'type' => 'SF'], 'q120' => ['target' => 5, 'type' => 'CF'],
        // Sesi 9: MOBILE
        'q121' => ['target' => 5, 'type' => 'CF'], 'q122' => ['target' => 5, 'type' => 'SF'], 'q123' => ['target' => 5, 'type' => 'CF'], 'q124' => ['target' => 4, 'type' => 'CF'], 'q125' => ['target' => 4, 'type' => 'CF'], 'q126' => ['target' => 4, 'type' => 'SF'], 'q127' => ['target' => 4, 'type' => 'CF'], 'q128' => ['target' => 4, 'type' => 'CF'], 'q129' => ['target' => 4, 'type' => 'SF'], 'q130' => ['target' => 3, 'type' => 'SF'], 'q131' => ['target' => 3, 'type' => 'SF'], 'q132' => ['target' => 4, 'type' => 'CF'], 'q133' => ['target' => 5, 'type' => 'CF'], 'q134' => ['target' => 4, 'type' => 'SF'], 'q135' => ['target' => 4, 'type' => 'SF'],
    ];

    // ==============================================================
    // 3. KAMUS KONVERSI GAP (SELISIH) KE BOBOT NILAI
    // ==============================================================
    private $gap_mapping = [
        0  => 5.0,  1  => 4.5, -1 => 4.0,  2  => 3.5, -2 => 3.0,
        3  => 2.5, -3 => 2.0,  4  => 1.5, -4 => 1.0,
    ];

    // ==============================================================
    // 4. FUNGSI INTI: EKSEKUSI PERHITUNGAN GABUNGAN (PM + AHP + TOPSIS)
    // ==============================================================
    // NAH INI DIA SARANG FUNGSI STORE YANG UDAH LENGKAP SAMA MESIN SPKNYA!
    public function store(Request $request)
    {
        // A. Ambil Data Jawaban User dari Kuesioner
        $data_jawaban = $request->except('_token');
        $data_jawaban['user_id'] = Auth::id();
        Assessment::create($data_jawaban);

        // Daftar 9 Bidang & 5 Kriteria
        $alternatif = ['3d_ar', '3d_vr', '3d_game', 'data_analyst', 'data_mining', 'data_science', 'web', 'ai', 'mobile'];
        $kriteria = ['kognitif', 'hardskill', 'softskill', 'minat', 'pengalaman'];

        // Pemetaan Awal Soal per Sesi
        $sesi_soal = [
            '3d_ar' => 1, '3d_vr' => 16, '3d_game' => 31, 'data_analyst' => 46, 'data_mining' => 61,
            'data_science' => 76, 'web' => 91, 'ai' => 106, 'mobile' => 121
        ];

        // ----------------------------------------------------------
        // METODE 1: PROFILE MATCHING (Cari Nilai Matriks Awal X)
        // ----------------------------------------------------------
        $matriks_x = [];
        foreach ($sesi_soal as $nama_sesi => $start_soal) {
            foreach ($kriteria as $idx_kriteria => $nama_kriteria) {
                $total_cf = 0; $count_cf = 0; $total_sf = 0; $count_sf = 0;
                // Ambil 3 soal berurutan untuk setiap kriteria
                for ($offset = 0; $offset < 3; $offset++) {
                    $q_id = 'q' . ($start_soal + ($idx_kriteria * 3) + $offset);
                    if (isset($data_jawaban[$q_id])) {
                        $gap = $data_jawaban[$q_id] - $this->profile_targets[$q_id]['target'];
                        $bobot = $this->gap_mapping[$gap] ?? 0;
                        if ($this->profile_targets[$q_id]['type'] == 'CF') {
                            $total_cf += $bobot; $count_cf++;
                        } else {
                            $total_sf += $bobot; $count_sf++;
                        }
                    }
                }
                $ncf = ($count_cf > 0) ? ($total_cf / $count_cf) : 0;
                $nsf = ($count_sf > 0) ? ($total_sf / $count_sf) : 0;
                // Rumus 60% + 40%
                $matriks_x[$nama_sesi][$nama_kriteria] = ($this->persentase_cf * $ncf) + ($this->persentase_sf * $nsf);
            }
        }

        // ----------------------------------------------------------
        // METODE 2: TOPSIS NORMALISASI (Matriks R)
        // ----------------------------------------------------------
        $matriks_r = [];
        $pembagi = [];
        foreach ($kriteria as $nama_kriteria) {
            $jumlah_kuadrat = 0;
            foreach ($alternatif as $alt) {
                $jumlah_kuadrat += pow($matriks_x[$alt][$nama_kriteria], 2);
            }
            $pembagi[$nama_kriteria] = sqrt($jumlah_kuadrat);
        }

        foreach ($alternatif as $alt) {
            foreach ($kriteria as $nama_kriteria) {
                $pembagi_nilai = $pembagi[$nama_kriteria] > 0 ? $pembagi[$nama_kriteria] : 1;
                $matriks_r[$alt][$nama_kriteria] = $matriks_x[$alt][$nama_kriteria] / $pembagi_nilai;
            }
        }

        // ----------------------------------------------------------
        // METODE 3: TOPSIS x AHP (Matriks Y)
        // ----------------------------------------------------------
        $matriks_y = [];
        $mapping_bobot_ahp = [
            '3d_ar' => 'bidang_3d', '3d_vr' => 'bidang_3d', '3d_game' => 'bidang_3d',
            'data_analyst' => 'bidang_data', 'data_mining' => 'bidang_data', 'data_science' => 'bidang_data',
            'web' => 'bidang_web', 'ai' => 'bidang_ai', 'mobile' => 'bidang_mobile',
        ];

        foreach ($alternatif as $alt) {
            $key_ahp = $mapping_bobot_ahp[$alt];
            foreach ($kriteria as $nama_kriteria) {
                $bobot_ahp = $this->ahp_weights[$key_ahp][$nama_kriteria];
                $matriks_y[$alt][$nama_kriteria] = $matriks_r[$alt][$nama_kriteria] * $bobot_ahp;
            }
        }

        // ----------------------------------------------------------
        // TAHAP AKHIR TOPSIS: SOLUSI IDEAL & PREFERENSI (V)
        // ----------------------------------------------------------
        $solusi_positif = []; $solusi_negatif = [];
        foreach ($kriteria as $nama_kriteria) {
            $kumpulan_nilai_y = [];
            foreach ($alternatif as $alt) {
                $kumpulan_nilai_y[] = $matriks_y[$alt][$nama_kriteria];
            }
            $solusi_positif[$nama_kriteria] = max($kumpulan_nilai_y);
            $solusi_negatif[$nama_kriteria] = min($kumpulan_nilai_y);
        }

        $jarak_positif = []; $jarak_negatif = [];
        $hasil_preferensi = [];
        foreach ($alternatif as $alt) {
            $jumlah_d_plus = 0; $jumlah_d_minus = 0;
            foreach ($kriteria as $nama_kriteria) {
                $jumlah_d_plus  += pow($matriks_y[$alt][$nama_kriteria] - $solusi_positif[$nama_kriteria], 2);
                $jumlah_d_minus += pow($matriks_y[$alt][$nama_kriteria] - $solusi_negatif[$nama_kriteria], 2);
            }
            $jarak_positif[$alt] = sqrt($jumlah_d_plus);
            $jarak_negatif[$alt] = sqrt($jumlah_d_minus);

            $total_jarak = $jarak_positif[$alt] + $jarak_negatif[$alt];
            $hasil_preferensi[$alt] = $total_jarak > 0 ? ($jarak_negatif[$alt] / $total_jarak) : 0;
        }

        // Urutkan nilai V tertinggi (Ranking 1) ke terendah
        arsort($hasil_preferensi);

        // Selesai ngitung! Lempar data rankingnya ke halaman hasil (result.blade.php)
        return view('quiz.result', [
            'ranking' => $hasil_preferensi,
            'matriks_awal' => $matriks_x
        ]);
    }
}