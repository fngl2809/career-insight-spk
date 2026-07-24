<x-app-layout>

    <style>
        @keyframes muter {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    @if(request('print') != 'yes')
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
    </div>
    @endif

    @php
        $kriteria_list = ['kognitif', 'hardskill', 'softskill', 'minat', 'pengalaman'];
        $urutan_bidang = array_keys($ranking);
        
        $juara1 = $urutan_bidang[0];
        $juara2 = $urutan_bidang[1];
        $juara3 = $urutan_bidang[2];

        // VARIABEL SPK AMAN
        $nilai_user = $matriks_awal[$juara1];

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

        $deskripsi_profesi = [
            'Android Developer' => 'Peran ini sangat pas untukmu karena kamu menguasai logika bahasa Java/Kotlin, terbiasa menggunakan alat pengembangan Android Studio, dan mampu menyambungkan aplikasi dengan API dari internet.',
            'iOS Developer' => 'Cocok untukmu yang sangat memahami siklus hidup aplikasi mobile (Life Cycle) serta mampu berkolaborasi merancang navigasi aplikasi yang simpel namun sangat intuitif bagi pengguna.',
            'Mobile App Engineer' => 'Karier ini tepat dengan tingkat kesabaranmu yang tinggi dalam menguji dan memperbaiki bug agar aplikasi tidak force close, serta keahlianmu mengelola penyimpanan data lokal di memori HP.',
            'Fullstack Developer' => 'Sesuai dengan logikamu merancang database relasional dan penguasaan fondasi HTML, CSS, JS tingkat lanjut serta framework modern seperti Laravel atau React.',
            'Frontend Engineer' => 'Cocok karena ketelitian dan kepedulianmu merancang UI/UX, menyelesaikan bug tampilan, dan memastikan kenyamanan alur data pengguna di dalam browser.',
            'Backend Developer' => 'Sangat pas dengan kemampuanmu memproses alur pengiriman data di server, merancang logika rute API, dan ketelitianmu menjaga keamanan sistem website.',
            'AI Engineer' => 'Relevan dengan pemahamanmu soal Neural Networks, logika pengolahan matriks yang kuat, dan penggunaan alat cerdas seperti OpenCV atau NLTK.',
            'Machine Learning Engineer' => 'Cocok karena kemampuanmu merancang sistem yang bisa belajar sendiri dari data dan menguasai teknik pelatihan model (Training Model) menggunakan Python.',
            'Deep Learning Specialist' => 'Pas banget dengan antusiasmemu mengeksplorasi hal baru untuk membuat mesin yang bisa "berpikir" dan caramu menimbang dampak etika kecerdasan buatan.',
            'Data Analyst' => 'Pas dengan kemampuanmu mengolah data menggunakan Microsoft Excel tingkat lanjut (Pivot/VLOOKUP) dan bahasa SQL untuk menarik data langsung dari database.',
            'Business Intelligence' => 'Relevan dengan keahlianmu merancang dashboard interaktif (seperti Tableau/PowerBI) dan rasa percaya dirimu mempresentasikan temuan angka kepada klien.',
            'Product Analyst' => 'Cocok dengan ketelitianmu menjaga kebersihan data dan kemampuan magismu mengubah angka-angka mentah menjadi narasi cerita penyelesaian bisnis.',
            'Data Scientist' => 'Sesuai dengan keahlianmu memahami konsep Supervised/Unsupervised Learning secara mendalam dan merancang model prediktif menggunakan Python atau R.',
            'Machine Learning Scientist' => 'Relevan dengan logikamu memecahkan masalah tingkat tinggi menggunakan library seperti Scikit-Learn atau TensorFlow untuk memprediksi masa depan.',
            'AI Researcher' => 'Pas banget dengan minat risetmu merancang eksperimen untuk menguji akurasi model serta semangatmu mengikuti kompetisi data skala besar (seperti Kaggle).',
            'Data Mining Engineer' => 'Sesuai karena kamu paham logika algoritma klasifikasi/clustering dan telaten melakukan preprocessing (menghilangkan noise data) memakai tools seperti RapidMiner.',
            'Big Data Specialist' => 'Relevan dengan kemampuanmu mengeksplorasi kumpulan data berjumlah raksasa (Big Data) dan keahlianmu menguasai teknik pemrosesan teks (Text Mining).',
            'Data Engineer' => 'Cocok dengan kesabaranmu melakukan iterasi eksperimen data berkali-kali dan kemampuanmu mengintegrasikan hasil penambangan ke dalam aplikasi lain.',
            'AR Developer' => 'Pas dengan keahlianmu mengelola koordinat 3D, memanipulasi pencahayaan, dan menggunakan alat pengembangan AR modern seperti Vuforia atau Spark AR.',
            'XR Engineer' => 'Relevan dengan kemampuan koding interaksi objekmu di Unity dan kesabaranmu melakukan pengujian komprehensif pada berbagai perangkat kamera.',
            'Creative Technologist' => 'Sesuai karena kamu bisa membuat dan mengedit aset 3D sendiri (seperti di Blender/Maya) serta memiliki imajinasi spasial yang sangat baik.',
            'VR Developer' => 'Cocok dengan pemahamanmu soal User Experience (UX) di ruang 360 derajat dan keahlianmu menggunakan Unity/Unreal Engine untuk ekosistem VR.',
            'Metaverse Architect' => 'Pas banget dengan impian besarmu menciptakan dan menjelaskan dunia virtual kompleks yang bisa dijelajahi oleh banyak orang secara simultan.',
            'Simulation Engineer' => 'Relevan dengan pemahaman prinsip fisikamu untuk benda di dunia virtual dan keahlianmu merancang interaksi menggunakan motion controller tanpa tombol fisik.',
            'Game Programmer' => 'Sesuai dengan penguasaan bahasa pemprogramanmu (C#/C++) dalam Game Engine dan logikamu merancang sistem skor, nyawa, serta AI musuh.',
            'Gameplay Engineer' => 'Cocok dengan kemampuan kreatifmu merancang mekanik permainan yang seimbang, menantang, sekaligus mampu menyusun skenario misi yang seru.',
            'Technical Artist' => 'Relevan dengan ketelatenanmu mengatur aset animasi dan keluwesanmu bekerja sama dalam tim lintas media (desainer, musisi, programmer).'
        ];

        $deskripsi_kriteria = [
            'mobile' => [
                'kognitif' => 'Pemahaman tentang siklus hidup aplikasi (Activity Life Cycle), penyimpanan data lokal, dan perancangan navigasi.',
                'hardskill' => 'Keahlian pemrograman Java/Kotlin, penggunaan Android Studio, dan integrasi aplikasi dengan API internet.',
                'softskill' => 'Kesabaran menangani bug force close, kolaborasi UI/UX, dan kemampuan menjelaskan cara kerja ke user awam.',
                'minat' => 'Antusiasme menciptakan aplikasi saku praktis dan memantau pembaruan sistem Google Android Developer.',
                'pengalaman' => 'Pembuatan aplikasi Android yang sukses di-build ke HP, publikasi kode, dan kepemilikan sertifikasi mobile.'
            ],
            'web' => [
                'kognitif' => 'Logika perancangan skema database relasional dan alur pengiriman data dari browser menuju server.',
                'hardskill' => 'Penguasaan HTML/CSS/JS, framework modern (Laravel/React), dan keterampilan deployment website.',
                'softskill' => 'Ketelitian menjaga keamanan data, penyelesaian bug tampilan, dan komunikasi fitur dengan klien.',
                'minat' => 'Semangat menciptakan sistem publik yang mudah diakses dan rasa ingin tahu pada teknologi web terbaru.',
                'pengalaman' => 'Portofolio koding web di GitHub, pembuatan sistem informasi utuh, dan proyek website profesional.'
            ],
            'ai' => [
                'kognitif' => 'Pemahaman arsitektur Neural Networks dan logika matriks untuk sistem yang mampu belajar sendiri.',
                'hardskill' => 'Keahlian Python, implementasi teknik Training Model, dan penggunaan tools seperti OpenCV atau NLTK.',
                'softskill' => 'Berpikir kritis terhadap etika AI, senang bereksperimen dengan hal baru, dan kolaborasi otomasi tim.',
                'minat' => 'Hasrat tinggi menciptakan mesin yang bisa "berpikir" dan memantau perkembangan teknologi GPT.',
                'pengalaman' => 'Pembuatan sistem deteksi objek/suara, kepemilikan repositori AI aktif, dan sertifikat kursus kredibel.'
            ],
            'data_analyst' => [
                'kognitif' => 'Pemahaman konsep statistik dasar dan kemampuan mengubah angka mentah menjadi narasi bisnis logis.',
                'hardskill' => 'Penguasaan Excel lanjutan (Pivot/Macro), SQL database, dan pembuatan dashboard (Tableau/PowerBI).',
                'softskill' => 'Ketelitian tinggi memeriksa kebersihan data dan kepercayaan diri mempresentasikan temuan ke atasan.',
                'minat' => 'Ketertarikan bekerja dengan laporan grafik harian dan mencari solusi permasalahan lewat angka.',
                'pengalaman' => 'Pengerjaan proyek analisis data penjualan/akademik dan kepemilikan sertifikasi Data Analytics.'
            ],
            'data_science' => [
                'kognitif' => 'Pemahaman mendalam tentang Supervised/Unsupervised Learning dan perancangan eksperimen akurasi.',
                'hardskill' => 'Koding Python/R, pemanfaatan library Scikit-Learn/TensorFlow, dan pengolahan Big Data (Spark/Cloud).',
                'softskill' => 'Kemampuan problem solving kreatif dan menerjemahkan kebutuhan bisnis menjadi bahasa model data.',
                'minat' => 'Antusiasme menciptakan sistem cerdas prediktif dan konsisten mempelajari algoritma tren terbaru.',
                'pengalaman' => 'Partisipasi di kompetisi (Kaggle/Satria Data) dan rekam jejak pembangunan model prediksi aktif.'
            ],
            'data_mining' => [
                'kognitif' => 'Pemahaman algoritma klasifikasi/clustering dan penentuan variabel yang paling berpengaruh pada data.',
                'hardskill' => 'Keahlian preprocessing data, Text Mining, dan pengoperasian tools seperti RapidMiner atau KNIME.',
                'softskill' => 'Kesabaran iterasi eksperimen berkali-kali dan kemampuan menyederhanakan pola teknis yang rumit.',
                'minat' => 'Rasa penasaran menemukan rahasia tersembunyi dari Big Data dan eksplorasi kumpulan data besar.',
                'pengalaman' => 'Riset penambangan data akademik, publikasi jurnal, dan portofolio penggunaan tools mining.'
            ],
            '3d_ar' => [
                'kognitif' => 'Pemahaman koordinat 3D, manipulasi pencahayaan, dan imajinasi spasial penataan ruang virtual.',
                'hardskill' => 'Keahlian tools AR (Vuforia/Spark AR), pembuatan objek 3D (Blender), dan koding interaksi Unity.',
                'softskill' => 'Perhatian tinggi pada detail estetika, kolaborasi dengan desainer, dan kesabaran saat testing perangkat.',
                'minat' => 'Ketertarikan menggabungkan dunia maya/nyata dan senang bereksperimen dengan filter AR terbaru.',
                'pengalaman' => 'Pembuatan filter AR/aplikasi katalog dan kepemilikan portofolio aset 3D buatan sendiri.'
            ],
            '3d_vr' => [
                'kognitif' => 'Pemahaman User Experience (UX) di ruang 360 derajat dan prinsip fisika untuk objek dunia virtual.',
                'hardskill' => 'Penguasaan Unity/Unreal Engine, optimasi motion sickness, dan koding interaksi VR controller.',
                'softskill' => 'Dedikasi tinggi dalam riset kenyamanan pengguna dan kemampuan kolaborasi lintas media (audio/visual).',
                'minat' => 'Impian menciptakan Metaverse yang bisa dijelajahi banyak orang dan sangat menikmati konten VR.',
                'pengalaman' => 'Pengembangan tur virtual 360/simulasi dan portofolio proyek VR yang siap jalan di headset.'
            ],
            '3d_game' => [
                'kognitif' => 'Logika matematika untuk skor/level dan kemampuan merancang skenario gameplay yang seimbang.',
                'hardskill' => 'Penguasaan C#/C++ dalam Game Engine, pengaturan aset animasi, dan perancangan AI untuk musuh.',
                'softskill' => 'Ketekunan memperbaiki ratusan bug dan keluwesan menerima masukan/feedback dari para player.',
                'minat' => 'Kecintaan mendalam pada industri game dan ambisi merancang game yang dimainkan jutaan orang.',
                'pengalaman' => 'Partisipasi aktif dalam Game Jam/komunitas dan publikasi karya game di platform seperti Itch.io.'
            ]
        ];

        $bar_config = [
            'kognitif' => ['L' => 'K', 'C' => 'c-kognitif', 'N' => 'Kognitif', 'Id' => 90, 'Hex' => '#5DADE2'],
            'hardskill' => ['L' => 'H', 'C' => 'c-hard', 'N' => 'Hard Skills', 'Id' => 85, 'Hex' => '#8E44AD'],
            'softskill' => ['L' => 'S', 'C' => 'c-soft', 'N' => 'Soft Skills', 'Id' => 80, 'Hex' => '#3498DB'],
            'minat' => ['L' => 'M', 'C' => 'c-minat', 'N' => 'Minat', 'Id' => 88, 'Hex' => '#F39C12'],
            'pengalaman' => ['L' => 'P', 'C' => 'c-pengalaman', 'N' => 'Pengalaman', 'Id' => 75, 'Hex' => '#27AE60'],
        ];

        // MENGHITUNG DATA UNTUK WEB DAN CETAK SEKALIGUS
        $terpenuhi_count = 0;
        $tabel_print_data = [];
        $radar_user = [];
        $radar_ideal = [];
        
        foreach($kriteria_list as $krit) {
            $cfg = $bar_config[$krit];
            $score_100 = round(($nilai_user[$krit] / 5.0) * 100);
            $ideal = $cfg['Id'];
            $gap = $score_100 - $ideal;
            $is_terpenuhi = $gap >= 0;
            if($is_terpenuhi) $terpenuhi_count++;
            
            $radar_user[] = $score_100;
            $radar_ideal[] = $ideal;

            $tabel_print_data[] = [
                'nama' => $cfg['N'], 'inisial' => $cfg['L'], 'hex' => $cfg['Hex'],
                'skor' => $score_100, 'ideal' => $ideal, 'gap' => $gap, 'status' => $is_terpenuhi
            ];
        }
    @endphp

    <style>
        .result-container { font-family: 'Poppins', sans-serif; color: #2C3E50; line-height: 1.6; max-width: 900px; margin: 0 auto; padding: 20px 0; display: none; }
        .result-card { background: #FFFFFF; border-radius: 16px; padding: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); margin-bottom: 25px; border: 1px solid #EAEDED; }
        .hero-card { background: linear-gradient(135deg, #1F618D, #2980B9); color: #FFFFFF; border-radius: 16px; padding: 40px 30px; position: relative; overflow: hidden; box-shadow: 0 10px 25px rgba(41, 128, 185, 0.3); margin-bottom: 25px; }
        .hero-badge { background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px; font-size: 12px; display: inline-block; margin-bottom: 15px;}
        .hero-title { font-size: 36px; font-weight: 700; margin: 0 0 10px 0; display: flex; align-items: center; gap: 15px; }
        .hero-subtitle { font-size: 14px; opacity: 0.9; margin-bottom: 25px; }
        .circle-score { position: absolute; right: 40px; top: 50%; transform: translateY(-50%); width: 120px; height: 120px; background: rgba(255,255,255,0.15); border: 2px solid rgba(255,255,255,0.3); border-radius: 50%; display: flex; flex-direction: column; justify-content: center; align-items: center; backdrop-filter: blur(5px); }
        .circle-score h2 { font-size: 38px; margin: 0; line-height: 1; }
        .circle-score span { font-size: 12px; opacity: 0.9; }
        .hero-progress-bg { background: rgba(255,255,255,0.2); height: 12px; border-radius: 10px; width: 60%; position: relative; margin-top: 10px;}
        .hero-progress-fill { background: #F1C40F; height: 100%; border-radius: 10px; box-shadow: 0 0 10px rgba(241, 196, 15, 0.5); }
        .hero-progress-labels { display: flex; width: 60%; justify-content: space-between; font-size: 11px; margin-top: 5px; opacity: 0.8; }
        .section-header { font-size: 13px; color: #2980B9; font-weight: 600; text-transform: uppercase; margin-bottom: 5px; letter-spacing: 1px;}
        .section-title { font-size: 22px; font-weight: 700; margin-top: 0; margin-bottom: 20px; color: #2C3E50; }
        .reasons-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .reason-box { background: #E9F7EF; border: 1px solid #D5F5E3; padding: 15px; border-radius: 10px; display: flex; gap: 15px; align-items: flex-start; }
        .reason-box i { color: #27AE60; font-size: 18px; margin-top: 3px;}
        .reason-box p { margin: 0; font-size: 14px; color: #1E8449; }
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
        .rank-list { width: 100%; border-collapse: collapse; }
        .rank-list td { padding: 15px 0; border-bottom: 1px solid #F2F3F4; vertical-align: middle; }
        .rank-list tr:last-child td { border-bottom: none; }
        .legend-box { background: #F4F6F7; padding: 15px 20px; border-radius: 10px; margin-top: 20px; }
        .legend-title { font-size: 12px; font-weight: 700; color: #7F8C8D; margin-bottom: 10px; display: block; }
        .legend-items { display: flex; gap: 15px; flex-wrap: wrap; }
        .l-item { font-size: 12px; display: flex; align-items: center; gap: 5px; font-weight: 500;}
        .l-dot { width: 12px; height: 12px; border-radius: 50%; }
        .tab-btn { flex: 1; padding: 15px; border: none; background: none; cursor: pointer; font-size: 13px; font-weight: 600; color: #7F8C8D; border-bottom: 3px solid transparent; transition: 0.3s; }
        .tab-btn.active { color: #2980B9; border-bottom: 3px solid #2980B9; background: #F4F9FD; }
        .tab-content { display: none; padding: 25px; animation: fadeIn 0.4s; }
        .table-detail { width: 100%; border-collapse: collapse; font-size: 12px; }
        .table-detail th { text-align: left; padding: 12px; border-bottom: 2px solid #EAEDED; color: #7F8C8D; white-space: nowrap;}
        .table-detail td { padding: 12px; border-bottom: 1px solid #F2F3F4; white-space: nowrap;}
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        details > summary::-webkit-details-marker { display: none; }
        details.detail-animasi summary i.arrow-icon { transition: transform 0.3s ease; }
        details.detail-animasi[open] summary i.arrow-icon { transform: rotate(90deg); }
        details.detail-animasi[open] summary { background-color: #F8FAFC; }
        .alt-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .alt-card { background: #FFFFFF; border: 1px solid #E2E8F0; border-radius: 16px; padding: 24px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); transition: all 0.3s ease; }
        .alt-card:hover { transform: translateY(-4px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); border-color: #CBD5E1; }
        .alt-rank { width: 55px; height: 55px; background: #F1F5F9; border-radius: 14px; display: flex; justify-content: center; align-items: center; font-size: 22px; font-weight: 800; color: #64748B; box-shadow: inset 0 2px 4px rgba(0,0,0,0.03); flex-shrink: 0;}
        .alt-info { flex-grow: 1; }
        .alt-info h4 { margin: 0 0 5px 0; font-size: 17px; font-weight: 700; color: #1E293B; }
        .prospek-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 20px; }
        .tag-pill { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.6); padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; letter-spacing: 0.5px; backdrop-filter: blur(5px); transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.1);}
        .tag-pill:hover { background: rgba(255,255,255,0.3); transform: translateY(-3px); box-shadow: 0 6px 12px rgba(0,0,0,0.15); }
        .tag-pill-dark { background: #FFFFFF; color: #2980B9; border: 1px solid #2980B9; padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600; margin-top: 5px; margin-right: 5px; display: inline-flex; align-items: center; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(41,128,185,0.15); cursor: pointer;}
        .tag-pill-dark:hover { background: #2980B9; color: #FFFFFF; transform: translateY(-3px); box-shadow: 0 5px 10px rgba(41,128,185,0.25); }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="result-container py-6" style="{{ request('print') == 'yes' ? 'display: block;' : 'display: none;' }}" x-data="{ showDetail: false, detailTitle: '', detailText: '' }">
        
        <div class="no-print" style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
            <button onclick="window.print()" style="background-color: #4298B4; color: white; padding: 10px 20px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer; transition: background 0.3s;" onmouseover="this.style.backgroundColor='#2C3E50'" onmouseout="this.style.backgroundColor='#4298B4'">
                <i class="fa-solid fa-print"></i> Cetak Hasil Laporan
            </button>
        </div>

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

           @foreach($kriteria_list as $krit)
                @php
                    $cfg = $bar_config[$krit];
                    $score_100 = round(($nilai_user[$krit] / 5.0) * 100);
                    
                    // KUNCI PERBAIKAN: Ambil nilai ideal dinamis dari Controller
                    $ideal_score = $ideal[$krit] ?? $cfg['Id']; 
                    $is_terpenuhi = $score_100 >= $ideal_score;
                @endphp
                <div class="kompetensi-row" style="margin-bottom: 25px;">
                    <div class="kompetensi-header">
                        <div class="kompetensi-title">
                            <span class="k-icon {{ $cfg['C'] }}">{{ $cfg['L'] }}</span> {{ $cfg['N'] }}
                        </div>
                        <div class="k-stats">
                            {{-- Ganti $cfg['Id'] jadi $ideal_score --}}
                            <strong>{{ $score_100 }}</strong> / {{ $ideal_score }} ideal
                            <span class="badge" style="background: {{ $is_terpenuhi ? '#E9F7EF' : '#FEF9E7' }}; color: {{ $is_terpenuhi ? '#27AE60' : '#F39C12' }};">
                                {{ $is_terpenuhi ? '✓ Terpenuhi' : 'Perlu Ditingkatkan' }}
                            </span>
                        </div>
                    </div>
                    <div class="bar-bg">
                        <div class="bar-fill {{ $cfg['C'] }}" style="width: {{ $score_100 }}%;"></div>
                    </div>
                    
                    <div style="margin-top: 10px; font-size: 11.5px; color: #64748B; background: #F8FAFC; padding: 10px 14px; border-radius: 8px; border-left: 3px solid {{ $cfg['Hex'] }}; line-height: 1.6;">
                        <strong style="color: #475569;">Interpretasi:</strong> {{ $deskripsi_kriteria[$juara1][$krit] }}
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

            <table class="rank-list" style="width: 100%;">
                @for($i = 3; $i < count($urutan_bidang); $i++)
                    @php 
                        $b_id = $urutan_bidang[$i];
                        $p = formatPersen($ranking[$b_id]); 
                        $kat = getKategori($p);
                        
                        $kamus_analisis = [
                            'data_analyst' => "Skor $p% karena analisis datamu belum kuat di sisi teknis SQL/Excel. Perlu perbanyak latihan studi kasus nyata agar insight yang kamu buat lebih akurat.",
                            'data_mining' => "Skor $p% karena pemahaman alur kerja pengolahan data mentah menjadi informasi (preprocessing) masih perlu diasah. Cobalah pelajari alur CRISP-DM.",
                            'data_science' => "Skor $p% karena dasar statistik dan logika model prediktif perlu diperkuat lagi agar hasil analisis tidak sekadar asumsi.",
                            'ai' => "Skor $p% karena pemahaman tentang cara mesin 'belajar' (algoritma ML) masih perlu pendalaman teori. Fokuslah pada dasar logika pemrograman AI.",
                            'web' => "Skor $p% karena integrasi antara tampilan (frontend) dan database (backend) kamu belum sepenuhnya sinkron. Perbanyak membuat proyek web utuh.",
                            'mobile' => "Skor $p% karena pemahamanmu tentang alur aplikasi mobile (Android/iOS) masih perlu ditingkatkan agar aplikasi lebih stabil dan cepat.",
                            '3d_ar' => "Skor $p% karena manipulasi objek 3D di ruang nyata masih perlu latihan lebih banyak. Cobalah membuat filter AR sederhana untuk memperdalam teknik ini.",
                            '3d_vr' => "Skor $p% karena kamu butuh lebih banyak latihan di simulasi lingkungan virtual agar pengalaman user (UX) terasa lebih nyata dan tidak kaku.",
                            '3d_game' => "Skor $p% karena logika di balik mekanik permainan (game engine) perlu dipelajari lagi agar interaksi karakter terasa lebih natural."
                        ];
                        $penjelasan = isset($kamus_analisis[$b_id]) ? $kamus_analisis[$b_id] : "Skor $p% pada bidang ini menunjukkan perlunya tinjauan ulang pada materi fundamental untuk meningkatkan kesiapan karier.";
                    @endphp
                    <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #EAEDED;">
                            <div x-data="{ open: false }">
                                <div @click="open = !open" class="hover:bg-slate-50 transition-colors p-2 -mx-2 rounded-lg cursor-pointer">
                                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                                        <div style="font-weight: 700; color: #334155; display: flex; align-items: center; gap: 8px;">
                                            {{ $i+1 }}. {{ formatNama($b_id) }}
                                            <i class="fa-solid fa-chevron-down text-slate-400 text-xs transition-transform duration-300" :class="open ? 'rotate-180' : ''"></i>
                                        </div>
                                        <div style="font-weight: 700; color: {{ $kat['color'] }};">{{ $p }}%</div>
                                    </div>
                                    <div class="bar-bg" style="height: 6px; background: #E2E8F0; border-radius: 3px;">
                                        <div class="bar-fill" style="width: {{ $p }}%; height: 100%; background: {{ $kat['color'] }}; border-radius: 3px;"></div>
                                    </div>
                                </div>
                                <div x-show="open" x-transition style="display: none; background: #F8FAFC; border-left: 4px solid {{ $kat['color'] }}; padding: 12px; border-radius: 0 4px 4px 0; font-size: 13px; color: #475569; line-height: 1.5; margin-top: 10px;">
                                    <strong><i class="fa-solid fa-lightbulb" style="color: {{ $kat['color'] }}; margin-right: 5px;"></i> Analisis Performa:</strong><br>
                                    {{ $penjelasan }}
                                </div>
                            </div>
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

    </div>

    <!-- ========================================================================= -->
    <!-- 🔥 JURUS SAPU JAGAT: CSS KHUSUS PRINT & KANVAS RAHASIA 🔥 -->
    <!-- ========================================================================= -->
    <style>
        #kanvas-cetak-rahasia { display: none; } /* Tersembunyi saat web biasa */

        @media print {
            @page { size: A4 portrait; margin: 0; } /* Kertas full tanpa margin bawaan browser */
            * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; box-sizing: border-box; }
            
            body { background: white !important; margin: 0 !important; padding: 0 !important; }
            body * { visibility: hidden; }
            nav, aside, header, footer, .result-container, #loading-screen, .no-print { 
                display: none !important; 
            }

            #kanvas-cetak-rahasia, #kanvas-cetak-rahasia * { visibility: visible; }
            
            #kanvas-cetak-rahasia { 
                display: block !important; 
                position: absolute; left: 0; top: 0; width: 100%;
                font-family: 'Poppins', sans-serif; color: #1E293B; background: white;
            }

            /* INI KUNCI RAHASIANYA BIAR GAK TUMPAH JADI 3 HALAMAN */
            .kertas-a4 {
                width: 210mm;
                height: 297mm; /* Tinggi pasti kertas A4 */
                max-height: 297mm;
                padding: 12mm 15mm; /* Spasi dalam kertas diperkecil */
                margin: 0 auto;
                overflow: hidden; /* Mengunci konten agar tidak bocor ke bawah */
                position: relative;
            }

            .page-break { page-break-before: always !important; }
        }
    </style>

    <div id="kanvas-cetak-rahasia">
        
        <!-- ================= HALAMAN 1 (DIJAMIN PAS 1 LEMBAR) ================= -->
        <div class="kertas-a4">
            
            <!-- KOP SURAT -->
            <div style="border-bottom: 2px solid #CBD5E1; padding-bottom: 10px; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <h1 style="font-size: 22pt; font-weight: 800; color: #2980B9; margin: 0; line-height: 1;">Career Insight</h1>
                    <p style="font-size: 7.5pt; font-weight: 700; color: #9B59B6; text-transform: uppercase; letter-spacing: 2px; margin: 4px 0 0 0;">Discover Your Best Career Path</p>
                </div>
                <div style="text-align: right; color: #334155;">
                    <h2 style="font-size: 10pt; font-weight: 800; margin: 0 0 4px 0;">Laporan Hasil Rekomendasi Karier</h2>
                    <p style="font-size: 7pt; margin: 0 0 2px 0;">Tanggal Cetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                    <p style="font-size: 7pt; margin: 0;">Sistem Pendukung Keputusan (SPK)</p>
                </div>
            </div>

            <!-- KOTAK IDENTITAS -->
            <div style="border: 1px solid #CBD5E1; border-radius: 8px; padding: 10px 15px; display: flex; justify-content: space-between; margin-bottom: 15px; background: #F8FAFC;">
                <div><p style="font-size: 6.5pt; font-weight: 700; color: #64748B; margin: 0 0 2px 0;">NAMA</p><p style="font-size: 9pt; font-weight: 800; margin: 0;">{{ Auth::user()->name }}</p></div>
                <div><p style="font-size: 6.5pt; font-weight: 700; color: #64748B; margin: 0 0 2px 0;">NIM</p><p style="font-size: 9pt; font-weight: 800; margin: 0;">{{ Auth::user()->nim ?? '-' }}</p></div>
                <div><p style="font-size: 6.5pt; font-weight: 700; color: #64748B; margin: 0 0 2px 0;">PROGRAM STUDI</p><p style="font-size: 9pt; font-weight: 800; margin: 0;">Teknik Informatika</p></div>
                <div><p style="font-size: 6.5pt; font-weight: 700; color: #64748B; margin: 0 0 2px 0;">TANGGAL ASESMEN</p><p style="font-size: 9pt; font-weight: 800; margin: 0;">{{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}</p></div>
            </div>

            <!-- HERO REKOMENDASI UTAMA -->
            <p style="font-size: 8pt; font-weight: 700; color: #2980B9; letter-spacing: 1px; margin-bottom: 6px;">REKOMENDASI UTAMA — PERINGKAT #1</p>
            <div style="background: #1F618D; border-radius: 12px; padding: 15px 20px; color: white; display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <div style="flex-grow: 1;">
                    <span style="font-size: 7.5pt; background: rgba(255,255,255,0.2); padding: 4px 10px; border-radius: 12px;"><i class="fa-solid fa-trophy" style="color:#F1C40F;"></i> Rekomendasi Karier Utama</span>
                    <h1 style="font-size: 24pt; font-weight: 800; margin: 8px 0;">{{ formatNama($juara1) }}</h1>
                    <p style="font-size: 9pt; margin: 0 0 8px 0;">Tingkat Kecocokan: <strong>{{ $persen_j1 }}%</strong> &middot; Kategori: {{ $kategori_j1['text'] }}</p>
                    <div style="width: 70%; height: 6px; background: rgba(255,255,255,0.2); border-radius: 4px; margin-bottom: 10px;">
                        <div style="width: {{ $persen_j1 }}%; height: 100%; background: #F1C40F; border-radius: 4px;"></div>
                    </div>
                </div>
                <div style="width: 80px; height: 80px; border: 3px solid rgba(255,255,255,0.4); border-radius: 50%; display: flex; flex-direction: column; justify-content: center; align-items: center; background: rgba(255,255,255,0.1);">
                    <h2 style="font-size: 22pt; font-weight: 800; margin: 0; line-height: 1;">{{ $persen_j1 }}</h2>
                    <span style="font-size: 6pt; margin-top: 2px;">% COCOK</span>
                </div>
            </div>

            <!-- MENGAPA DIREKOMENDASIKAN -->
            <p style="font-size: 8pt; font-weight: 700; color: #2980B9; letter-spacing: 1px; margin-bottom: 6px;">MENGAPA DIREKOMENDASIKAN?</p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 15px;">
                <div style="background: #F0FDF4; border: 1px solid #DCFCE7; border-radius: 8px; padding: 10px; font-size: 8.5pt; color: #166534; display: flex; gap: 8px;">
                    <i class="fa-solid fa-check" style="margin-top: 2px;"></i><p style="margin:0;">Kemampuan kognitif sangat tinggi dan sesuai tuntutan profesi {{ formatNama($juara1) }}.</p>
                </div>
                <div style="background: #F0FDF4; border: 1px solid #DCFCE7; border-radius: 8px; padding: 10px; font-size: 8.5pt; color: #166534; display: flex; gap: 8px;">
                    <i class="fa-solid fa-check" style="margin-top: 2px;"></i><p style="margin:0;">Minat pada analisis dan eksplorasi bidang ini sangat relevan.</p>
                </div>
                <div style="background: #F0FDF4; border: 1px solid #DCFCE7; border-radius: 8px; padding: 10px; font-size: 8.5pt; color: #166534; display: flex; gap: 8px;">
                    <i class="fa-solid fa-check" style="margin-top: 2px;"></i><p style="margin:0;">Hard skill teknis sangat mendukung kebutuhan utama di industri ini.</p>
                </div>
                <div style="background: #F0FDF4; border: 1px solid #DCFCE7; border-radius: 8px; padding: 10px; font-size: 8.5pt; color: #166534; display: flex; gap: 8px;">
                    <i class="fa-solid fa-check" style="margin-top: 2px;"></i><p style="margin:0;">Soft skill dan pengalaman akademik selaras dengan jalan karier ini.</p>
                </div>
            </div>

            <!-- ANALISIS KOMPETENSI BAR -->
            <div style="border: 1px solid #E2E8F0; border-radius: 12px; padding: 15px; margin-bottom: 15px;">
                <p style="font-size: 7.5pt; font-weight: 700; color: #94A3B8; letter-spacing: 1px; margin: 0 0 3px 0;">DETAIL PENILAIAN</p>
                <h3 style="font-size: 14pt; font-weight: 800; margin: 0 0 15px 0;">Analisis Kompetensi — vs. Standar Ideal</h3>
                
                @foreach($tabel_print_data as $data)
                <div style="margin-bottom: 10px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 4px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span style="background: {{ $data['hex'] }}; color: white; width: 18px; height: 18px; display: flex; justify-content: center; align-items: center; border-radius: 4px; font-size: 8pt; font-weight: bold;">{{ $data['inisial'] }}</span>
                            <span style="font-size: 10pt; font-weight: 700;">{{ $data['nama'] }}</span>
                        </div>
                        <div style="font-size: 9pt;">
                            <strong style="color:#2980B9;">{{ $data['skor'] }}</strong> <span style="color:#94A3B8;">/ {{ $data['ideal'] }} ideal</span>
                            <span style="font-size: 7pt; font-weight: bold; margin-left: 10px; padding: 3px 8px; border-radius: 12px; background: {{ $data['status'] ? '#E9F7EF' : '#FEF9E7' }}; color: {{ $data['status'] ? '#27AE60' : '#F39C12' }};">{{ $data['status'] ? '✓ Terpenuhi' : 'Perlu Ditingkatkan' }}</span>
                        </div>
                    </div>
                    <div style="width: 100%; height: 6px; background: #E2E8F0; border-radius: 3px;">
                        <div style="width: {{ $data['skor'] }}%; height: 100%; background: {{ $data['hex'] }}; border-radius: 3px;"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- ALTERNATIF 2 & 3 -->
            <p style="font-size: 8pt; font-weight: 700; color: #2980B9; letter-spacing: 1px; margin-bottom: 6px;">ALTERNATIF KARIER TERBAIK</p>
            <div style="display: flex; gap: 15px; margin-bottom: 15px;">
                @foreach([$juara2 => 2, $juara3 => 3] as $alt_id => $pos)
                @php $p = formatPersen($ranking[$alt_id]); $kat = getKategori($p); @endphp
                <div style="flex: 1; border: 1px solid #E2E8F0; border-radius: 12px; padding: 12px; display: flex; gap: 12px; align-items: center; background: #F8FAFC;">
                    <div style="font-size: 14pt; font-weight: 800; color: #64748B; background: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center; border: 1px solid #E2E8F0;">#{{ $pos }}</div>
                    <div style="flex-grow: 1;">
                        <h4 style="margin: 0 0 3px 0; font-size: 10pt; font-weight: 800;">{{ formatNama($alt_id) }}</h4>
                        <div style="width: 100%; height: 5px; background: #E2E8F0; border-radius: 3px; margin-bottom: 3px;">
                            <div style="width: {{ $p }}%; height: 100%; background: {{ $kat['color'] }}; border-radius: 3px;"></div>
                        </div>
                        <span style="font-size: 7.5pt; color: #64748B;">Kecocokan: {{ $p }}% <strong style="color: {{ $kat['color'] }};">{{ $kat['text'] }}</strong></span>
                    </div>
                </div>
                @endforeach
            </div>
            
            

            <!-- Footer Halaman 1 -->
            <div style="position: absolute; bottom: 12mm; left: 15mm; right: 15mm; font-size: 6.5pt; color: #94A3B8; display: flex; justify-content: space-between; border-top: 1px solid #E2E8F0; padding-top: 8px;">
                <span>Dicetak dari <strong>Career Insight</strong> &middot; Sistem Pendukung Keputusan Rencana Karier</span>
                <span>Universitas Darussalam Gontor &middot; Teknik Informatika</span>
            </div>
        </div>

        <!-- ================= HALAMAN 2 (DIJAMIN PAS 1 LEMBAR) ================= -->
        <div class="kertas-a4 page-break">
            
            <div style="border-bottom: 1px solid #CBD5E1; padding-bottom: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: baseline; gap: 15px;">
                    <h1 style="font-size: 16pt; font-weight: 800; color: #2980B9; margin: 0;">Career Insight</h1>
                    <span style="font-size: 8pt; font-weight: 700; color: #9B59B6; text-transform: uppercase; letter-spacing: 1px;">Lanjutan Laporan</span>
                </div>
                <div style="text-align: right; font-size: 7.5pt; color: #64748B;">
                    <p style="margin: 0 0 2px 0;"><strong>{{ Auth::user()->name }}</strong> &middot; NIM {{ Auth::user()->nim ?? '-' }}</p>
                    <p style="margin: 0;">Teknik Informatika &middot; {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}</p>
                </div>
            </div>

            <!-- Peringkat Lengkap -->
            <div style="border: 1px solid #E2E8F0; border-radius: 12px; padding: 12px;">
                <h3 style="font-size: 10pt; margin: 0 0 8px 0; color:#1E293B;">Peringkat Lengkap Semua Karier</h3>
                @for($i = 3; $i < count($urutan_bidang); $i++)
                    @php $b_id = $urutan_bidang[$i]; $p = formatPersen($ranking[$b_id]); $kat = getKategori($p); @endphp
                    <div style="display: flex; align-items: center; margin-bottom: 4px; font-size: 7.5pt;">
                        <span style="width: 140px; color:#334155;">{{ $i+1 }}. {{ formatNama($b_id) }}</span>
                        <div style="flex-grow: 1; height: 4px; background: #E2E8F0; border-radius: 2px; margin: 0 10px;">
                            <div style="width: {{ $p }}%; height: 100%; background: {{ $kat['color'] }}; border-radius: 2px;"></div>
                        </div>
                        <span style="width: 30px; text-align: right; color: {{ $kat['color'] }}; font-weight: bold;">{{ $p }}%</span>
                    </div>
                @endfor
                
                <div style="background: #F8FAFC; border-radius: 6px; padding: 8px; margin-top: 10px;">
                    <span style="font-size: 6pt; font-weight: 700; color: #94A3B8; display: block; margin-bottom: 4px;">KETERANGAN KATEGORI</span>
                    <div style="display: flex; gap: 12px; font-size: 6.5pt; color:#64748B;">
                        <span style="display:flex; align-items:center; gap:3px;"><div style="width:6px; height:6px; border-radius:50%; background:#27AE60;"></div> Sangat Cocok (80-100%)</span>
                        <span style="display:flex; align-items:center; gap:3px;"><div style="width:6px; height:6px; border-radius:50%; background:#2980B9;"></div> Cocok (60-79%)</span>
                        <span style="display:flex; align-items:center; gap:3px;"><div style="width:6px; height:6px; border-radius:50%; background:#F39C12;"></div> Cukup (40-59%)</span>
                        <span style="display:flex; align-items:center; gap:3px;"><div style="width:6px; height:6px; border-radius:50%; background:#E74C3C;"></div> Kurang (<40%)</span>
                    </div>
                </div>
            </div>

            <!-- 4 KOTAK RINGKASAN ATAS -->
            <div style="display: flex; border: 1px solid #CBD5E1; border-radius: 12px; margin-top: 20px; margin-bottom: 20px; text-align: center; overflow: hidden;">
                <div style="flex: 1; padding: 15px; border-right: 1px solid #CBD5E1;">
                    <p style="font-size: 7pt; font-weight: 700; color: #64748B; margin: 0 0 5px 0;">REKOMENDASI #1</p>
                    <h2 style="font-size: 16pt; font-weight: 800; color: #1F618D; margin: 0 0 5px 0;">{{ formatNama($juara1) }}</h2>
                    <p style="font-size: 7.5pt; color:#94A3B8; margin:0;">Bidang terbaik untukmu</p>
                </div>
                <div style="flex: 1; padding: 15px; border-right: 1px solid #CBD5E1;">
                    <p style="font-size: 7pt; font-weight: 700; color: #64748B; margin: 0 0 5px 0;">TINGKAT KECOCOKAN</p>
                    <h2 style="font-size: 16pt; font-weight: 800; color: {{ $kategori_j1['color'] }}; margin: 0 0 5px 0;">{{ $persen_j1 }}%</h2>
                    <p style="font-size: 7.5pt; color:#94A3B8; margin:0;">{{ $kategori_j1['text'] }}</p>
                </div>
                <div style="flex: 1; padding: 15px; border-right: 1px solid #CBD5E1;">
                    <p style="font-size: 7pt; font-weight: 700; color: #64748B; margin: 0 0 5px 0;">KOMPETENSI TERPENUHI</p>
                    <h2 style="font-size: 16pt; font-weight: 800; color: #8E44AD; margin: 0 0 5px 0;">{{ $terpenuhi_count }} / 5</h2>
                    <p style="font-size: 7.5pt; color:#94A3B8; margin:0;">Cek detail di tabel</p>
                </div>
                <div style="flex: 1; padding: 15px; background: #F8FAFC;">
                    <p style="font-size: 7pt; font-weight: 700; color: #64748B; margin: 0 0 5px 0;">METODE SPK</p>
                    <h2 style="font-size: 14pt; font-weight: 800; color: #F39C12; margin: 0; line-height: 1.2;">AHP+PM<br><span style="font-size: 9pt; color:#64748B;">+ TOPSIS</span></h2>
                </div>
            </div>

            <!-- TABEL PERBANDINGAN PROFIL -->
            <div style="border: 1px solid #E2E8F0; border-radius: 12px; padding: 20px;">
                <p style="font-size: 7.5pt; font-weight: 700; color: #94A3B8; letter-spacing: 1px; margin: 0 0 3px 0;">RINGKASAN KOMPETENSI</p>
                <h3 style="font-size: 15pt; font-weight: 800; margin: 0 0 5px 0;">Perbandingan Profil vs. Standar Ideal</h3>
                <p style="font-size: 8.5pt; color:#64748B; margin: 0 0 15px 0;">Bidang Rekomendasi: <strong>{{ formatNama($juara1) }}</strong> &middot; Metode: AHP + Profile Matching + TOPSIS</p>
                
                <table style="width: 100%; border-collapse: collapse; font-size: 9pt; text-align: center;">
                    <thead>
                        <tr style="background: #F0F7FA; border-top: 1px solid #CBD5E1; border-bottom: 2px solid #CBD5E1;">
                            <th style="padding: 12px; text-align: left; color:#334155;">Kompetensi</th>
                            <th style="padding: 12px; color:#334155;">Skor Kamu</th>
                            <th style="padding: 12px; color:#334155;">Standar Ideal</th>
                            <th style="padding: 12px; color:#334155;">Gap</th>
                            <th style="padding: 12px; color:#334155;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tabel_print_data as $data)
                        <tr style="border-bottom: 1px solid #E2E8F0;">
                            <td style="padding: 12px; text-align: left;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <span style="background: {{ $data['hex'] }}; color: white; width: 22px; height: 22px; display: flex; justify-content: center; align-items: center; border-radius: 6px; font-weight: bold; font-size: 8.5pt;">{{ $data['inisial'] }}</span>
                                    <span style="font-weight: 700; font-size: 10pt;">{{ $data['nama'] }}</span>
                                </div>
                            </td>
                            <td style="padding: 12px; font-size: 12pt; font-weight: 800;">{{ $data['skor'] }}</td>
                            <td style="padding: 12px; font-size: 11pt; color: #64748B;">{{ $data['ideal'] }}</td>
                            <td style="padding: 12px; font-size: 11pt; font-weight: 800; color: {{ $data['gap'] >= 0 ? '#27AE60' : '#E74C3C' }};">{{ $data['gap'] > 0 ? '+'.$data['gap'] : $data['gap'] }}</td>
                            <td style="padding: 12px;">
                                <span style="font-size: 7.5pt; font-weight: bold; padding: 5px 10px; border-radius: 20px; border: 1px solid {{ $data['status'] ? '#A7F3D0' : '#FDE68A' }}; background: {{ $data['status'] ? '#F0FDF4' : '#FEF9E7' }}; color: {{ $data['status'] ? '#166534' : '#B45309' }};">
                                    {{ $data['status'] ? '✓ Terpenuhi' : 'Perlu Ditingkatkan' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 12px; margin-top: 15px; font-size: 8pt; color: #475569; line-height: 1.6;">
                    <strong>Keterangan:</strong> Skor dihitung dari nilai input kuesioner (skala 1–5) yang dikonversi ke persentase. Gap positif (+) berarti skor kamu melebihi standar ideal profesi. Gap negatif (–) berarti aspek tersebut masih perlu pengembangan lebih lanjut agar kamu lebih siap bersaing di industri IT.
                </div>
            </div>

            <!-- Footer Halaman 2 -->
            <div style="position: absolute; bottom: 12mm; left: 15mm; right: 15mm; font-size: 6.5pt; color: #94A3B8; display: flex; justify-content: space-between; border-top: 1px solid #E2E8F0; padding-top: 8px;">
                <span>Dicetak dari <strong>Career Insight</strong> &middot; Sistem Pendukung Keputusan Rencana Karier &middot; Universitas Darussalam Gontor</span>
                <span>Hal. 2 / 2</span>
            </div>
            
        </div>
    </div>
    <!-- ========================================================================= -->
    <!-- 🔥 BATAS AKHIR KANVAS RAHASIA 🔥 -->
    <!-- ========================================================================= -->

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
                    { label: 'Skor Kamu', data: <?php echo json_encode($radar_user); ?>, backgroundColor: 'rgba(142, 68, 173, 0.2)', borderColor: '#8E44AD', pointBackgroundColor: '#8E44AD', borderWidth: 2 },
                    { label: 'Standar Ideal', data: [ {{ $ideal['kognitif'] ?? 80 }}, {{ $ideal['hardskill'] ?? 80 }}, {{ $ideal['softskill'] ?? 80 }}, {{ $ideal['minat'] ?? 80 }}, {{ $ideal['pengalaman'] ?? 80 }} ], borderColor: 'rgba(149, 165, 166, 0.5)', borderDash: [5, 5], borderWidth: 2, pointRadius: 0 }
                ]
            },
            options: {
                responsive: true,
                scales: { r: { ticks: { display: true, stepSize: 20, min: 0, max: 100 }, pointLabels: { font: { size: 13, weight: 'bold' } } } },
                plugins: { legend: { position: 'bottom' }, tooltip: { callbacks: { label: function(context) { return context.dataset.label + ': ' + context.raw; } } } }
            },
            plugins: [{
                afterDatasetsDraw: function(chart) {
                    var ctx = chart.ctx;
                    chart.data.datasets.forEach(function(dataset, i) {
                        var meta = chart.getDatasetMeta(i);
                        if (!meta.hidden && i === 0) { 
                            meta.data.forEach(function(element, index) {
                                ctx.fillStyle = '#8E44AD'; ctx.font = 'bold 12px Poppins'; ctx.textAlign = 'center'; ctx.fillText(dataset.data[index], element.x, element.y - 10);
                            });
                        }
                    });
                }
            }]
        });

        document.addEventListener("DOMContentLoaded", function() {
            const isPrint = new URLSearchParams(window.location.search).get('print') === 'yes';
            
            if (isPrint) {
                // JIKA DARI TOMBOL CETAK RIWAYAT: Langsung buka menu PDF secepat kilat!
                setTimeout(function() { 
                    window.print(); 
                }, 300); 
            } else {
                // JIKA DARI ISI KUESIONER: Jalankan loading 3 detik muter-muter
                setTimeout(function() {
                    let resultContainer = document.querySelector(".result-container");
                    if(resultContainer) resultContainer.style.display = "block";
                    
                    let loadingScreen = document.getElementById("loading-screen");
                    if(loadingScreen) {
                        loadingScreen.style.opacity = "0";
                        setTimeout(function() { loadingScreen.style.display = "none"; }, 800);
                    }
                }, 3000);
            }
        });
    </script>

    <script>
        // Script ini akan berjalan otomatis saat halaman selesai loading
        window.onload = function() {
            // Cek apakah di URL ada titipan pesan "?print=yes"
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('print') === 'yes') {
                // Tunggu sebentar (biar layar loading hilang dulu), lalu otomatis PRINT!
                setTimeout(function() { 
                    window.print(); 
                }, 1000); 
            }
        }
    </script>

</x-app-layout>