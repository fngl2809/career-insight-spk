<x-app-layout>
    <div id="loading-screen" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background-color: #F8FAFC; z-index: 999999; display: flex; flex-direction: column; justify-content: center; align-items: center; transition: opacity 0.8s ease;">
        
        <div style="position: relative; width: 80px; height: 80px; margin-bottom: 24px;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 6px solid #E2E8F0; border-radius: 50%;"></div>
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 6px solid #4298B4; border-top-color: transparent; border-radius: 50%; animation: muter 1s linear infinite;"></div>
            <img src="{{ asset('images/logo.png') }}" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 24px; opacity: 0.8;" alt="Logo">
        </div>
        
        <h2 style="font-family: 'Poppins', sans-serif; font-size: 20px; font-weight: 700; color: #1E293B; margin-bottom: 8px;">Sedang menganalisis profilmu...</h2>
        <p style="font-family: 'Poppins', sans-serif; font-size: 14px; color: #64748B; text-align: center; line-height: 1.6;">
            Sistem SPK sedang memproses hasil dengan metode<br>Profile Matching, AHP & TOPSIS
        </p>

        <style>
            /* Animasi putar spinner */
            @keyframes muter {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            /* Sembunyikan konten hasil sementara loading */
            .result-container { display: none; }
        </style>
    </div>
    <style>
        .result-container {
            font-family: 'Poppins', sans-serif;
            color: #2C3E50;
            line-height: 1.6;
            max-width: 900px; 
            margin: 0 auto;
            padding: 20px 0;
        }

        /* Card Master */
        .result-card {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            margin-bottom: 25px;
            border: 1px solid #EAEDED;
        }

        /* HERO HEADER */
        .hero-card {
            background: linear-gradient(135deg, #1F618D, #2980B9);
            color: #FFFFFF;
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

        .hero-progress-bg { background: rgba(255,255,255,0.2); height: 12px; border-radius: 10px; width: 60%; position: relative; margin-top: 10px;}
        .hero-progress-fill { background: #F1C40F; height: 100%; border-radius: 10px; box-shadow: 0 0 10px rgba(241, 196, 15, 0.5); }
        .hero-progress-labels { display: flex; width: 60%; justify-content: space-between; font-size: 11px; margin-top: 5px; opacity: 0.8; }

        .section-header { font-size: 13px; color: #2980B9; font-weight: 600; text-transform: uppercase; margin-bottom: 5px; letter-spacing: 1px;}
        .section-title { font-size: 22px; font-weight: 700; margin-top: 0; margin-bottom: 20px; color: #2C3E50; }

        /* REASONS GRID */
        .reasons-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .reason-box { background: #E9F7EF; border: 1px solid #D5F5E3; padding: 15px; border-radius: 10px; display: flex; gap: 15px; align-items: flex-start; }
        .reason-box i { color: #27AE60; font-size: 18px; margin-top: 3px;}
        .reason-box p { margin: 0; font-size: 14px; color: #1E8449; }

        /* PROGRESS KOMPETENSI */
        .kompetensi-row { margin-bottom: 20px; }
        .kompetensi-header { display: flex; justify-content: space-between; margin-bottom: 8px; align-items: center;}
        .kompetensi-title { font-weight: 600; display: flex; align-items: center; gap: 10px; font-size: 15px;}
        .k-icon { width: 25px; height: 25px; border-radius: 6px; display: flex; justify-content: center; align-items: center; font-size: 12px; font-weight: bold; color: white;}
        .k-stats { font-size: 13px; color: #7F8C8D; }
        .k-stats strong { color: #1F618D; font-size: 15px;}
        
        .bar-bg { background: #EAEDED; height: 10px; border-radius: 10px; overflow: hidden; width: 100%;}
        .bar-fill { height: 100%; border-radius: 10px; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; margin-left: 10px;}

        .c-kognitif { background-color: #5DADE2; }
        .c-hard { background-color: #8E44AD; }
        .c-soft { background-color: #3498DB; }
        .c-minat { background-color: #F39C12; }
        .c-pengalaman { background-color: #27AE60; }

        /* ALTERNATIF & PERINGKAT */
        .alt-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        
        /* 🔥 Kotaknya dibikin putih, dikasih bayangan, dan kalau dihover agak ngangkat! */
        .alt-card { background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 16px; padding: 24px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); transition: all 0.3s ease; }
        .alt-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); border-color: #CBD5E1; }
        
        /* 🔥 Kotak angka #2 dan #3 nya dibikin lebih tegas */
        .alt-rank { width: 55px; height: 55px; background: #F1F5F9; border-radius: 14px; display: flex; justify-content: center; align-items: center; font-size: 22px; font-weight: 800; color: #64748B; box-shadow: inset 0 2px 4px rgba(0,0,0,0.03); flex-shrink: 0;}
        
        .alt-info { flex-grow: 1; }
        .alt-info h4 { margin: 0 0 5px 0; font-size: 17px; font-weight: 700; color: #1E293B; }

        .rank-list { width: 100%; border-collapse: collapse; }
        .rank-list td { padding: 15px 0; border-bottom: 1px solid #F2F3F4; vertical-align: middle; }
        .rank-list tr:last-child td { border-bottom: none; }
        
        .legend-box { background: #F4F6F7; padding: 15px 20px; border-radius: 10px; margin-top: 20px; }
        .legend-title { font-size: 12px; font-weight: 700; color: #7F8C8D; margin-bottom: 10px; display: block; }
        .legend-items { display: flex; gap: 15px; flex-wrap: wrap; }
        .l-item { font-size: 12px; display: flex; align-items: center; gap: 5px; font-weight: 500;}
        .l-dot { width: 12px; height: 12px; border-radius: 50%; }

        /* TAB DETAILS */
        .tab-btn { flex: 1; padding: 15px; border: none; background: none; cursor: pointer; font-size: 13px; font-weight: 600; color: #7F8C8D; border-bottom: 3px solid transparent; transition: 0.3s; }
        .tab-btn.active { color: #2980B9; border-bottom: 3px solid #2980B9; background: #F4F9FD; }
        .tab-content { display: none; padding: 25px; animation: fadeIn 0.4s; }
        .table-detail { width: 100%; border-collapse: collapse; font-size: 12px; }
        .table-detail th { text-align: left; padding: 12px; border-bottom: 2px solid #EAEDED; color: #7F8C8D; white-space: nowrap;}
        .table-detail td { padding: 12px; border-bottom: 1px solid #F2F3F4; white-space: nowrap;}
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        details > summary::-webkit-details-marker { display: none; }

       /* 🔥 CSS BARU UNTUK INSIGHT TAG PROFESI KERJA 🔥 */
        .prospek-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 20px; }
        
        /* Tombol di Kotak Biru (Juara 1) */
        .tag-pill { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.6); padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; letter-spacing: 0.5px; backdrop-filter: blur(5px); transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1);}
        .tag-pill:hover { background: rgba(255,255,255,0.3); transform: translateY(-3px); box-shadow: 0 6px 12px rgba(0,0,0,0.15); }
        
        /* Tombol di Kotak Putih (Juara 2 & 3) */
        .tag-pill-dark { background: #FFFFFF; color: #2980B9; border: 1px solid #2980B9; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600; margin-top: 5px; margin-right: 5px; display: inline-flex; align-items: center; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(41,128,185,0.15); cursor: pointer;}
        .tag-pill-dark:hover { background: #2980B9; color: #FFFFFF; transform: translateY(-3px); box-shadow: 0 5px 10px rgba(41,128,185,0.25); }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @php
        $kriteria_list = ['kognitif', 'hardskill', 'softskill', 'minat', 'pengalaman'];
        $urutan_bidang = array_keys($ranking);
        
        $juara1 = $urutan_bidang[0];
        $juara2 = $urutan_bidang[1];
        $juara3 = $urutan_bidang[2];

        function formatNama($text) { return ucwords(str_replace('_', ' ', $text)); }
        function formatPersen($nilai_v) { 
            $persen = round($nilai_v * 100);
            return $persen > 100 ? 100 : $persen; 
        }
        function getKategori($persen) {
            if($persen >= 80) return ['text' => 'Sangat Cocok', 'color' => '#27AE60', 'bg' => '#E9F7EF'];
            if($persen >= 60) return ['text' => 'Cocok', 'color' => '#2980B9', 'bg' => '#EBF5FB'];
            if($persen >= 40) return ['text' => 'Cukup', 'color' => '#F39C12', 'bg' => '#FEF9E7'];
            return ['text' => 'Kurang', 'color' => '#E74C3C', 'bg' => '#FDEDEC'];
        }

        $persen_j1 = formatPersen($ranking[$juara1]);
        $kategori_j1 = getKategori($persen_j1);

        // 🔥 KAMUS BARU: INSIGHT PROSPEK LOWONGAN KERJA TOP 3 🔥
        $insight_profesi = [
            '3d_ar' => ['AR Developer', 'XR Engineer', 'Creative Technologist'],
            '3d_vr' => ['VR Developer', 'Metaverse Architect', 'Simulation Engineer'],
            '3d_game' => ['Game Programmer', 'Gameplay Engineer', 'Technical Artist'],
            'data_analyst' => ['Data Analyst', 'Business Intelligence', 'Product Analyst'],
            'data_mining' => ['Data Mining Engineer', 'Big Data Specialist', 'Data Engineer'],
            'data_science' => ['Data Scientist', 'Machine Learning Scientist', 'AI Researcher'],
            'web' => ['Fullstack Developer', 'Frontend Engineer', 'Backend Developer'],
            'ai' => ['AI Engineer', 'Machine Learning Engineer', 'Deep Learning Specialist'],
            'mobile' => ['Android Developer', 'iOS Developer', 'Mobile App Engineer']
        ];

        // 🔥 TAMBAHKAN KAMUS DESKRIPSI INI PERSIS DI BAWAHNYA 🔥
        $deskripsi_profesi = [
            // MOBILE
            'Android Developer' => 'Peran ini sangat pas untukmu karena kamu menguasai logika bahasa Java/Kotlin, terbiasa menggunakan alat pengembangan Android Studio, dan mampu menyambungkan aplikasi dengan API dari internet.',
            'iOS Developer' => 'Cocok untukmu yang sangat memahami siklus hidup aplikasi mobile (Life Cycle) serta mampu berkolaborasi merancang navigasi aplikasi yang simpel namun sangat intuitif bagi pengguna.',
            'Mobile App Engineer' => 'Karier ini tepat dengan tingkat kesabaranmu yang tinggi dalam menguji dan memperbaiki bug agar aplikasi tidak force close, serta keahlianmu mengelola penyimpanan data lokal di memori HP.',
            
            // WEB
            'Fullstack Developer' => 'Sesuai dengan logikamu merancang database relasional dan penguasaan fondasi HTML, CSS, JS tingkat lanjut serta framework modern seperti Laravel atau React.',
            'Frontend Engineer' => 'Cocok karena ketelitian dan kepedulianmu merancang UI/UX, menyelesaikan bug tampilan, dan memastikan kenyamanan alur data pengguna di dalam browser.',
            'Backend Developer' => 'Sangat pas dengan kemampuanmu memproses alur pengiriman data di server, merancang logika rute API, dan ketelitianmu menjaga keamanan sistem website.',
            
            // AI
            'AI Engineer' => 'Relevan dengan pemahamanmu soal Neural Networks, logika pengolahan matriks yang kuat, dan penggunaan alat cerdas seperti OpenCV atau NLTK.',
            'Machine Learning Engineer' => 'Cocok karena kemampuanmu merancang sistem yang bisa belajar sendiri dari data dan menguasai teknik pelatihan model (Training Model) menggunakan Python.',
            'Deep Learning Specialist' => 'Pas banget dengan antusiasmemu mengeksplorasi hal baru untuk membuat mesin yang bisa "berpikir" dan caramu menimbang dampak etika kecerdasan buatan.',
            
            // DATA ANALYST
            'Data Analyst' => 'Pas dengan kemampuanmu mengolah data menggunakan Microsoft Excel tingkat lanjut (Pivot/VLOOKUP) dan bahasa SQL untuk menarik data langsung dari database.',
            'Business Intelligence' => 'Relevan dengan keahlianmu merancang dashboard interaktif (seperti Tableau/PowerBI) dan rasa percaya dirimu mempresentasikan temuan angka kepada klien.',
            'Product Analyst' => 'Cocok dengan ketelitianmu menjaga kebersihan data dan kemampuan magismu mengubah angka-angka mentah menjadi narasi cerita penyelesaian bisnis.',
            
            // DATA SCIENCE
            'Data Scientist' => 'Sesuai dengan keahlianmu memahami konsep Supervised/Unsupervised Learning secara mendalam dan merancang model prediktif menggunakan Python atau R.',
            'Machine Learning Scientist' => 'Relevan dengan logikamu memecahkan masalah tingkat tinggi menggunakan library seperti Scikit-Learn atau TensorFlow untuk memprediksi masa depan.',
            'AI Researcher' => 'Pas banget dengan minat risetmu merancang eksperimen untuk menguji akurasi model serta semangatmu mengikuti kompetisi data skala besar (seperti Kaggle).',
            
            // DATA MINING
            'Data Mining Engineer' => 'Sesuai karena kamu paham logika algoritma klasifikasi/clustering dan telaten melakukan preprocessing (menghilangkan noise data) memakai tools seperti RapidMiner.',
            'Big Data Specialist' => 'Relevan dengan kemampuanmu mengeksplorasi kumpulan data berjumlah raksasa (Big Data) dan keahlianmu menguasai teknik pemrosesan teks (Text Mining).',
            'Data Engineer' => 'Cocok dengan kesabaranmu melakukan iterasi eksperimen data berkali-kali dan kemampuanmu mengintegrasikan hasil penambangan ke dalam aplikasi lain.',
            
            // 3D AR
            'AR Developer' => 'Pas dengan keahlianmu mengelola koordinat 3D, memanipulasi pencahayaan, dan menggunakan alat pengembangan AR modern seperti Vuforia atau Spark AR.',
            'XR Engineer' => 'Relevan dengan kemampuan koding interaksi objekmu di Unity dan kesabaranmu melakukan pengujian komprehensif pada berbagai perangkat kamera.',
            'Creative Technologist' => 'Sesuai karena kamu bisa membuat dan mengedit aset 3D sendiri (seperti di Blender/Maya) serta memiliki imajinasi spasial yang sangat baik.',
            
            // 3D VR
            'VR Developer' => 'Cocok dengan pemahamanmu soal User Experience (UX) di ruang 360 derajat dan keahlianmu menggunakan Unity/Unreal Engine untuk ekosistem VR.',
            'Metaverse Architect' => 'Pas banget dengan impian besarmu menciptakan dan menjelaskan dunia virtual kompleks yang bisa dijelajahi oleh banyak orang secara simultan.',
            'Simulation Engineer' => 'Relevan dengan pemahaman prinsip fisikamu untuk benda di dunia virtual dan keahlianmu merancang interaksi menggunakan motion controller tanpa tombol fisik.',
            
            // 3D GAME
            'Game Programmer' => 'Sesuai dengan penguasaan bahasa pemprogramanmu (C#/C++) dalam Game Engine dan logikamu merancang sistem skor, nyawa, serta AI musuh.',
            'Gameplay Engineer' => 'Cocok dengan kemampuan kreatifmu merancang mekanik permainan yang seimbang, menantang, sekaligus mampu menyusun skenario misi yang seru.',
            'Technical Artist' => 'Relevan dengan ketelatenanmu mengatur aset animasi dan keluwesanmu bekerja sama dalam tim lintas media (desainer, musisi, programmer).'
        ];
    @endphp

    <div class="result-container py-6" x-data="{ showDetail: false, detailTitle: '', detailText: '' }">
        
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

            <div class="prospek-tags">
                <span style="font-size: 12px; opacity: 0.9; width: 100%; margin-bottom: 2px; font-weight: 500;">
                    <i class="fa-solid fa-lightbulb" style="color: #F1C40F;"></i> Prospek Jabatan Relevan <em style="opacity: 0.8;">(Klik profesi untuk melihat detail)</em>:
                </span>
                @foreach($insight_profesi[$juara1] as $profesi)
                    <button type="button" @click="showDetail = true; detailTitle = '{{ $profesi }}'; detailText = '{{ addslashes($deskripsi_profesi[$profesi]) }}'" class="tag-pill cursor-pointer hover:scale-105 transition-transform flex items-center outline-none">
                        <i class="fa-solid fa-briefcase" style="opacity: 0.7; margin-right: 5px;"></i> {{ $profesi }}
                    </button>
                @endforeach
            </div>

            <div class="circle-score">
                <h2>{{ $persen_j1 }}</h2>
                <span>% COCOK</span>
            </div>
        </div>

        <div class="result-card">
            <div class="section-header">Hasil Analisis</div>
            <h2 class="section-title">Mengapa Karier Ini Direkomendasikan?</h2>
            
            <div class="reasons-grid">
                @php $nilai_user = $matriks_awal[$juara1]; @endphp
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

        <div class="result-card">
            <div class="section-header">Detail Penilaian</div>
            <h2 class="section-title">Analisis Kompetensi</h2>
            <p style="color: #7F8C8D; font-size: 13px; margin-top: -15px; margin-bottom: 25px;">Nilai kamu vs. nilai ideal profesi {{ formatNama($juara1) }}</p>

            @php
                $bar_config = [
                    'kognitif' => ['L' => 'K', 'C' => 'c-kognitif', 'N' => 'Kognitif', 'Id' => 90],
                    'hardskill' => ['L' => 'H', 'C' => 'c-hard', 'N' => 'Hard Skills', 'Id' => 85],
                    'softskill' => ['L' => 'S', 'C' => 'c-soft', 'N' => 'Soft Skills', 'Id' => 80],
                    'minat' => ['L' => 'M', 'C' => 'c-minat', 'N' => 'Minat', 'Id' => 88],
                    'pengalaman' => ['L' => 'P', 'C' => 'c-pengalaman', 'N' => 'Pengalaman', 'Id' => 75],
                ];
                $radar_user = [];
                $radar_ideal = [];
            @endphp

            @foreach($kriteria_list as $krit)
                @php 
                    $cfg = $bar_config[$krit];
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
                            <span class="badge" style="background: {{ $is_terpenuhi ? '#E9F7EF' : '#FEF9E7' }}; color: {{ $is_terpenuhi ? '#27AE60' : '#F39C12' }};">
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

        <div class="result-card">
            <div class="section-header">Visualisasi</div>
            <h2 class="section-title">Perbandingan Profil Kompetensi</h2>
            <p style="color: #7F8C8D; font-size: 13px; margin-top: -15px;">Melihat sebaran kompetensimu dibandingkan standar ideal.</p>
            <div style="width: 100%; max-width: 500px; margin: 0 auto; padding: 20px 0;">
                <canvas id="radarChart"></canvas>
            </div>
        </div>

        <h2 style="font-size: 20px; color: #2C3E50; margin-bottom: 15px;"><i class="fa-solid fa-arrow-trend-up" style="color: #5DADE2;"></i> Alternatif Karier Terbaik</h2>
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
                        <span style="font-size: 12px; color: #7F8C8D;">Tingkat Kecocokan: {{ $p }}%</span>
                        
                        <div style="margin-top: 5px;">
                            @foreach($insight_profesi[$alt_id] as $profesi)
                                <button type="button" @click="showDetail = true; detailTitle = '{{ $profesi }}'; detailText = '{{ addslashes($deskripsi_profesi[$profesi]) }}'" class="tag-pill-dark cursor-pointer hover:scale-105 transition-transform text-left outline-none border-none">
                                    <i class="fa-solid fa-briefcase" style="font-size: 10px; margin-right: 3px;"></i> {{ $profesi }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="badge" style="background: {{ $kat['bg'] }}; color: {{ $kat['color'] }}; align-self: flex-start;">{{ $kat['text'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="result-card">
            <div class="kompetensi-header">
                <h2 class="section-title" style="margin: 0;"><i class="fa-solid fa-chart-simple" style="color: #5DADE2;"></i> Peringkat Lengkap Karier</h2>
                <span style="font-size: 12px; color: #7F8C8D;">Peringkat #4 - #9</span>
            </div>
            
            <table class="rank-list">
                @for($i = 3; $i < count($urutan_bidang); $i++)
                    @php 
                        $b_id = $urutan_bidang[$i];
                        $p = formatPersen($ranking[$b_id]); 
                        $kat = getKategori($p);
                    @endphp
                    <tr>
                        <td style="font-weight: 700; color: #7F8C8D; width: 30px;">{{ $i+1 }}</td>
                        <td style="font-weight: 500;">{{ formatNama($b_id) }}</td>
                        <td style="width: 30%;">
                            <div class="bar-bg" style="height: 6px;">
                                <div class="bar-fill" style="width: {{ $p }}%; background: {{ $kat['color'] }};"></div>
                            </div>
                        </td>
                        <td style="text-align: right; font-weight: 600; color: #2980B9; width: 60px;">{{ $p }}%</td>
                        <td style="text-align: right; width: 100px;">
                            <span class="badge" style="background: {{ $kat['bg'] }}; color: {{ $kat['color'] }}; margin: 0;">{{ $kat['text'] }}</span>
                        </td>
                    </tr>
                @endfor
            </table>

            <div class="legend-box">
                <span class="legend-title"><i class="fa-solid fa-thumbtack" style="color: #E74C3C;"></i> KETERANGAN KATEGORI</span>
                <div class="legend-items">
                    <div class="l-item"><div class="l-dot" style="background: #27AE60;"></div> Sangat Cocok (80% - 100%)</div>
                    <div class="l-item"><div class="l-dot" style="background: #2980B9;"></div> Cocok (60% - 79%)</div>
                    <div class="l-item"><div class="l-dot" style="background: #F39C12;"></div> Cukup (40% - 59%)</div>
                    <div class="l-item"><div class="l-dot" style="background: #E74C3C;"></div> Kurang Cocok (< 40%)</div>
                </div>
            </div>
        </div>

        <style>
            details.detail-animasi summary i.arrow-icon { transition: transform 0.3s ease; }
            details.detail-animasi[open] summary i.arrow-icon { transform: rotate(90deg); }
            details.detail-animasi[open] summary { background-color: #F8FAFC; }
            details.detail-animasi summary::-webkit-details-marker { display: none; }
        </style>

        <div class="result-card" style="padding: 0; overflow: hidden; border: 1px solid #EAEDED;">
            <details class="detail-animasi">
                <summary style="padding: 20px; background: #FFFFFF; list-style: none; display: flex; align-items: center; cursor: pointer; outline: none; border-bottom: 1px solid transparent;">
                    
                    <div style="background-color: #EBF5FB; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fa-regular fa-file-lines" style="color: #2980B9; font-size: 18px;"></i> 
                    </div>
                    
                    <div style="margin-left: 15px; flex-grow: 1;">
                        <span style="display: block; font-size: 16px; font-weight: 700; color: #1E293B;">Lihat Detail Perhitungan</span>
                        <span style="font-size: 13px; color: #64748B; font-weight: normal;">Bobot AHP • Nilai Profile Matching • Nilai TOPSIS</span>
                    </div>
                    
                    <i class="fa-solid fa-chevron-right arrow-icon" style="color: #94A3B8; font-size: 16px; margin-left: auto;"></i>
                </summary>

                <div style="border-top: 1px solid #EAEDED;"></div>

                <div style="padding: 0;">
                    <div style="display: flex; background: #fff; border-bottom: 1px solid #EAEDED;">
                        <button class="tab-btn active" onclick="openTab(event, 'tab-ahp')">BOBOT AHP</button>
                        <button class="tab-btn" onclick="openTab(event, 'tab-pm')">PROFILE MATCHING</button>
                        <button class="tab-btn" onclick="openTab(event, 'tab-topsis')">TOPSIS</button>
                    </div>

                    <div id="tab-ahp" class="tab-content" style="display: block;">
                        <p style="font-size: 13px; color: #7F8C8D; margin-bottom: 20px;">
                            Bobot kepentingan tiap kriteria dihitung menggunakan metode <em>Analytical Hierarchy Process (AHP)</em> khusus bidang {{ formatNama($juara1) }}.
                        </p>
                        @foreach($ahp_final as $k_name => $val)
                            <div style="margin-bottom: 15px;">
                                <div style="display: flex; justify-content: space-between; font-size: 13px; margin-bottom: 5px;">
                                    <span style="font-weight: 600;">{{ ucwords($k_name) }}</span>
                                    <span style="color: #2980B9; font-weight: 700;">{{ round($val * 100) }}%</span>
                                </div>
                                <div class="bar-bg" style="height: 8px;">
                                    <div class="bar-fill" style="width: {{ $val * 100 }}%; background: #2980B9;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div id="tab-pm" class="tab-content">
                        <div style="overflow-x: auto;">
                            <table class="table-detail">
                                <thead>
                                    <tr>
                                        <th>KARIER</th>
                                        <th>NCF</th>
                                        <th>NSF</th>
                                        <th style="background: #EBF5FB;">NILAI TOTAL PM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detail_pm as $karier => $val)
                                        <tr style="{{ $karier == $juara1 ? 'background: #FEF9E7; font-weight: 700;' : '' }}">
                                            <td>{{ formatNama($karier) }}</td>
                                            <td>{{ number_format($val['ncf'], 2) }}</td>
                                            <td>{{ number_format($val['nsf'], 2) }}</td>
                                            <td style="color: #2980B9; font-weight: 700;">{{ number_format($val['total'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="tab-topsis" class="tab-content">
                        <div style="overflow-x: auto;">
                            <table class="table-detail">
                                <thead>
                                    <tr>
                                        <th>KARIER</th>
                                        <th>D+ (POSITIF)</th>
                                        <th>D- (NEGATIF)</th>
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

        <!-- 🔥 POP-UP MODAL DESKRIPSI PROFESI 🔥 -->
        <div x-show="showDetail" class="fixed inset-0 z-[99999] flex items-center justify-center px-4" style="display: none;">
            <div x-show="showDetail" x-transition.opacity.duration.300ms @click="showDetail = false" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm"></div>
            
            <div x-show="showDetail" x-transition.scale.80.duration.300ms class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 overflow-hidden border border-slate-100">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-[#1F618D] to-[#4298B4]"></div>
                
                <button @click="showDetail = false" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 h-8 w-8 rounded-full flex items-center justify-center transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <div class="flex items-start gap-4 mt-2">
                    <div class="bg-[#EBF5FB] h-12 w-12 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-user-tie text-[#2980B9] text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-[#2980B9] uppercase tracking-wider mb-1">Insight Profesi</p>
                        <h3 class="text-xl font-extrabold text-slate-800 leading-tight mb-3" x-text="detailTitle"></h3>
                        <p class="text-sm text-slate-600 leading-relaxed font-medium" x-text="detailText"></p>
                    </div>
                </div>

                <button @click="showDetail = false" class="mt-6 w-full bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 rounded-xl transition-colors">
                    Mengerti
                </button>
            </div>
        </div>

    </div> <!-- Penutup dari result-container x-data -->

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) { tabcontent[i].style.display = "none"; }
            tablinks = document.getElementsByClassName("tab-btn");
            for (i = 0; i < tablinks.length; i++) { tablinks[i].className = tablinks[i].className.replace(" active", ""); }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        const ctx = document.getElementById('radarChart').getContext('2d');
        const radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ['Kognitif', 'Hard Skills', 'Soft Skills', 'Minat', 'Pengalaman'],
                datasets: [
                    {
                        label: 'Profilmu',
                        data: <?php echo json_encode($radar_user); ?>,
                        backgroundColor: 'rgba(142, 68, 173, 0.2)',
                        borderColor: 'rgba(142, 68, 173, 1)',
                        pointBackgroundColor: 'rgba(142, 68, 173, 1)',
                        borderWidth: 2,
                    },
                    {
                        label: 'Profil Ideal Standar',
                        data: <?php echo json_encode($radar_ideal); ?>,
                        backgroundColor: 'rgba(149, 165, 166, 0.1)',
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
                        pointLabels: { font: { family: "'Poppins', sans-serif", size: 12 }, color: '#7F8C8D' },
                        ticks: { display: false, min: 0, max: 100 }
                    }
                },
                plugins: { legend: { position: 'bottom', labels: { font: { family: "'Poppins', sans-serif" } } } }
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tahan layar loading selama 3 detik (3000 milidetik)
            setTimeout(function() {
                let loadingScreen = document.getElementById("loading-screen");
                let resultContainer = document.querySelector(".result-container");
                
                // 1. Munculkan hasil rekomendasinya
                resultContainer.style.display = "block";
                
                // 2. Bikin efek loading screen-nya memudar (fade out)
                loadingScreen.style.opacity = "0"; 
                
                // 3. Buang layar loading-nya dari tampilan setelah memudar
                setTimeout(function() {
                    loadingScreen.style.display = "none";
                }, 800);
                
            }, 3000); // <-- Waktu delay: 3000 ms = 3 detik
        });
    </script>
</x-app-layout>