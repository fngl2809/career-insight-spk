<x-app-layout>
    <div class="max-w-[95%] 2xl:max-w-[1500px] mx-auto space-y-12 pb-12 pt-4">
        
        <section class="relative bg-gradient-to-br from-[#4298B4] to-[#2B6A80] rounded-[32px] p-12 md:p-16 overflow-hidden shadow-2xl shadow-[#4298B4]/20">
            <div class="absolute top-[-10%] right-[-5%] w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-[-10%] left-[-5%] w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-10">
                <div class="space-y-6 max-w-3xl text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/20 text-white text-sm font-bold tracking-widest uppercase backdrop-blur-md border border-white/30">
                        <i class="fa-solid fa-shield-halved"></i> Sistem Pendukung Keputusan Karier
                    </div>
                   <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
                        Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋<br>
                        <span class="text-white/90">Temukan Karier IT Terbaikmu Bersama Career Insight.</span>
                    </h1>
                    <p class="text-white/80 text-lg mt-2 leading-relaxed">
                        Platform rekomendasi karier berbasis SPK yang menganalisis kompetensi, minat, dan kepribadianmu untuk menentukan jalur karier IT yang paling sesuai.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start pt-4">
                        <button class="px-10 py-5 bg-[#88619A] hover:bg-[#725282] text-white text-lg font-bold rounded-2xl transition-all shadow-lg flex items-center gap-3">
                            Mulai Asesmen <i class="fa-solid fa-arrow-right"></i>
                        </button>
                        <button class="px-10 py-5 bg-white/20 hover:bg-white/30 text-white text-lg font-bold rounded-2xl transition-all backdrop-blur-md border border-white/30">
                            Lihat Hasil
                        </button>
                    </div>
                </div>
                <div class="hidden lg:flex w-80 h-80 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 items-center justify-center p-8">
                    <img src="{{ asset('images/logo.png') }}" class="w-full opacity-90 drop-shadow-2xl" alt="Logo">
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-3 hover:shadow-xl hover:-translate-y-1 transition-all">
                <span class="text-7xl font-black text-[#4298B4]">9</span>
                <span class="text-lg font-bold text-slate-800">Jalur Karier</span>
                <p class="text-sm text-slate-500">Pilihan profesi IT rekomendasi</p>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-3 hover:shadow-xl hover:-translate-y-1 transition-all">
                <span class="text-7xl font-black text-[#88619A]">5</span>
                <span class="text-lg font-bold text-slate-800">Kriteria Penilaian</span>
                <p class="text-sm text-slate-500">Dimensi kompetensi analisis</p>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-3 hover:shadow-xl hover:-translate-y-1 transition-all">
                <span class="text-7xl font-black text-[#4298B4]">135</span>
                <span class="text-lg font-bold text-slate-800">Total Pertanyaan</span>
                <p class="text-sm text-slate-500">Pertanyaan terstruktur asesmen</p>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-3 hover:shadow-xl hover:-translate-y-1 transition-all">
                <span class="text-7xl font-black text-[#FFB800]">91%</span>
                <span class="text-lg font-bold text-slate-800">Akurasi Sistem</span>
                <p class="text-sm text-slate-500">Tingkat akurasi rekomendasi</p>
            </div>
        </section>

        <section class="space-y-8">
            <h2 class="text-3xl font-bold text-slate-800">Bagaimana Career Insight Bekerja?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="group bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-2xl transition-all">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-5 left-5 px-4 py-2 bg-[#4298B4] text-white text-xs font-bold rounded-lg">Analisis 360</div>
                    </div>
                    <div class="p-8 space-y-4">
                        <h3 class="text-xl font-bold text-slate-800">Analisis 360° Potensimu</h3>
                        <p class="text-base text-slate-500 leading-relaxed">Sistem mengevaluasi kemampuan kognitif, hard skills, soft skills, minat, dan pengalaman secara menyeluruh.</p>
                        <a href="#" class="text-sm font-bold text-[#4298B4] hover:underline flex items-center gap-2">Pelajari lebih lanjut <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>
                <div class="group bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-2xl transition-all">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=2015&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-5 left-5 px-4 py-2 bg-[#88619A] text-white text-xs font-bold rounded-lg">Metode SPK</div>
                    </div>
                    <div class="p-8 space-y-4">
                        <h3 class="text-xl font-bold text-slate-800">Sistem Keputusan Cerdas</h3>
                        <p class="text-base text-slate-500 leading-relaxed">Menggunakan metode hybrid Profile Matching, AHP, dan TOPSIS untuk menghasilkan rekomendasi akurat.</p>
                        <a href="#" class="text-sm font-bold text-[#4298B4] hover:underline flex items-center gap-2">Pelajari lebih lanjut <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>
                <div class="group bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-2xl transition-all">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-5 left-5 px-4 py-2 bg-[#FFB800] text-white text-xs font-bold rounded-lg">9 Jalur Karier</div>
                    </div>
                    <div class="p-8 space-y-4">
                        <h3 class="text-xl font-bold text-slate-800">9 Profil Karier Unggulan</h3>
                        <p class="text-base text-slate-500 leading-relaxed">Temukan kecocokanmu dengan karier masa depan: Web Dev, Data Analyst, hingga AI Engineer.</p>
                        <a href="#" class="text-sm font-bold text-[#4298B4] hover:underline flex items-center gap-2">Pelajari lebih lanjut <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-stretch">
            <div class="bg-white p-12 rounded-[32px] shadow-sm border border-slate-100 space-y-10">
                <div>
                    <span class="text-sm font-bold text-[#4298B4] uppercase tracking-widest">Metode SPK</span>
                    <h2 class="text-4xl font-bold text-slate-800 mt-3">Metode yang digunakan</h2>
                </div>
                <div class="space-y-8">
                    <div class="flex items-start gap-6 p-6 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                        <div class="h-16 w-16 bg-[#4298B4]/10 text-[#4298B4] rounded-2xl flex items-center justify-center flex-shrink-0 text-2xl"><i class="fa-solid fa-file-contract"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-xl">1. Profile Matching</h4>
                            <p class="text-base text-slate-500 mt-2 leading-relaxed">Membandingkan profil kompetensimu dengan profil ideal setiap karier IT.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-6 p-6 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                        <div class="h-16 w-16 bg-[#88619A]/10 text-[#88619A] rounded-2xl flex items-center justify-center flex-shrink-0 text-2xl"><i class="fa-solid fa-chart-pie"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-xl">2. AHP</h4>
                            <p class="text-base text-slate-500 mt-2 leading-relaxed">Menentukan bobot kepentingan setiap kriteria secara konsisten dan terstruktur.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-6 p-6 rounded-2xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                        <div class="h-16 w-16 bg-[#FFB800]/10 text-[#FFB800] rounded-2xl flex items-center justify-center flex-shrink-0 text-2xl"><i class="fa-solid fa-bullseye"></i></div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-xl">3. TOPSIS</h4>
                            <p class="text-base text-slate-500 mt-2 leading-relaxed">Meranking karier berdasarkan kedekatan terhadap solusi ideal positif.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-[#88619A] to-[#6A4B78] p-16 rounded-[32px] text-white flex flex-col justify-center items-center text-center space-y-10 shadow-2xl shadow-[#88619A]/30">
                <div class="h-24 w-24 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md border border-white/20"><i class="fa-solid fa-rocket text-5xl"></i></div>
                <h2 class="text-4xl font-bold leading-tight">Hanya butuh beberapa menit untuk memetakan masa depanmu.</h2>
                <p class="text-xl text-white/90 leading-relaxed">Jawab 135 pertanyaan dan dapatkan rekomendasi karier IT yang dipersonalisasi khusus untukmu.</p>
                <button class="w-full py-5 text-xl bg-white text-[#88619A] font-bold rounded-2xl hover:bg-slate-50 transition-colors flex items-center justify-center gap-4 shadow-xl mt-4">
                    <i class="fa-solid fa-compass"></i> Mulai Eksplorasi Karier
                </button>
            </div>
        </section>

        <section class="space-y-8 pt-4">
            <div class="flex justify-between items-end">
                <h2 class="text-3xl font-bold text-slate-800">Karier IT yang Tersedia</h2>
                <a href="#" class="text-base font-bold text-slate-500 hover:text-[#4298B4]">Lihat Semua →</a>
            </div>
            <div class="flex flex-wrap gap-4">
                @foreach(['Web Developer', 'Mobile Developer', 'UI/UX Designer', 'Data Analyst', 'AI Engineer', 'Cybersecurity Specialist', 'Cloud Engineer', 'DevOps Engineer', 'Database Administrator'] as $career)
                    <span class="px-6 py-4 bg-white rounded-2xl shadow-sm border border-slate-100 text-base font-bold text-slate-600 hover:border-[#4298B4] hover:text-[#4298B4] hover:shadow-md transition-all cursor-pointer">
                        {{ $career }}
                    </span>
                @endforeach
            </div>
        </section>

    </div>
</x-app-layout>