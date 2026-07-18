<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Career Insight') }} - Temukan Karier IT Terbaikmu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-800 selection:bg-[#3B8AA7] selection:text-white">

    <!-- TOPBAR: 100 Tahun Gontor -->
    <div class="bg-[#1F5064] text-white text-xs md:text-sm text-center py-2.5 font-medium flex items-center justify-center gap-2 px-4 shadow-sm relative z-50">
        <span>🕌 Dalam rangka memperingati</span>
        <span class="font-bold text-[#F4C856]">100 Tahun Pondok Modern Darussalam Gontor 1926 – 2026</span>
        <span>🎓</span>
    </div>

    <!-- NAVBAR UTAMA -->
    <nav class="bg-white py-4 px-6 md:px-12 flex justify-between items-center shadow-sm sticky top-0 z-50">
        <div class="flex items-center gap-6">
            <!-- Career Insight Logo -->
            <a href="#" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                <div class="h-10 w-10 bg-slate-100 rounded-full flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo aja.png') }}" class="h-8 object-contain" alt="Logo">
                </div>
                <div class="flex flex-col">
                    <span class="text-[#88619A] font-extrabold text-lg leading-none tracking-tight">Career Insight</span>
                    <span class="text-[#4298B4] text-[9px] font-medium italic mt-0.5">— Discover Your Best Career Path —</span>
                </div>
            </a>
            
            <!-- Divider -->
            <div class="h-8 w-px bg-slate-200 hidden lg:block"></div>
            
            <!-- UNIDA Logo -->
            <div class="hidden lg:flex items-center gap-3">
                <img src="{{ asset('images/Logo Universitas Darussalam Gontor.png') }}" class="h-9" alt="UNIDA Logo">
                <div class="flex flex-col">
                    <span class="text-[#153852] font-bold text-xs leading-tight">Universitas<br>Darussalam Gontor</span>
                    <span class="text-slate-500 text-[9px]">Teknik Informatika</span>
                </div>
            </div>
        </div>

       <!-- Center Links -->
        <div class="hidden lg:flex items-center gap-8 text-sm font-bold text-slate-500">
            <a href="#beranda" class="nav-link text-[#3B8AA7] transition-colors duration-300">Beranda</a>
            <a href="#cara-kerja" class="nav-link hover:text-[#3B8AA7] transition-colors duration-300">Cara kerja</a>
            <a href="#jalur-karier" class="nav-link hover:text-[#3B8AA7] transition-colors duration-300">9 Jalur karier</a>
        </div>

        <!-- Action Button -->
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="bg-[#3B8AA7] text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-[#2B6C86] transition-all flex items-center gap-2 shadow-md shadow-[#3B8AA7]/30">
                    Masuk Dashboard &rarr;
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-[#2B6C86] text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-[#3B8AA7] transition-all flex items-center gap-2">
                    Mulai asesmen &rarr;
                </a>
            @endauth
        </div>
    </nav>

<!-- HERO SECTION (Sesuai warna halaman Login) -->
    <section id="beranda" class="bg-gradient-to-br from-[#3B8AA7] to-[#2B6C86] text-white pt-20 pb-36 px-6 md:px-12 relative overflow-hidden">
        
        <!-- Dekorasi Bulat ala Halaman Login -->
        <div class="absolute top-[-10%] left-[-5%] w-[400px] h-[400px] bg-white/5 rounded-full"></div>
        <div class="absolute bottom-[-20%] right-10 w-[500px] h-[500px] bg-white/5 rounded-full"></div>
        <div class="absolute top-[20%] right-[-10%] w-[300px] h-[300px] bg-white/10 rounded-full blur-[80px]"></div>
        
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-12 relative z-10">
            <!-- Left Text Content -->
            <div class="flex-1 space-y-7 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 rounded-full border border-white/20 text-[11px] font-bold text-white/90 tracking-wider backdrop-blur-sm">
                    <i class="fa-solid fa-shield-halved"></i> SISTEM PENDUKUNG KEPUTUSAN KARIER
                </div>
                
                <h1 class="text-4xl lg:text-6xl font-extrabold leading-[1.15]">
                    @auth
                        Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋<br>
                    @else
                    @endauth
                    Temukan Karier IT Terbaikmu Bersama <span class="text-[#F4C856]">Career Insight.</span>
                </h1>
                
                <div class="bg-white/10 border border-white/20 rounded-lg p-3 inline-flex items-center gap-3 backdrop-blur-sm">
                    <span class="text-lg">🎓</span>
                    <span class="text-xs md:text-sm text-white/90 leading-tight">Sistem rekomendasi resmi untuk mahasiswa Teknik Informatika —<br>Universitas Darussalam Gontor</span>
                </div>
                
                <p class="text-white/90 text-base md:text-lg leading-relaxed max-w-lg">
                    Platform rekomendasi karier berbasis SPK yang menganalisis kompetensi, minat, dan kepribadianmu untuk menentukan jalur karier IT yang paling sesuai.
                </p>
                
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="{{ route('login') }}" class="bg-white text-[#3B8AA7] px-8 py-3.5 rounded-xl font-bold hover:bg-slate-100 hover:scale-105 transition-all duration-300 flex items-center gap-2 shadow-lg shadow-black/10">
                        Mulai Asesmen &rarr;
                    </a>
                    <a href="#cara-kerja" class="bg-white/10 text-white px-8 py-3.5 rounded-xl font-bold hover:bg-white/20 transition-all border border-white/30 backdrop-blur-sm">
                        Lihat Cara Kerja
                    </a>
                </div>
            </div>

            <!-- Right Mockup Card -->
            <div class="flex-1 w-full max-w-md hidden md:block">
                <!-- Ubah warna card mock-up jadi sedikit transparan biar nyatu sama background -->
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-7 shadow-2xl relative">
                    <h3 class="text-white/80 text-[10px] font-extrabold tracking-widest uppercase mb-6">Preview Analisis Kompetensi</h3>
                    
                    <div class="space-y-5">
                        <!-- Bar Item -->
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded bg-white/20 flex items-center justify-center font-bold text-sm text-white">K</div>
                            <div class="flex-1 space-y-1.5">
                                <span class="text-xs font-semibold text-white">Kognitif</span>
                                <div class="h-1.5 bg-black/20 rounded-full overflow-hidden">
                                    <div class="h-full bg-[#F4C856] rounded-full" style="width: 82%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-white w-6 text-right">82</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded bg-white/20 flex items-center justify-center font-bold text-sm text-white">H</div>
                            <div class="flex-1 space-y-1.5">
                                <span class="text-xs font-semibold text-white">Hard Skills</span>
                                <div class="h-1.5 bg-black/20 rounded-full overflow-hidden">
                                    <div class="h-full bg-[#F4C856] rounded-full" style="width: 90%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-white w-6 text-right">90</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded bg-white/20 flex items-center justify-center font-bold text-sm text-white">S</div>
                            <div class="flex-1 space-y-1.5">
                                <span class="text-xs font-semibold text-white">Soft Skills</span>
                                <div class="h-1.5 bg-black/20 rounded-full overflow-hidden">
                                    <div class="h-full bg-[#F4C856] rounded-full" style="width: 76%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-white w-6 text-right">76</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded bg-white/20 flex items-center justify-center font-bold text-sm text-white">M</div>
                            <div class="flex-1 space-y-1.5">
                                <span class="text-xs font-semibold text-white">Minat</span>
                                <div class="h-1.5 bg-black/20 rounded-full overflow-hidden">
                                    <div class="h-full bg-[#F4C856] rounded-full" style="width: 92%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-white w-6 text-right">92</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded bg-white/20 flex items-center justify-center font-bold text-sm text-white">P</div>
                            <div class="flex-1 space-y-1.5">
                                <span class="text-xs font-semibold text-white">Pengalaman</span>
                                <div class="h-1.5 bg-black/20 rounded-full overflow-hidden">
                                    <div class="h-full bg-[#F4C856] rounded-full" style="width: 68%"></div>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-white w-6 text-right">68</span>
                        </div>
                    </div>
                    
                    <div class="mt-8 bg-white/10 p-4 rounded-xl border border-white/20 flex flex-col justify-center items-center text-center gap-1 backdrop-blur-sm">
                        <span class="text-[10px] font-bold text-white/80 flex items-center gap-1">
                            🏆 Rekomendasi terbaik untukmu
                        </span>
                        <span class="text-lg font-bold text-[#F4C856]">Data Science — 87% cocok</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="max-w-6xl mx-auto px-6 relative -mt-16 z-20 mb-24">
        <div class="bg-white rounded-[24px] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-slate-100">
            <div class="text-center space-y-1">
                <div class="text-5xl font-black text-[#4298B4]">9</div>
                <div class="font-bold text-slate-800 text-sm pt-2">Jalur Karier</div>
                <div class="text-[11px] text-slate-400">Pilihan profesi IT rekomendasi</div>
            </div>
            <div class="text-center space-y-1">
                <div class="text-5xl font-black text-[#88619A]">5</div>
                <div class="font-bold text-slate-800 text-sm pt-2">Kriteria Penilaian</div>
                <div class="text-[11px] text-slate-400">Dimensi kompetensi analisis</div>
            </div>
            <div class="text-center space-y-1">
                <div class="text-5xl font-black text-[#4298B4]">135</div>
                <div class="font-bold text-slate-800 text-sm pt-2">Total Pertanyaan</div>
                <div class="text-[11px] text-slate-400">Pertanyaan terstruktur asesmen</div>
            </div>
            <div class="text-center space-y-1">
                <div class="text-5xl font-black text-[#F4C856]">91%</div>
                <div class="font-bold text-slate-800 text-sm pt-2">Akurasi Rata-rata</div>
                <div class="text-[11px] text-slate-400">Tingkat akurasi validasi sistem</div>
            </div>
        </div>
    </section>

    <!-- FITUR UTAMA -->
    <section id="cara-kerja" class="max-w-6xl mx-auto px-6 mb-24 space-y-10">
        <div>
            <span class="text-[10px] font-bold text-[#4298B4] uppercase tracking-widest">Fitur Utama</span>
            <h2 class="text-3xl font-bold text-slate-800 mt-2 mb-3">Bagaimana Career Insight Bekerja?</h2>
            <p class="text-slate-500 text-sm">Tiga pilar utama yang membuat rekomendasi karier kamu lebih akurat dan personal.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md transition-all">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 left-4 px-3 py-1 bg-[#4298B4] text-white text-[10px] font-bold rounded-md">Analisis 360</div>
                    </div>
                    <div class="p-6 space-y-2">
                        <h3 class="font-bold text-slate-800">Analisis 360° Potensimu</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Sistem mengevaluasi kemampuan kognitif, hard skills, soft skills, minat, dan pengalaman secara menyeluruh.</p>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md transition-all">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://plus.unsplash.com/premium_photo-1661963212517-830bbb7d76fc?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8dGVjaG5vbG9neSUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 left-4 px-3 py-1 bg-[#88619A] text-white text-[10px] font-bold rounded-md">Metode SPK</div>
                    </div>
                    <div class="p-6 space-y-2">
                        <h3 class="font-bold text-slate-800">Sistem Pendukung Keputusan Cerdas</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Menggunakan metode hybrid Profile Matching, AHP, dan TOPSIS untuk menghasilkan rekomendasi akurat.</p>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md transition-all">
                    <div class="h-48 overflow-hidden relative">
                        <img src="https://media.istockphoto.com/id/2224818947/id/foto/penyaringan-resume-digital-oleh-profesional-sdm-manajer-sumber-daya-manusia-mengevaluasi.jpg?s=2048x2048&w=is&k=20&c=TW-CCKnDXPfkoCwDuGCsD5Un8slYnn6HWtfbvFQEYm8=" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-4 left-4 px-3 py-1 bg-[#FFB800] text-white text-[10px] font-bold rounded-md">9 Jalur Karier</div>
                    </div>
                    <div class="p-6 space-y-2">
                        <h3 class="font-bold text-slate-800">9 Profil Karier IT Unggulan</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Temukan kecocokanmu dengan karier masa depan: Web Dev, Data Analyst, hingga AI Engineer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CARA PENGGUNAAN -->
    <section class="max-w-6xl mx-auto px-6 mb-24">
        <div class="mb-10">
            <span class="text-[10px] font-bold text-[#4298B4] uppercase tracking-widest">Cara Penggunaan</span>
            <h2 class="text-3xl font-bold text-slate-800 mt-2 mb-3">Mulai dalam 4 Langkah Mudah</h2>
            <p class="text-slate-500 text-sm">Proses asesmen dirancang terstruktur agar hasilnya akurat dan dapat dipercaya.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Langkah-langkah -->
            <div class="space-y-8">
                <div class="flex gap-5">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F0F7FA] text-[#4298B4] font-black flex items-center justify-center text-lg">1</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-base mb-1.5">Daftar dan masuk</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Buat akun dengan NIM dan data mahasiswamu. Jika belum punya akun, klik tombol asesmen dan kamu akan diarahkan ke halaman registrasi.</p>
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F0F7FA] text-[#4298B4] font-black flex items-center justify-center text-lg">2</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-base mb-1.5">Isi asesmen kompetensi</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Jawab 135 pertanyaan terstruktur mencakup 5 dimensi: kognitif, hard skills, soft skills, minat, dan pengalaman.</p>
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F0F7FA] text-[#4298B4] font-black flex items-center justify-center text-lg">3</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-base mb-1.5">Dapatkan rekomendasi karier</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Sistem memproses jawabanmu menggunakan AHP, Profile Matching, dan TOPSIS lalu menampilkan ranking 9 jalur karier terbaik untukmu.</p>
                    </div>
                </div>
                <div class="flex gap-5">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-[#F0F7FA] text-[#4298B4] font-black flex items-center justify-center text-lg">4</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-base mb-1.5">Cetak laporan hasil</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Unduh atau cetak laporan rekomendasi karier resmi lengkap dengan analisis gap kompetensi dan prospek jabatan.</p>
                    </div>
                </div>
            </div>

            <!-- Metode SPK Card -->
            <div class="bg-white p-8 md:p-10 rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/40">
                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest block mb-6">Metode SPK Yang Digunakan</span>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="h-12 w-12 bg-[#F0F7FA] text-[#4298B4] rounded-xl flex items-center justify-center flex-shrink-0 text-xl"><i class="fa-solid fa-file-contract"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-base">1. Profile Matching</h4>
                            <p class="text-sm text-slate-500 mt-1">Membandingkan profil kompetensimu dengan profil ideal setiap karier IT.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="h-12 w-12 bg-[#F6F2F8] text-[#88619A] rounded-xl flex items-center justify-center flex-shrink-0 text-xl"><i class="fa-solid fa-chart-pie"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-base">2. AHP</h4>
                            <p class="text-sm text-slate-500 mt-1">Menentukan bobot kepentingan setiap kriteria kompetensi secara konsisten.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="h-12 w-12 bg-[#FEF8E6] text-[#F4C856] rounded-xl flex items-center justify-center flex-shrink-0 text-xl"><i class="fa-solid fa-trophy"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-base">3. TOPSIS</h4>
                            <p class="text-sm text-slate-500 mt-1">Meranking karier berdasarkan kedekatan solusi ideal positif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- 9 JALUR KARIER -->
    <section id="jalur-karier" class="bg-transparent border-t border-slate-200 pt-20 pb-20 relative z-10">
        <!-- UBAH max-w-4xl menjadi max-w-6xl agar rata kiri sejajar dengan section di atasnya -->
        <div class="max-w-6xl mx-auto px-6">
            
            <!-- UBAH text-center menjadi text-left -->
            <div class="mb-10 text-left">
                <span class="text-[10px] font-bold text-[#3B8AA7] uppercase tracking-widest">Jalur Rekomendasi</span>
                <h2 class="text-3xl font-bold text-slate-800 mt-2 mb-3">9 Jalur Karier IT yang Dianalisis</h2>
                <p class="text-slate-500 text-sm max-w-2xl">Setiap jalur memiliki profil kompetensi ideal yang unik — sistem mencocokkan profilmu ke semua jalur sekaligus.</p>
            </div>
            
            <!-- Memperbesar gap antar kotak dari gap-4 menjadi gap-6 biar napasnya lega -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $careers = [
                        ['name' => 'Web Development', 'color' => 'bg-[#3B8AA7]'], 
                        ['name' => 'Data Science', 'color' => 'bg-[#88619A]'], 
                        ['name' => 'Artificial Intelligence', 'color' => 'bg-[#1F5064]'], 
                        ['name' => 'Data Mining', 'color' => 'bg-[#88619A]'], 
                        ['name' => 'Data Analyst', 'color' => 'bg-[#88619A]'], 
                        ['name' => 'Mobile Development', 'color' => 'bg-[#3B8AA7]'], 
                        ['name' => '3D / Augmented Reality', 'color' => 'bg-[#F4C856]'], 
                        ['name' => '3D / Virtual Reality', 'color' => 'bg-[#F4C856]'], 
                        ['name' => '3D Game Development', 'color' => 'bg-[#F4C856]'], 
                    ];
                @endphp
                
                @foreach($careers as $career)
                <div class="bg-white border border-slate-200 p-4 rounded-xl shadow-sm flex items-center gap-3 hover:border-[#3B8AA7] hover:shadow-md hover:-translate-y-1 transition-all duration-300 cursor-default">
                    <div class="w-2.5 h-2.5 rounded-full {{ $career['color'] }} shadow-sm"></div>
                    <span class="text-sm font-bold text-slate-700">{{ $career['name'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>

<!-- CTA BANNER -->
    <section class="bg-gradient-to-r from-[#88619A] to-[#6A4C78] text-white py-20 px-6 text-center">
        <div class="max-w-3xl mx-auto space-y-6">
            <div class="text-4xl mb-4">🚀</div>
            <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">Hanya butuh beberapa menit untuk memetakan masa depanmu.</h2>
            <p class="text-white/80 text-sm md:text-base mb-8">Jawab 135 pertanyaan dan dapatkan rekomendasi karier IT yang dipersonalisasi khusus untukmu.</p>
            
            <!-- Tombol CTA yang baru: Warna Kuning Emas yang Mencolok! -->
            <a href="{{ route('login') }}" class="inline-flex bg-[#F4C856] text-slate-900 hover:bg-[#FDE08B] hover:scale-105 shadow-xl shadow-black/20 px-8 py-3.5 rounded-xl font-black transition-all duration-300 items-center gap-2">
                Mulai Asesmen Sekarang &rarr;
            </a>
        </div>
    </section>

    <!-- FOOTER -->
   <footer id="tentang" class="bg-[#1F5064] text-slate-300 py-12 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-10 pb-10 border-b border-white/10">
                <!-- Left Footer Info -->
                <div class="space-y-4">
                    <!-- Bagian ini yang diubah (Teks putih bersih + Ikon) -->
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 bg-white/10 rounded-full flex items-center justify-center border border-white/20">
                            <i class="fa-solid fa-compass text-[#F4C856] text-lg"></i>
                        </div>
                        <span class="text-white font-extrabold text-xl tracking-wide">Career Insight</span>
                    </div>
                    <!-- Tulisan di bawahnya tetap sama -->
                    <div class="text-xs leading-relaxed">
                        <p>Sistem Pendukung Keputusan Rencana Karier</p>
                        <p>Teknik Informatika — Universitas Darussalam Gontor</p>
                        <p class="mt-2 text-slate-500">&copy; 2026 Fiona Anggilia Rahmawati</p>
                    </div>
                </div>
                
                <!-- Right Footer Logos -->
                <div class="flex items-center gap-6">
                    <img src="{{ asset('images/Logo Universitas Darussalam Gontor.png') }}" class="h-12 opacity-80" alt="UNIDA">
                    <div class="text-xs">
                        <p class="text-white font-bold mb-0.5">Universitas Darussalam Gontor</p>
                        <p>Fakultas Sains & Teknologi</p>
                        <p class="text-[#F4C856] font-bold mt-1">✨ 100 Tahun Gontor 1926–2026</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center text-[10px] text-slate-500">
                Sistem ini dikembangkan sebagai karya tulis ilmiah (skripsi) Program Studi Teknik Informatika UNIDA Gontor 🕌 Gontor 100 Tahun - 1926–2026
            </div>
        </div>
    </footer>

<!-- Script untuk efek menu navigasi aktif otomatis -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sections = document.querySelectorAll("section[id], footer[id]");
            const navLinks = document.querySelectorAll(".nav-link");

            window.addEventListener("scroll", () => {
                let current = "beranda"; // Default saat posisi paling atas

                sections.forEach((section) => {
                    const sectionTop = section.offsetTop;
                    // Angka 150 adalah toleransi tinggi navbar agar warna pindah tepat waktu
                    if (scrollY >= sectionTop - 150) { 
                        current = section.getAttribute("id");
                    }
                });

                // 🔥 TAMBAHAN LOGIKA BARU DI SINI 🔥
                // Jika user sudah men-scroll mentok sampai paling bawah layar
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 10) {
                    current = "tentang"; // Paksa menu berubah ke 'Tentang'
                }

                navLinks.forEach((link) => {
                    // Hapus warna biru dari semua link
                    link.classList.remove("text-[#3B8AA7]");
                    link.classList.add("hover:text-[#3B8AA7]"); 
                    
                    // Beri warna biru HANYA pada link yang sedang aktif dilihat
                    if (link.getAttribute("href") === "#" + current) {
                        link.classList.add("text-[#3B8AA7]");
                    }
                });
            });
        });
    </script>
</body>
</html>