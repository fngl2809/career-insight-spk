<x-app-layout>
    <div class="max-w-7xl mx-auto space-y-10 pb-12 px-4 sm:px-6 lg:px-8 pt-6">
        
        <section class="relative bg-gradient-to-br from-[#4298B4] to-[#2B6A80] rounded-[32px] p-10 md:p-14 overflow-hidden shadow-xl shadow-[#4298B4]/10">
            <div class="absolute top-[-10%] right-[-5%] w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10%] left-[-5%] w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-10">
                <div class="space-y-5 max-w-2xl text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/20 text-white text-xs font-bold tracking-widest uppercase backdrop-blur-md border border-white/30">
                        <i class="fa-solid fa-shield-halved"></i> Sistem Pendukung Keputusan Karier
                    </div>
                    <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight">
                        Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋<br>
                        <span class="text-white/90 text-2xl md:text-4xl block mt-1 font-bold">Temukan Karier IT Terbaikmu Bersama Career Insight.</span>
                    </h1>
                    <p class="text-white/80 text-base leading-relaxed">
                        Platform rekomendasi karier berbasis SPK yang menganalisis kompetensi, minat, dan kepribadianmu untuk menentukan jalur karier IT yang paling sesuai.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start pt-2">
                        <a href="{{ route('assessment.index') }}" class="px-6 py-3.5 bg-[#88619A] hover:bg-[#725282] text-white font-bold rounded-xl transition-all shadow-md flex items-center gap-2">
                            Mulai Asesmen <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="{{ route('result.index') }}" class="inline-block px-6 py-3 bg-white/20 hover:bg-white/30 text-white rounded-xl font-bold border border-white/30 transition-all duration-300">
                        Lihat Hasil
                        </a>
                    </div>
                </div>
                <div class="relative w-full h-full flex items-center justify-center p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 shadow-2xl">
                    <img src="{{ asset('images/dashboard.png') }}" alt="Ilustrasi Karier IT" class="w-full h-auto object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-2 hover:shadow-md transition-all">
                <span class="text-5xl font-black text-[#4298B4]">9</span>
                <span class="text-sm font-bold text-slate-800">Jalur Karier</span>
                <p class="text-xs text-slate-400">Pilihan profesi IT rekomendasi</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-2 hover:shadow-md transition-all">
                <span class="text-5xl font-black text-[#88619A]">5</span>
                <span class="text-sm font-bold text-slate-800">Kriteria Penilaian</span>
                <p class="text-xs text-slate-400">Dimensi kompetensi analisis</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-2 hover:shadow-md transition-all">
                <span class="text-5xl font-black text-[#4298B4]">135</span>
                <span class="text-sm font-bold text-slate-800">Total Pertanyaan</span>
                <p class="text-xs text-slate-400">Pertanyaan terstruktur asesmen</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-2 hover:shadow-md transition-all">
                <span class="text-5xl font-black text-[#FFB800]">91%</span>
                <span class="text-sm font-bold text-slate-800">Akurasi Rata-rata</span>
                <p class="text-xs text-slate-400">Tingkat akurasi validasi sistem</p>
            </div>
        </section>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-slate-800">Bagaimana Career Insight Bekerja?</h2>
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
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">
            <div class="bg-white p-8 rounded-[24px] shadow-sm border border-slate-100 space-y-6">
                <div>
                    <span class="text-[10px] font-bold text-[#4298B4] uppercase tracking-widest">Metode SPK</span>
                    <h2 class="text-xl font-bold text-slate-800 mt-1">Metode SPK yang digunakan</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <div class="h-10 w-10 bg-[#4298B4]/10 text-[#4298B4] rounded-lg flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-file-contract"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">1. Profile Matching</h4>
                            <p class="text-xs text-slate-500 mt-0.5">Membandingkan profil kompetensimu dengan profil ideal setiap karier IT.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <div class="h-10 w-10 bg-[#88619A]/10 text-[#88619A] rounded-lg flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-chart-pie"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">2. AHP</h4>
                            <p class="text-xs text-slate-500 mt-0.5">Menentukan bobot kepentingan setiap kriteria secara konsisten.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <div class="h-10 w-10 bg-[#FFB800]/10 text-[#FFB800] rounded-lg flex items-center justify-center flex-shrink-0"><i class="fa-solid fa-bullseye"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">3. TOPSIS</h4>
                            <p class="text-xs text-slate-500 mt-0.5">Meranking karier berdasarkan kedekatan solusi ideal positif.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-[#88619A] to-[#6A4B78] p-8 rounded-[24px] text-white flex flex-col justify-center items-center text-center space-y-4 shadow-xl shadow-[#88619A]/20">
                <div class="h-14 w-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md border border-white/20"><i class="fa-solid fa-rocket text-xl"></i></div>
                <h2 class="text-2xl font-bold leading-tight">Hanya butuh beberapa menit untuk memetakan masa depanmu.</h2>
                <p class="text-white/80 text-sm leading-relaxed">Jawab 135 pertanyaan dan dapatkan rekomendasi karier IT yang dipersonalisasi khusus untukmu.</p>
                <a href="{{ route('assessment.index') }}" class="w-full py-3 bg-white text-[#88619A] font-bold rounded-xl hover:bg-slate-50 transition-colors flex items-center justify-center gap-2 shadow-md">
                    <i class="fa-solid fa-compass"></i> Mulai Eksplorasi Karier
                </a>
            </div>
        </section>

        <section class="space-y-4">
    <div class="flex justify-between items-end">
        <h2 class="text-xl font-bold text-slate-800">Karier IT yang Tersedia</h2>
    </div>
    <!-- Ubah gap-2.5 menjadi gap-2 biar jarak antar tombol lebih hemat -->
    <div class="flex flex-wrap gap-2">
        @foreach(['Virtual Reality (VR)', 'Augmented Reality (AR)', 'Game Develeloper', 'Data Analyst', 'Data Scientist', 'Data Mining', 'Mobile Developer', 'Web Developer', 'Artificial Intelligence'] as $career)
            <!-- Ubah px-4 menjadi px-3 biar kotak putihnya tidak terlalu lebar -->
            <span class="px-3 py-2 bg-white rounded-xl shadow-sm border border-slate-100 text-xs font-medium text-slate-600 hover:border-[#4298B4] hover:text-[#4298B4] transition-all cursor-pointer">
                {{ $career }}
            </span>
        @endforeach
    </div>
</section>

<!-- FOOTER DASHBOARD -->
<footer class="mt-auto py-6 px-6 text-center text-slate-500 transition-all duration-300">
    <div class="border-t border-slate-200 pt-6">
        <p class="text-sm font-medium">
            &copy; 2026 <span class="font-bold text-[#4298B4]">Career Insight</span>. Sistem Pendukung Keputusan Rencana Karier.
        </p>
        <p class="text-xs mt-1.5 text-slate-400">
            Dibuat dengan <i class="fa-solid fa-heart text-red-400 mx-1"></i> oleh <span class="font-semibold text-slate-500">Fiona Anggilia Rahmawati</span> 
            <br class="md:hidden"> <!-- Biar kalau dibuka di HP, teksnya turun rapi -->
            <span class="hidden md:inline"> | </span> Program Studi Teknik Informatika, Universitas Darussalam Gontor.
        </p>
    </div>
</footer>

    </div>
</x-app-layout>