<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi Karier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary: #1F618D;
            --secondary: #2980B9;
            --success: #27AE60;
            --success-light: #E9F7EF;
            --warning: #F39C12;
            --warning-light: #FEF9E7;
            --danger: #E74C3C;
            --danger-light: #FDEDEC;
            --info: #5DADE2;
            --info-light: #EBF5FB;
            --text-dark: #2C3E50;
            --text-gray: #7F8C8D;
            --bg-body: #F4F6F7;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-dark);
            line-height: 1.6;
            margin: 0;
            padding: 30px 15px;
        }

        .container { max-width: 900px; margin: 0 auto; }

        /* Card Master */
        .card {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            margin-bottom: 25px;
            border: 1px solid #EAEDED;
        }

        /* 1. HEADER (HERO) - Sesuai Gambar 1 */
        .hero-card {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            border-radius: 16px;
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(41, 128, 185, 0.3);
            margin-bottom: 25px;
        }
        .hero-badge { background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px; font-size: 12px; display: inline-block; margin-bottom: 15px;}
        .hero-title { font-size: 36px; font-weight: 700; margin: 0 0 10px 0; display: flex; align-items: center; gap: 15px; }
        .hero-subtitle { font-size: 14px; opacity: 0.9; margin-bottom: 25px; }
        
        .circle-score {
            position: absolute; right: 40px; top: 50%; transform: translateY(-50%);
            width: 120px; height: 120px;
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            backdrop-filter: blur(5px);
        }
        .circle-score h2 { font-size: 38px; margin: 0; line-height: 1; }
        .circle-score span { font-size: 12px; opacity: 0.9; }

        /* Progress Bar Hero */
        .hero-progress-bg { background: rgba(255,255,255,0.2); height: 12px; border-radius: 10px; width: 60%; position: relative; margin-top: 10px;}
        .hero-progress-fill { background: #F1C40F; height: 100%; border-radius: 10px; box-shadow: 0 0 10px rgba(241, 196, 15, 0.5); }
        .hero-progress-labels { display: flex; width: 60%; justify-content: space-between; font-size: 11px; margin-top: 5px; opacity: 0.8; }

        /* Judul Section */
        .section-header { font-size: 13px; color: var(--secondary); font-weight: 600; text-transform: uppercase; margin-bottom: 5px; letter-spacing: 1px;}
        .section-title { font-size: 22px; font-weight: 700; margin-top: 0; margin-bottom: 20px; color: var(--text-dark); }

        /* 2. ALASAN REKOMENDASI (Grid 2x2) */
        .reasons-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .reason-box { background: var(--success-light); border: 1px solid #D5F5E3; padding: 15px; border-radius: 10px; display: flex; gap: 15px; align-items: flex-start; }
        .reason-box i { color: var(--success); font-size: 18px; margin-top: 3px;}
        .reason-box p { margin: 0; font-size: 14px; color: #1E8449; }

        /* 3. BAR PROGRESS KOMPETENSI */
        .kompetensi-row { margin-bottom: 20px; }
        .kompetensi-header { display: flex; justify-content: space-between; margin-bottom: 8px; align-items: center;}
        .kompetensi-title { font-weight: 600; display: flex; align-items: center; gap: 10px; font-size: 15px;}
        .k-icon { width: 25px; height: 25px; border-radius: 6px; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: bold; color: white;}
        .k-stats { font-size: 13px; color: var(--text-gray); }
        .k-stats strong { color: var(--primary); font-size: 15px;}
        
        .bar-bg { background: #EAEDED; height: 10px; border-radius: 10px; overflow: hidden; width: 100%;}
        .bar-fill { height: 100%; border-radius: 10px; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; margin-left: 10px;}

        /* Warna Bar Khusus */
        .c-kognitif { background-color: #5DADE2; }
        .c-hard { background-color: #8E44AD; }
        .c-soft { background-color: #3498DB; }
        .c-minat { background-color: #F39C12; }
        .c-pengalaman { background-color: #27AE60; }

        /* 4. ALTERNATIF (Juara 2 & 3) */
        .alt-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .alt-card { border: 1px solid #EAEDED; border-radius: 12px; padding: 20px; display: flex; align-items: center; gap: 20px; }
        .alt-rank { width: 50px; height: 50px; background: #EAEDED; border-radius: 10px; display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: 700; color: var(--text-gray); }
        .alt-info { flex-grow: 1; }
        .alt-info h4 { margin: 0 0 5px 0; font-size: 16px; }

        /* 5. PERINGKAT LENGKAP */
        .rank-list { width: 100%; border-collapse: collapse; }
        .rank-list td { padding: 15px 0; border-bottom: 1px solid #F2F3F4; vertical-align: middle; }
        .rank-list tr:last-child td { border-bottom: none; }
        
        /* 6. LEGEND KATEGORI */
        .legend-box { background: var(--bg-body); padding: 15px 20px; border-radius: 10px; margin-top: 20px; }
        .legend-title { font-size: 12px; font-weight: 700; color: var(--text-gray); margin-bottom: 10px; display: block; }
        .legend-items { display: flex; gap: 15px; flex-wrap: wrap; }
        .l-item { font-size: 12px; display: flex; align-items: center; gap: 5px; font-weight: 500;}
        .l-dot { width: 12px; height: 12px; border-radius: 50%; }

        /* 7. RADAR CHART CONTAINER */
        .chart-container { width: 100%; max-width: 500px; margin: 0 auto; padding: 20px 0; }

        /* 8. DETAIL PERHITUNGAN (ACCORDION) */
        details { background: var(--white); border: 1px solid #EAEDED; border-radius: 10px; overflow: hidden; margin-bottom: 20px;}
        summary { padding: 15px 20px; cursor: pointer; font-weight: 600; display: flex; align-items: center; gap: 10px; outline: none; background: #F8F9F9;}
        .details-content { padding: 20px; font-size: 13px; background: white;}
        .table-topsis { width: 100%; font-size: 12px; text-align: left; border-collapse: collapse; margin-top: 10px;}
        .table-topsis th, .table-topsis td { border: 1px solid #EAEDED; padding: 8px; }
        .table-topsis th { background: #F4F6F7; }

        /* BUTTON RIWAYAT */
        .btn-history { background: #6C3483; color: white; border: none; padding: 15px 20px; border-radius: 10px; width: 100%; font-size: 16px; font-weight: 600; display: flex; justify-content: space-between; align-items: center; cursor: pointer; text-decoration: none;}
        .btn-history:hover { background: #5B2C6F; }

        /* Responsive */
        @media (max-width: 768px) {
            .reasons-grid, .alt-grid { grid-template-columns: 1fr; }
            .circle-score { position: static; transform: none; margin-top: 20px; }
            .hero-progress-bg, .hero-progress-labels { width: 100%; }
        }
    </style>
</head>
<body>

    @php
        // 1. Ekstrak Data dari Controller
        $kriteria_list = ['kognitif', 'hardskill', 'softskill', 'minat', 'pengalaman'];
        $urutan_bidang = array_keys($ranking);
        
        // Ambil Top 3
        $juara1 = $urutan_bidang[0];
        $juara2 = $urutan_bidang[1];
        $juara3 = $urutan_bidang[2];

        // Format Teks (buang underscore)
        function formatNama($text) { return ucwords(str_replace('_', ' ', $text)); }

        // Konversi Skor TOPSIS (V) ke Persentase Kecocokan (Max 100%)
        function formatPersen($nilai_v) { 
            // V biasanya max di 0.9xx. Kita kalikan 100 biar jadi persen cantik.
            $persen = round($nilai_v * 100);
            return $persen > 100 ? 100 : $persen; 
        }

        // Bikin Kategori Badge Otomatis
        function getKategori($persen) {
            if($persen >= 80) return ['text' => 'Sangat Cocok', 'color' => '#27AE60', 'bg' => '#E9F7EF'];
            if($persen >= 60) return ['text' => 'Cocok', 'color' => '#2980B9', 'bg' => '#EBF5FB'];
            if($persen >= 40) return ['text' => 'Cukup', 'color' => '#F39C12', 'bg' => '#FEF9E7'];
            return ['text' => 'Kurang', 'color' => '#E74C3C', 'bg' => '#FDEDEC'];
        }

        $persen_j1 = formatPersen($ranking[$juara1]);
        $kategori_j1 = getKategori($persen_j1);
    @endphp

    <div class="container">
        
        <div class="hero-card">
            <div class="hero-badge"><i class="fa-solid fa-ranking-star"></i> Rekomendasi Karier Utama - Peringkat #1</div>
            <h1 class="hero-title"><i class="fa-solid fa-trophy" style="color: #F1C40F;"></i> {{ formatNama($juara1) }}</h1>
            
            <div class="hero-subtitle">
                Tingkat Kecocokan: <strong>{{ $persen_j1 }}%</strong><br>
                <small style="opacity: 0.7;">Berdasarkan perhitungan metode AHP, Profile Matching, dan TOPSIS.</small>
            </div>

            <div class="hero-progress-bg">
                <div class="hero-progress-fill" style="width: {{ $persen_j1 }}%;"></div>
            </div>
            <div class="hero-progress-labels">
                <span>0%</span><span>100%</span>
            </div>

            <div class="circle-score">
                <h2>{{ $persen_j1 }}</h2>
                <span>% COCOK</span>
            </div>
        </div>

        <div class="card">
            <div class="section-header">Hasil Analisis</div>
            <h2 class="section-title">Mengapa Karier Ini Direkomendasikan?</h2>
            
            <div class="reasons-grid">
                @php
                    // Bikin Alasan Dinamis dari Nilai Matriks User
                    $nilai_user = $matriks_awal[$juara1];
                @endphp
                
                <div class="reason-box">
                    <i class="fa-solid fa-circle-check"></i>
                    <p>Kemampuan kognitif {{ $nilai_user['kognitif'] >= 3.5 ? 'sangat tinggi dan ' : 'cukup ' }}sesuai dengan tuntutan profesi {{ formatNama($juara1) }}.</p>
                </div>
                <div class="reason-box">
                    <i class="fa-solid fa-circle-check"></i>
                    <p>Minat pada analisis dan eksplorasi bidang ini menunjukkan kecocokan yang {{ $nilai_user['minat'] >= 4 ? 'sangat relevan' : 'baik' }}.</p>
                </div>
                <div class="reason-box">
                    <i class="fa-solid fa-circle-check"></i>
                    <p>Hard skill teknis {{ $nilai_user['hardskill'] >= 3.5 ? 'sangat mendukung' : 'memadai' }} kebutuhan utama di industri ini.</p>
                </div>
                <div class="reason-box">
                    <i class="fa-solid fa-circle-check"></i>
                    <p>Soft skill dan pengalaman akademik sejauh ini sudah selaras dengan jalan karier ini.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="section-header">Detail Penilaian</div>
            <h2 class="section-title">Analisis Kompetensi</h2>
            <p style="color: var(--text-gray); font-size: 13px; margin-top: -15px; margin-bottom: 25px;">Nilai kamu vs. nilai ideal profesi {{ formatNama($juara1) }}</p>

            @php
                // Mapping Warna dan Singkatan untuk Bar
                $bar_config = [
                    'kognitif' => ['L' => 'K', 'C' => 'c-kognitif', 'N' => 'Kognitif', 'Id' => 90],
                    'hardskill' => ['L' => 'H', 'C' => 'c-hard', 'N' => 'Hard Skills', 'Id' => 85],
                    'softskill' => ['L' => 'S', 'C' => 'c-soft', 'N' => 'Soft Skills', 'Id' => 80],
                    'minat' => ['L' => 'M', 'C' => 'c-minat', 'N' => 'Minat', 'Id' => 88],
                    'pengalaman' => ['L' => 'P', 'C' => 'c-pengalaman', 'N' => 'Pengalaman', 'Id' => 75],
                ];
                // Simpan nilai untuk Radar Chart
                $radar_user = [];
                $radar_ideal = [];
            @endphp

            @foreach($kriteria_list as $krit)
                @php 
                    $cfg = $bar_config[$krit];
                    // Konversi nilai mentah Profile Matching (Max 5) ke skala 100
                    $score_100 = round(($nilai_user[$krit] / 5.0) * 100);
                    $radar_user[] = $score_100;
                    $radar_ideal[] = $cfg['Id'];

                    $is_terpenuhi = $score_100 >= $cfg['Id'];
                @endphp
                <div class="kompetensi-row">
                    <div class="kompetensi-header">
                        <div class="kompetensi-title">
                            <span class="k-icon {{ $cfg['C'] }}">{{ $cfg['L'] }}</span> {{ $cfg['N'] }}
                        </div>
                        <div class="k-stats">
                            <strong>{{ $score_100 }}</strong> / {{ $cfg['Id'] }} ideal
                            <span class="badge" style="background: {{ $is_terpenuhi ? 'var(--success-light)' : 'var(--warning-light)' }}; color: {{ $is_terpenuhi ? 'var(--success)' : 'var(--warning)' }};">
                                {{ $is_terpenuhi ? '✓ Terpenuhi' : 'Perlu Ditingkatkan' }}
                            </span>
                        </div>
                    </div>
                    <div class="bar-bg">
                        <div class="bar-fill {{ $cfg['C'] }}" style="width: {{ $score_100 }}%;"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card">
            <div class="section-header">Visualisasi</div>
            <h2 class="section-title">Perbandingan Profil Kompetensi</h2>
            <p style="color: var(--text-gray); font-size: 13px; margin-top: -15px;">Melihat sebaran kompetensimu dibandingkan standar ideal.</p>
            
            <div class="chart-container">
                <canvas id="radarChart"></canvas>
            </div>
        </div>

        <h2 style="font-size: 20px; color: var(--text-dark); margin-bottom: 15px;"><i class="fa-solid fa-arrow-trend-up" style="color: var(--info);"></i> Alternatif Karier Terbaik</h2>
        <div class="alt-grid" style="margin-bottom: 25px;">
            @foreach([$juara2 => 2, $juara3 => 3] as $alt_id => $pos)
                @php 
                    $p = formatPersen($ranking[$alt_id]); 
                    $kat = getKategori($p);
                @endphp
                <div class="alt-card">
                    <div class="alt-rank">#{{ $pos }}</div>
                    <div class="alt-info">
                        <h4>{{ formatNama($alt_id) }}</h4>
                        <div class="bar-bg" style="height: 6px; margin-bottom: 5px;">
                            <div class="bar-fill" style="width: {{ $p }}%; background: {{ $kat['color'] }};"></div>
                        </div>
                        <span style="font-size: 12px; color: var(--text-gray);">Tingkat Kecocokan: {{ $p }}%</span>
                    </div>
                    <div class="badge" style="background: {{ $kat['bg'] }}; color: {{ $kat['color'] }};">{{ $kat['text'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="card">
            <div class="kompetensi-header">
                <h2 class="section-title" style="margin: 0;"><i class="fa-solid fa-chart-simple" style="color: var(--info);"></i> Peringkat Lengkap Karier</h2>
                <span style="font-size: 12px; color: var(--text-gray);">Peringkat #4 - #9</span>
            </div>
            
            <table class="rank-list">
                @for($i = 3; $i < count($urutan_bidang); $i++)
                    @php 
                        $b_id = $urutan_bidang[$i];
                        $p = formatPersen($ranking[$b_id]); 
                        $kat = getKategori($p);
                    @endphp
                    <tr>
                        <td style="font-weight: 700; color: var(--text-gray); width: 30px;">{{ $i+1 }}</td>
                        <td style="font-weight: 500;">{{ formatNama($b_id) }}</td>
                        <td style="width: 30%;">
                            <div class="bar-bg" style="height: 6px;">
                                <div class="bar-fill" style="width: {{ $p }}%; background: {{ $kat['color'] }};"></div>
                            </div>
                        </td>
                        <td style="text-align: right; font-weight: 600; color: var(--secondary); width: 60px;">{{ $p }}%</td>
                        <td style="text-align: right; width: 100px;">
                            <span class="badge" style="background: {{ $kat['bg'] }}; color: {{ $kat['color'] }}; margin: 0;">{{ $kat['text'] }}</span>
                        </td>
                    </tr>
                @endfor
            </table>

            <div class="legend-box">
                <span class="legend-title"><i class="fa-solid fa-thumbtack" style="color: var(--danger);"></i> KETERANGAN KATEGORI</span>
                <div class="legend-items">
                    <div class="l-item"><div class="l-dot" style="background: #27AE60;"></div> Sangat Cocok (80% - 100%)</div>
                    <div class="l-item"><div class="l-dot" style="background: #2980B9;"></div> Cocok (60% - 79%)</div>
                    <div class="l-item"><div class="l-dot" style="background: #F39C12;"></div> Cukup (40% - 59%)</div>
                    <div class="l-item"><div class="l-dot" style="background: #E74C3C;"></div> Kurang Cocok (< 40%)</div>
                </div>
            </div>
        </div>

        <div class="card" style="padding: 0; overflow: hidden; border: 1px solid #EAEDED;">
            <details>
                <summary style="padding: 20px; background: #F8F9F9; border-bottom: 1px solid #EAEDED; list-style: none;">
                    <i class="fa-regular fa-file-lines" style="color: var(--info); font-size: 20px;"></i> 
                    <div style="margin-left: 15px;">
                        <span style="display: block; font-size: 15px; font-weight: 700;">Lihat Detail Perhitungan Transparan</span>
                        <span style="font-size: 11px; color: var(--text-gray); font-weight: normal;">Bobot AHP • Matriks Profile Matching • Hasil TOPSIS</span>
                    </div>
                    <i class="fa-solid fa-chevron-down" style="margin-left: auto; color: var(--text-gray);"></i>
                </summary>

                <div style="padding: 0;">
                    <div style="display: flex; background: #fff; border-bottom: 1px solid #EAEDED;">
                        <button class="tab-btn active" onclick="openTab(event, 'tab-ahp')">BOBOT AHP</button>
                        <button class="tab-btn" onclick="openTab(event, 'tab-pm')">PROFILE MATCHING</button>
                        <button class="tab-btn" onclick="openTab(event, 'tab-topsis')">TOPSIS</button>
                    </div>

                    <div id="tab-ahp" class="tab-content" style="display: block;">
                        <p style="font-size: 13px; color: var(--text-gray); margin-bottom: 20px;">
                            Bobot kepentingan tiap kriteria dihitung menggunakan metode <em>Analytical Hierarchy Process (AHP)</em> khusus bidang {{ formatNama($juara1) }}.
                        </p>
                        @foreach($ahp_final as $k_name => $val)
                            <div style="margin-bottom: 15px;">
                                <div style="display: flex; justify-content: space-between; font-size: 13px; margin-bottom: 5px;">
                                    <span style="font-weight: 600;">{{ ucwords($k_name) }}</span>
                                    <span style="color: var(--secondary); font-weight: 700;">{{ round($val * 100) }}%</span>
                                </div>
                                <div class="bar-bg" style="height: 8px;">
                                    <div class="bar-fill" style="width: {{ $val * 100 }}%; background: var(--secondary);"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="tab-pm" class="tab-content">
                        <p style="font-size: 13px; color: var(--text-gray); margin-bottom: 15px;">Nilai Profile Matching membandingkan profil kompetensimu dengan profil ideal tiap karier.</p>
                        <div style="overflow-x: auto;">
                            <table class="table-detail">
                                <thead>
                                    <tr>
                                        <th>KARIER</th>
                                        <th>NILAI CORE FACTOR</th>
                                        <th>NILAI SECONDARY FACTOR</th>
                                        <th style="background: #EBF5FB;">NILAI TOTAL PM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detail_pm as $karier => $val)
                                        <tr style="{{ $karier == $juara1 ? 'background: #FEF9E7; font-weight: 700;' : '' }}">
                                            <td>{{ formatNama($karier) }}</td>
                                            <td>{{ number_format($val['ncf'], 2) }}</td>
                                            <td>{{ number_format($val['nsf'], 2) }}</td>
                                            <td style="color: var(--secondary); font-weight: 700;">{{ number_format($val['total'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="tab-topsis" class="tab-content">
                        <p style="font-size: 13px; color: var(--text-gray); margin-bottom: 15px;">TOPSIS meranking karier berdasarkan jarak terhadap solusi ideal positif (D+) dan negatif (D-).</p>
                        <div style="overflow-x: auto;">
                            <table class="table-detail">
                                <thead>
                                    <tr>
                                        <th>KARIER</th>
                                        <th>D+ (IDEAL POSITIF)</th>
                                        <th>D- (IDEAL NEGATIF)</th>
                                        <th style="background: #EBF5FB;">PREFERENSI (Vi)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ranking as $karier => $nilai_v)
                                        <tr style="{{ $karier == $juara1 ? 'background: #FEF9E7; font-weight: 700;' : '' }}">
                                            <td>{{ formatNama($karier) }}</td>
                                            <td>{{ number_format($d_plus[$karier], 4) }}</td>
                                            <td>{{ number_format($d_min[$karier], 4) }}</td>
                                            <td style="color: #6C3483; font-weight: 700;">{{ number_format($nilai_v, 4) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </details>
        </div>

        <style>
            /* CSS Khusus untuk Tab */
            .tab-btn { flex: 1; padding: 15px; border: none; background: none; cursor: pointer; font-size: 13px; font-weight: 600; color: var(--text-gray); border-bottom: 3px solid transparent; transition: 0.3s; }
            .tab-btn.active { color: var(--secondary); border-bottom: 3px solid var(--secondary); background: #F4F9FD; }
            .tab-content { display: none; padding: 25px; animation: fadeIn 0.4s; }
            .table-detail { width: 100%; border-collapse: collapse; font-size: 12px; }
            .table-detail th { text-align: left; padding: 12px; border-bottom: 2px solid #EAEDED; color: var(--text-gray); white-space: nowrap;}
            .table-detail td { padding: 12px; border-bottom: 1px solid #F2F3F4; white-space: nowrap;}
            @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
            
            /* Menghilangkan panah bawaan browser di details */
            details > summary::-webkit-details-marker { display: none; }
        </style>

        <script>
            // Fungsi Javascript untuk ganti-ganti Tab
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tab-content");
                for (i = 0; i < tabcontent.length; i++) { tabcontent[i].style.display = "none"; }
                tablinks = document.getElementsByClassName("tab-btn");
                for (i = 0; i < tablinks.length; i++) { tablinks[i].className = tablinks[i].className.replace(" active", ""); }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>

        <a href="/" class="btn-history">
            <div>
                <span style="display: block;">Kembali ke Beranda Utama</span>
                <span style="font-size: 12px; font-weight: normal; opacity: 0.8;">Selesaikan sesi tes ini.</span>
            </div>
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </div>

    <script>
        const ctx = document.getElementById('radarChart').getContext('2d');
        const radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Kognitif', 'Hard Skills', 'Soft Skills', 'Minat', 'Pengalaman'],
                datasets: [
                    {
                        label: 'Profilmu',
                        data: <?php echo json_encode($radar_user); ?>,
                        backgroundColor: 'rgba(142, 68, 173, 0.2)', // Ungu transparan
                        borderColor: 'rgba(142, 68, 173, 1)',
                        pointBackgroundColor: 'rgba(142, 68, 173, 1)',
                        borderWidth: 2,
                    },
                    {
                        label: 'Profil Ideal Data Analyst',
                        data: <?php echo json_encode($radar_ideal); ?>,
                        backgroundColor: 'rgba(149, 165, 166, 0.1)', // Abu-abu transparan
                        borderColor: 'rgba(149, 165, 166, 0.5)',
                        borderDash: [5, 5],
                        borderWidth: 2,
                        pointRadius: 0
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    r: {
                        angleLines: { color: 'rgba(0, 0, 0, 0.05)' },
                        grid: { color: 'rgba(0, 0, 0, 0.05)' },
                        pointLabels: {
                            font: { family: "'Poppins', sans-serif", size: 12 },
                            color: '#7F8C8D'
                        },
                        ticks: { display: false, min: 0, max: 100 }
                    }
                },
                plugins: {
                    legend: { position: 'bottom', labels: { font: { family: "'Poppins', sans-serif" } } }
                }
            }
        });
    </script>
</body>
</html>