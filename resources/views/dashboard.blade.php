<x-app-layout>
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8 pt-6 space-y-6">

        {{-- Ganti variabel $hasAssessment ini dengan yang dilempar dari Controller --}}
        @if($hasAssessment ?? false)

            <!-- ============================================================== -->
            <!-- STATE 1: JIKA USER SUDAH MENGISI ASESMEN (SESUAI GAMBAR 3) -->
            <!-- ============================================================== -->

            {{-- HEADER HASIL --}}
            <section class="bg-gradient-to-r from-[#1B5470] to-[#247091] rounded-[24px] p-8 flex flex-col md:flex-row justify-between items-start md:items-center text-white shadow-md relative overflow-hidden">
                <div class="z-10 space-y-2">
                    <p class="text-[11px] text-white/80 font-semibold tracking-wide uppercase">{{ now()->translatedFormat('l, d F Y') }} — Teknik Informatika — UNIDA Gontor</p>
                    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h1>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-500/20 text-emerald-100 rounded-md text-xs font-semibold backdrop-blur-sm mt-2 border border-emerald-500/30">
                        <i class="fa-solid fa-check-square"></i> Asesmen terakhir: 15 Juli 2026
                    </div>
                </div>
                <div class="z-10 mt-6 md:mt-0 flex flex-col items-center">
                    <div class="w-16 h-16 bg-[#88619A] rounded-full flex items-center justify-center text-2xl font-bold border-[3px] border-white/20 shadow-lg">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span class="text-[10px] font-semibold mt-2 text-white/90">{{ Auth::user()->name }}</span>
                </div>
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
            </section>

            {{-- STATISTIK SINGKAT --}}
            <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-[20px] border border-slate-100 shadow-sm">
                    <span class="text-xs text-slate-500 font-semibold mb-1 block">Kecocokan tertinggi</span>
                    <div class="text-3xl font-black text-emerald-500 tracking-tight">87%</div>
                    <span class="text-xs font-medium text-slate-400 mt-1 block">Data Science</span>
                </div>
                <div class="bg-white p-6 rounded-[20px] border border-slate-100 shadow-sm">
                    <span class="text-xs text-slate-500 font-semibold mb-1 block">Kompetensi terpenuhi</span>
                    <div class="text-3xl font-black text-[#88619A] tracking-tight">2 <span class="text-xl text-slate-300 font-bold">/ 5</span></div>
                    <span class="text-xs font-medium text-slate-400 mt-1 block">Hard skills and minat</span>
                </div>
                <div class="bg-white p-6 rounded-[20px] border border-slate-100 shadow-sm">
                    <span class="text-xs text-slate-500 font-semibold mb-1 block">Total asesmen</span>
                    <div class="text-3xl font-black text-[#4298B4] tracking-tight">3&times;</div>
                    <span class="text-xs font-medium text-slate-400 mt-1 block">Sudah pernah mengisi</span>
                </div>
            </section>

            {{-- GRID UTAMA ATAS: HASIL & ANALISIS --}}
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Kiri Atas: Peringkat Utama --}}
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6 flex flex-col">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fa-solid fa-trophy text-amber-500 text-sm"></i>
                    </div>
                    <div class="bg-[#247091] rounded-[20px] p-6 text-white flex justify-between items-center mb-6 shadow-inner">
                        <div>
                            <span class="inline-block px-2.5 py-1 bg-amber-500 text-white text-[10px] font-extrabold rounded-md mb-2 tracking-wide uppercase"><i class="fa-solid fa-medal mr-1"></i> Peringkat #1</span>
                            <h2 class="text-3xl font-bold tracking-tight">Data Science</h2>
                            <p class="text-xs text-white/80 mt-1">Sangat cocok dengan profilmu</p>
                        </div>
                        <div class="w-20 h-20 rounded-full bg-white/10 border-[4px] border-white/20 flex flex-col items-center justify-center font-bold shadow-lg">
                            <span class="text-2xl leading-none">87</span>
                            <span class="text-[8px] tracking-wider">% COCOK</span>
                        </div>
                    </div>
                    <div class="flex gap-3 text-center mt-auto">
                        <div class="flex-1 py-3 px-2 border-2 border-emerald-400 bg-emerald-50/50 rounded-xl">
                            <div class="text-[10px] font-bold text-emerald-600/70 mb-1">#1</div>
                            <div class="font-bold text-emerald-900 text-sm">Data Science</div>
                            <div class="text-emerald-500 font-bold mt-1 text-lg">87%</div>
                        </div>
                        <div class="flex-1 py-3 px-2 border border-slate-100 rounded-xl">
                            <div class="text-[10px] font-bold text-slate-400 mb-1">#2</div>
                            <div class="font-bold text-slate-700 text-sm">AI</div>
                            <div class="text-[#4298B4] font-bold mt-1 text-lg">74%</div>
                        </div>
                        <div class="flex-1 py-3 px-2 border border-slate-100 rounded-xl">
                            <div class="text-[10px] font-bold text-slate-400 mb-1">#3</div>
                            <div class="font-bold text-slate-700 text-sm">Data Mining</div>
                            <div class="text-[#4298B4] font-bold mt-1 text-lg">61%</div>
                        </div>
                    </div>
                </div>

                {{-- Kanan Atas: Skor vs Ideal --}}
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-chart-column text-[#4298B4] text-sm"></i>
                        <span class="text-xs font-semibold text-slate-500">Skor kamu vs standar ideal — Data Science</span>
                    </div>
                    <div class="space-y-5">
                        {{-- Bar 1 --}}
                        <div>
                            <div class="flex justify-between text-xs mb-2">
                                <span class="font-bold text-slate-700">Kognitif</span>
                                <div class="space-x-2">
                                    <span class="font-bold text-slate-800">82/90</span>
                                    <span class="text-[10px] text-amber-500 font-bold bg-amber-50 px-2 py-0.5 rounded">Perlu Ditingkatkan</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-[#4298B4] h-1.5 rounded-full" style="width: 82%"></div></div>
                        </div>
                        {{-- Bar 2 --}}
                        <div>
                            <div class="flex justify-between text-xs mb-2">
                                <span class="font-bold text-slate-700">Hard Skills</span>
                                <div class="space-x-2">
                                    <span class="font-bold text-slate-800">90/85</span>
                                    <span class="text-[10px] text-emerald-500 font-bold bg-emerald-50 px-2 py-0.5 rounded"><i class="fa-solid fa-check"></i> Terpenuhi</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-[#88619A] h-1.5 rounded-full" style="width: 100%"></div></div>
                        </div>
                        {{-- Bar 3 --}}
                        <div>
                            <div class="flex justify-between text-xs mb-2">
                                <span class="font-bold text-slate-700">Soft Skills</span>
                                <div class="space-x-2">
                                    <span class="font-bold text-slate-800">76/80</span>
                                    <span class="text-[10px] text-amber-500 font-bold bg-amber-50 px-2 py-0.5 rounded">Perlu Ditingkatkan</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-amber-400 h-1.5 rounded-full" style="width: 76%"></div></div>
                        </div>
                        {{-- Bar 4 --}}
                        <div>
                            <div class="flex justify-between text-xs mb-2">
                                <span class="font-bold text-slate-700">Minat</span>
                                <div class="space-x-2">
                                    <span class="font-bold text-slate-800">92/88</span>
                                    <span class="text-[10px] text-emerald-500 font-bold bg-emerald-50 px-2 py-0.5 rounded"><i class="fa-solid fa-check"></i> Terpenuhi</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-[#e67e22] h-1.5 rounded-full" style="width: 100%"></div></div>
                        </div>
                        {{-- Bar 5 --}}
                        <div>
                            <div class="flex justify-between text-xs mb-2">
                                <span class="font-bold text-slate-700">Pengalaman</span>
                                <div class="space-x-2">
                                    <span class="font-bold text-slate-800">68/75</span>
                                    <span class="text-[10px] text-amber-500 font-bold bg-amber-50 px-2 py-0.5 rounded">Perlu Ditingkatkan</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="bg-emerald-500 h-1.5 rounded-full" style="width: 68%"></div></div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- GRID UTAMA BAWAH: 9 JALUR & SARAN --}}
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-2">
                {{-- Kiri Bawah: Tingkat Kecocokan 9 Jalur --}}
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6 flex flex-col">
                    <div class="flex items-center gap-2 mb-5">
                        <i class="fa-solid fa-clipboard-list text-rose-400 text-sm"></i>
                        <span class="text-xs font-semibold text-slate-500">Tingkat kecocokan dari 9 jalur karier</span>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        {{-- Item 1 --}}
                        <div class="border border-slate-100 rounded-xl p-3">
                            <p class="text-[10px] text-slate-400 font-semibold mb-1">#1 Data Science</p>
                            <div class="w-full bg-slate-100 rounded-full h-1 mb-2.5"><div class="bg-emerald-500 h-1 rounded-full" style="width:87%"></div></div>
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-emerald-600 text-sm">87%</span>
                                <span class="text-[9px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-100">Sangat Cocok</span>
                            </div>
                        </div>
                        {{-- Item 2 --}}
                        <div class="border border-slate-100 rounded-xl p-3">
                            <p class="text-[10px] text-slate-400 font-semibold mb-1">#2 AI</p>
                            <div class="w-full bg-slate-100 rounded-full h-1 mb-2.5"><div class="bg-[#4298B4] h-1 rounded-full" style="width:74%"></div></div>
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-[#4298B4] text-sm">74%</span>
                                <span class="text-[9px] font-bold text-[#4298B4] bg-blue-50 px-2 py-0.5 rounded border border-blue-100">Cocok</span>
                            </div>
                        </div>
                        {{-- Item 3 --}}
                        <div class="border border-slate-100 rounded-xl p-3">
                            <p class="text-[10px] text-slate-400 font-semibold mb-1">#3 Data Mining</p>
                            <div class="w-full bg-slate-100 rounded-full h-1 mb-2.5"><div class="bg-[#4298B4] h-1 rounded-full" style="width:61%"></div></div>
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-[#4298B4] text-sm">61%</span>
                                <span class="text-[9px] font-bold text-[#4298B4] bg-blue-50 px-2 py-0.5 rounded border border-blue-100">Cocok</span>
                            </div>
                        </div>
                        {{-- Item 4 --}}
                        <div class="border border-slate-100 rounded-xl p-3">
                            <p class="text-[10px] text-slate-400 font-semibold mb-1">#4 Web Dev</p>
                            <div class="w-full bg-slate-100 rounded-full h-1 mb-2.5"><div class="bg-amber-400 h-1 rounded-full" style="width:55%"></div></div>
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-amber-500 text-sm">55%</span>
                                <span class="text-[9px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded border border-amber-100">Cukup</span>
                            </div>
                        </div>
                        {{-- Item 5 --}}
                        <div class="border border-slate-100 rounded-xl p-3">
                            <p class="text-[10px] text-slate-400 font-semibold mb-1">#5 Mobile Dev</p>
                            <div class="w-full bg-slate-100 rounded-full h-1 mb-2.5"><div class="bg-amber-400 h-1 rounded-full" style="width:50%"></div></div>
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-amber-500 text-sm">50%</span>
                                <span class="text-[9px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded border border-amber-100">Cukup</span>
                            </div>
                        </div>
                        {{-- Item 6 --}}
                        <div class="border border-slate-100 rounded-xl p-3">
                            <p class="text-[10px] text-slate-400 font-semibold mb-1">#6 3D / AR</p>
                            <div class="w-full bg-slate-100 rounded-full h-1 mb-2.5"><div class="bg-rose-400 h-1 rounded-full" style="width:38%"></div></div>
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-rose-500 text-sm">38%</span>
                                <span class="text-[9px] font-bold text-rose-600 bg-rose-50 px-2 py-0.5 rounded border border-rose-100">Kurang</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-auto pt-2 border-t border-slate-50">
                        <a href="{{ route('result.index') }}" class="text-[11px] font-semibold text-[#4298B4] hover:text-[#247091] transition-colors">+3 jalur lainnya - Lihat hasil lengkap &rarr;</a>
                    </div>
                </div>

                {{-- Kanan Bawah: Saran Pengembangan --}}
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6">
                    <div class="flex items-center gap-2 mb-5">
                        <i class="fa-solid fa-lightbulb text-amber-400 text-sm"></i>
                        <span class="text-xs font-semibold text-slate-500">Berdasarkan kompetensi yang perlu ditingkatkan</span>
                    </div>
                    <div class="space-y-4">
                        {{-- Saran 1 --}}
                        <div class="border-l-4 border-[#4298B4] bg-[#4298B4]/5 rounded-r-xl p-4 flex gap-4">
                            <div class="mt-0.5"><i class="fa-solid fa-brain text-pink-400 text-lg"></i></div>
                            <div>
                                <h6 class="text-xs font-extrabold text-slate-800">Tingkatkan Kognitif (skor 82/90)</h6>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Pelajari algoritma clustering atau perancangan eksperimen akurasi model lebih dalam.</p>
                            </div>
                        </div>
                        {{-- Saran 2 --}}
                        <div class="border-l-4 border-amber-400 bg-amber-50 rounded-r-xl p-4 flex gap-4">
                            <div class="mt-0.5"><i class="fa-solid fa-handshake text-amber-400 text-lg"></i></div>
                            <div>
                                <h6 class="text-xs font-extrabold text-slate-800">Asah Soft Skills (skor 76/80)</h6>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Latih kemampuan problem solving kreatif dan komunikasi data kepada orang non-teknis.</p>
                            </div>
                        </div>
                        {{-- Saran 3 --}}
                        <div class="border-l-4 border-emerald-500 bg-emerald-50 rounded-r-xl p-4 flex gap-4">
                            <div class="mt-0.5"><i class="fa-solid fa-briefcase text-slate-600 text-lg"></i></div>
                            <div>
                                <h6 class="text-xs font-extrabold text-slate-800">Tambah Pengalaman (skor 68/75)</h6>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Ikuti kompetisi Kaggle atau bangun portofolio analisis spasial/pemetaan K-Means aktif di GitHub.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        @else
            <!-- ============================================================== -->
            <!-- STATE 2: JIKA USER BELUM MENGISI ASESMEN (SESUAI GAMBAR 2) -->
            <!-- ============================================================== -->

            {{-- HEADER BELUM ASESMEN --}}
            <section class="bg-gradient-to-r from-[#1B5470] to-[#247091] rounded-[24px] p-8 text-white shadow-md relative overflow-hidden">
                <p class="text-[11px] text-white/80 font-semibold mb-3 tracking-wide">{{ now()->translatedFormat('l, d F Y') }} — Teknik Informatika — UNIDA Gontor</p>
                <h1 class="text-4xl font-extrabold mb-2 tracking-tight">Halo, {{ explode(' ', Auth::user()->name)[0] }} 👋</h1>
                <p class="text-sm text-white/90 max-w-xl mb-6 leading-relaxed">
                    Kamu belum pernah mengisi asesmen. Isi sekarang buat dapat rekomendasi karier yang paling sesuai sama kompetensimu.
                </p>
                <a href="{{ route('assessment.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/30 rounded-lg text-sm font-bold transition-all shadow-sm">
                    Mulai asesmen pertamamu &rarr;
                </a>
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/5 rounded-full blur-3xl pointer-events-none"></div>
            </section>

            {{-- APA YANG DIDAPAT --}}
            <section>
                <h3 class="text-sm font-bold text-slate-700 mb-3">Apa yang bakal kamu dapat</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white p-5 rounded-[20px] border border-slate-100 shadow-sm flex flex-col justify-center">
                        <i class="fa-solid fa-bullseye text-2xl text-rose-400 mb-3"></i>
                        <h4 class="font-bold text-slate-800 text-sm">Rekomendasi karier</h4>
                        <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Peringkat jalur karier paling cocok pakai AHP dan TOPSIS</p>
                    </div>
                    <div class="bg-white p-5 rounded-[20px] border border-slate-100 shadow-sm flex flex-col justify-center">
                        <i class="fa-solid fa-chart-column text-2xl text-[#4298B4] mb-3"></i>
                        <h4 class="font-bold text-slate-800 text-sm">Analisis kompetensi</h4>
                        <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Perbandingan skormu vs standar ideal tiap profesi</p>
                    </div>
                    <div class="bg-white p-5 rounded-[20px] border border-slate-100 shadow-sm flex flex-col justify-center">
                        <i class="fa-solid fa-lightbulb text-2xl text-amber-400 mb-3"></i>
                        <h4 class="font-bold text-slate-800 text-sm">Saran pengembangan</h4>
                        <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Langkah konkret buat naikin skor yang masih kurang</p>
                    </div>
                </div>
            </section>

            {{-- BANNER UNGU --}}
            <section class="bg-gradient-to-r from-[#7A508A] to-[#88619A] rounded-2xl p-6 flex items-center gap-6 text-white shadow-sm">
                <i class="fa-solid fa-bullseye text-5xl opacity-50 hidden md:block ml-4"></i>
                <div>
                    <h3 class="font-extrabold text-base mb-1">Mulai petakan karier IT-mu sekarang!</h3>
                    <p class="text-[11px] text-white/90 leading-relaxed max-w-4xl">Sistem ini dirancang khusus untuk mahasiswa Teknik Informatika UNIDA Gontor agar bisa menemukan jalur karier yang paling sesuai dengan potensi dan minatmu. Hanya butuh beberapa menit!</p>
                </div>
            </section>

            {{-- KOTAK KOSONG DAN FITUR --}}
            <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-10 flex flex-col items-center justify-center text-center">
                    <i class="fa-solid fa-mailbox text-4xl text-slate-200 mb-4"></i>
                    <h4 class="font-bold text-slate-800 text-sm">Belum ada data asesmen</h4>
                    <p class="text-xs text-slate-500 mt-2 max-w-[250px] leading-relaxed">Kamu belum pernah mengisi kuesioner. Isi sekarang untuk mendapatkan rekomendasi karier terbaik!</p>
                </div>
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-8 flex flex-col justify-center space-y-7">
                    <div class="flex gap-4 items-start">
                        <div class="mt-1"><i class="fa-solid fa-trophy text-amber-500 text-lg"></i></div>
                        <div>
                            <h5 class="font-bold text-slate-800 text-sm">Rekomendasi Karier</h5>
                            <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Ranking karier IT dari yang paling cocok sampai kurang cocok dengan profilmu.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start border-l-2 border-[#4298B4] pl-4 -ml-[18px]"> {{-- aksen garis pinggir seperti mockup --}}
                        <div class="mt-1"><i class="fa-solid fa-chart-pie text-[#4298B4] text-lg"></i></div>
                        <div>
                            <h5 class="font-bold text-slate-800 text-sm">Analisis Kompetensi</h5>
                            <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Tahu mana kompetensimu yang sudah terpenuhi dan mana yang perlu ditingkatkan.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start border-l-2 border-emerald-500 pl-4 -ml-[18px]">
                        <div class="mt-1"><i class="fa-solid fa-print text-[#88619A] text-lg"></i></div>
                        <div>
                            <h5 class="font-bold text-slate-800 text-sm">Laporan Resmi</h5>
                            <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Hasil rekomendasi bisa dicetak sebagai laporan resmi lengkap dengan analisis.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- GRID 9 JALUR KARIER (BAGIAN BAWAH YANG HILANG KEMARIN) --}}
            <section class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-8 mt-2">
                <div class="flex items-center gap-2 mb-6">
                    <i class="fa-solid fa-folder-open text-amber-400"></i>
                    <p class="text-xs text-slate-500 font-medium">Isi asesmen untuk mengetahui tingkat kecocokanmu dengan semua jalur berikut.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    @php
                        $jalurList = ['Web Development', 'Data Science', 'Artificial Intelligence', 'Data Mining', 'Data Analyst', 'Mobile Development', '3D / AR', '3D / VR', '3D Game Dev'];
                    @endphp
                    
                    @foreach($jalurList as $index => $jalur)
                    <div class="border border-slate-100 rounded-2xl p-5 hover:border-slate-200 transition-colors">
                        <p class="text-[10px] text-slate-400 font-semibold mb-1">Jalur {{ $index + 1 }}</p>
                        <h5 class="font-bold text-slate-700 text-sm">{{ $jalur }}</h5>
                        <div class="flex items-center gap-2 mt-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-slate-300"></div>
                            <p class="text-[10px] text-slate-400 font-medium">Belum dianalisis</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="border border-dashed border-slate-200 rounded-xl p-5 text-center bg-slate-50/50">
                    <p class="text-[11px] text-slate-500 mb-3">Semua jalur di atas akan dianalisis setelah kamu mengisi kuesioner asesmen.</p>
                    <a href="{{ route('assessment.index') }}" class="text-xs font-bold text-slate-300 hover:text-slate-400 transition-colors inline-block">Isi Asesmen untuk Melihat Hasilmu &rarr;</a>
                </div>
            </section>

        @endif

    </div>
</x-app-layout>