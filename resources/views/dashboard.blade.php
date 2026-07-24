<x-app-layout>
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8 pt-6 space-y-6">

        @if($hasAssessment ?? false)
            <!-- ========================================== -->
            <!-- STATE 1: JIKA USER SUDAH MENGISI ASESMEN   -->
            <!-- ========================================== -->
            
            {{-- HEADER HASIL --}}
            <section class="bg-gradient-to-r from-[#1B5470] to-[#247091] rounded-[24px] p-8 flex flex-col md:flex-row justify-between items-start md:items-center text-white shadow-md relative overflow-hidden">
                <div class="z-10 space-y-2">
                    <p class="text-[11px] text-white/80 font-semibold tracking-wide uppercase">{{ now()->translatedFormat('l, d F Y') }} — Teknik Informatika — UNIDA Gontor</p>
                    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋</h1>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-500/20 text-emerald-100 rounded-md text-xs font-semibold backdrop-blur-sm mt-2 border border-emerald-500/30">
                        <i class="fa-solid fa-check-square"></i> Asesmen terakhir: {{ $tanggalTerakhir ?? '-' }}
                    </div>
                </div>
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
            </section>

            {{-- STATISTIK SINGKAT --}}
            <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-[20px] border border-slate-100 shadow-sm">
                    <span class="text-xs text-slate-500 font-semibold mb-1 block">Kecocokan tertinggi</span>
                    <div class="text-3xl font-black text-emerald-500 tracking-tight">{{ $top3[0]['skor'] ?? 0 }}%</div>
                    <span class="text-xs font-medium text-slate-400 mt-1 block">{{ $rekomendasiUtama ?? '-' }}</span>
                </div>
                <div class="bg-white p-6 rounded-[20px] border border-slate-100 shadow-sm">
                    <span class="text-xs text-slate-500 font-semibold mb-1 block">Kompetensi terpenuhi</span>
                    <div class="text-3xl font-black text-[#88619A] tracking-tight">{{ $jumlahTerpenuhi ?? 0 }} <span class="text-xl text-slate-300 font-bold">/ 5</span></div>
                    <span class="text-xs font-medium text-slate-400 mt-1 block">{{ $teksTerpenuhi ?? '-' }}</span>
                </div>
                <div class="bg-white p-6 rounded-[20px] border border-slate-100 shadow-sm">
                    <span class="text-xs text-slate-500 font-semibold mb-1 block">Total asesmen</span>
                    <div class="text-3xl font-black text-[#4298B4] tracking-tight">{{ $totalAsesmen ?? 0 }}&times;</div>
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
                            <h2 class="text-3xl font-bold tracking-tight">{{ $rekomendasiUtama ?? '-' }}</h2>
                            <p class="text-xs text-white/80 mt-1">Sangat cocok dengan profilmu</p>
                        </div>
                        <div class="w-20 h-20 rounded-full bg-white/10 border-[4px] border-white/20 flex flex-col items-center justify-center font-bold shadow-lg">
                            <span class="text-2xl leading-none">{{ $top3[0]['skor'] ?? 0 }}</span>
                            <span class="text-[8px] tracking-wider">% COCOK</span>
                        </div>
                    </div>
                    <div class="flex gap-3 text-center mt-auto">
                        @foreach($peringkatSelanjutnya ?? [] as $index => $item)
                        <div class="flex-1 py-3 px-2 border border-slate-100 rounded-xl hover:border-[#4298B4] transition-colors">
                            <div class="text-[10px] font-bold text-slate-400 mb-1">Peringkat #{{ $index + 2 }}</div>
                            <div class="font-bold text-slate-700 text-sm line-clamp-1">{{ $item['nama'] }}</div>
                            <div class="text-[#4298B4] font-bold mt-1 text-lg">{{ $item['skor'] }}%</div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Kanan Atas: Skor vs Ideal --}}
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-chart-column text-[#4298B4] text-sm"></i>
                        <span class="text-xs font-semibold text-slate-500">Skor kamu vs standar ideal — {{ $rekomendasiUtama }}</span>
                    </div>
                    <div class="space-y-5">
                        @php
                            $kriteriaList = [
                                ['nama' => 'Kognitif', 'skor' => $skorKognitif ?? 0, 'ideal' => $ideal['kognitif'] ?? 80, 'warna' => 'bg-[#4298B4]'],
                                ['nama' => 'Hard Skills', 'skor' => $skorHardskill ?? 0, 'ideal' => $ideal['hardskill'] ?? 80, 'warna' => 'bg-[#88619A]'],
                                ['nama' => 'Soft Skills', 'skor' => $skorSoftskill ?? 0, 'ideal' => $ideal['softskill'] ?? 80, 'warna' => 'bg-amber-400'],
                                ['nama' => 'Minat', 'skor' => $skorMinat ?? 0, 'ideal' => $ideal['minat'] ?? 80, 'warna' => 'bg-[#e67e22]'],
                                ['nama' => 'Pengalaman', 'skor' => $skorPengalaman ?? 0, 'ideal' => $ideal['pengalaman'] ?? 80, 'warna' => 'bg-emerald-500'],
                            ];
                        @endphp

                        @foreach($kriteriaList as $k)
                        <div>
                            <div class="flex justify-between text-xs mb-2">
                                <span class="font-bold text-slate-700">{{ $k['nama'] }}</span>
                                <div class="space-x-2">
                                    <span class="font-bold text-slate-800">{{ $k['skor'] }}%</span>
                                    @if($k['skor'] >= $k['ideal'])
                                        <span class="text-[10px] text-emerald-500 font-bold bg-emerald-50 px-2 py-0.5 rounded"><i class="fa-solid fa-check"></i> Terpenuhi</span>
                                    @else
                                        <span class="text-[10px] text-amber-500 font-bold bg-amber-50 px-2 py-0.5 rounded">Perlu Ditingkatkan</span>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5"><div class="{{ $k['warna'] }} h-1.5 rounded-full" style="width: {{ $k['skor'] }}%"></div></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- GRID UTAMA BAWAH: LANGKAH SELANJUTNYA & SARAN --}}
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-2">
                
                {{-- Kiri Bawah: Langkah Selanjutnya (Aman dari Validasi) --}}
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6 flex flex-col">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-person-walking-arrow-right text-[#4298B4] text-sm"></i>
                        <span class="text-xs font-semibold text-slate-500">Langkah selanjutnya untukmu</span>
                    </div>
                    
                    <div class="space-y-5">
                        {{-- Langkah 1: Ditambahin border ungu dan margin kiri biar sejajar --}}
                        <div class="flex gap-4 items-start border-l-2 border-[#88619A] pl-4 -ml-[19px]">
                            <div class="mt-0.5"><i class="fa-solid fa-print text-[#88619A] text-xl"></i></div>
                            <div>
                                <h5 class="font-bold text-slate-800 text-sm">1. Cetak Laporan Rekomendasi</h5>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Simpan hasil asesmen ini dalam bentuk PDF lewat menu riwayat sebagai dokumentasi pribadimu.</p>
                            </div>
                        </div>
                        
                        {{-- Langkah 2 --}}
                        <div class="flex gap-4 items-start border-l-2 border-[#4298B4] pl-4 -ml-[19px]">
                            <div class="mt-0.5"><i class="fa-solid fa-comments text-[#4298B4] text-xl"></i></div>
                            <div>
                                <h5 class="font-bold text-slate-800 text-sm">2. Konsultasi Akademik</h5>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Bawa dan diskusikan hasil SPK ini saat bimbingan dengan Pak Widya atau dosen lainnya untuk menyelaraskan fokus tugas akhirmu secara terarah.</p>
                            </div>
                        </div>
                        
                        {{-- Langkah 3 --}}
                        <div class="flex gap-4 items-start border-l-2 border-emerald-500 pl-4 -ml-[19px]">
                            <div class="mt-0.5"><i class="fa-solid fa-magnifying-glass text-emerald-500 text-xl"></i></div>
                            <div>
                                <h5 class="font-bold text-slate-800 text-sm">3. Eksplorasi Mandiri</h5>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Gunakan hasil ini sebagai acuan untuk mulai mencari tahu tren industri dan lowongan kerja terkait.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-auto pt-5 border-t border-slate-50">
                        <a href="{{ route('assessment.history') }}" class="text-[11px] font-semibold text-[#4298B4] hover:text-[#247091] transition-colors">Buka menu Riwayat Asesmen &rarr;</a>
                    </div>
                </div>

                {{-- Kanan Bawah: Saran Pengembangan Dinamis --}}
                <div class="bg-white rounded-[24px] border border-slate-100 shadow-sm p-6">
                    <div class="flex items-center gap-2 mb-5">
                        <i class="fa-solid fa-lightbulb text-amber-400 text-sm"></i>
                        <span class="text-xs font-semibold text-slate-500">Berdasarkan kompetensi yang perlu ditingkatkan</span>
                    </div>
                    <div class="space-y-4">
                        @if(($skorKognitif ?? 0) < ($ideal['kognitif'] ?? 80))
                        <div class="border-l-4 border-[#4298B4] bg-[#4298B4]/5 rounded-r-xl p-4 flex gap-4">
                            <div class="mt-0.5"><i class="fa-solid fa-brain text-pink-400 text-lg"></i></div>
                            <div>
                                <h6 class="text-xs font-extrabold text-slate-800">Tingkatkan Kognitif (skor {{ $skorKognitif ?? 0 }}%)</h6>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Pelajari dasar teori dan pemahaman logika algoritma yang dibutuhkan untuk jalur karier ini.</p>
                            </div>
                        </div>
                        @endif

                        @if(($skorHardskill ?? 0) < ($ideal['hardskill'] ?? 80))
                        <div class="border-l-4 border-[#88619A] bg-[#88619A]/5 rounded-r-xl p-4 flex gap-4">
                            <div class="mt-0.5"><i class="fa-solid fa-code text-[#88619A] text-lg"></i></div>
                            <div>
                                <h6 class="text-xs font-extrabold text-slate-800">Tingkatkan Hardskill (skor {{ $skorHardskill ?? 0 }}%)</h6>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Perbanyak latihan *coding* atau praktik langsung menggunakan *tools* yang sesuai dengan fokus karier IT-mu.</p>
                            </div>
                        </div>
                        @endif

                        @if(($skorSoftskill ?? 0) < ($ideal['softskill'] ?? 80))
                        <div class="border-l-4 border-amber-400 bg-amber-50 rounded-r-xl p-4 flex gap-4">
                            <div class="mt-0.5"><i class="fa-solid fa-handshake text-amber-400 text-lg"></i></div>
                            <div>
                                <h6 class="text-xs font-extrabold text-slate-800">Asah Soft Skills (skor {{ $skorSoftskill ?? 0 }}%)</h6>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Latih kemampuan *problem solving* kreatif, manajemen waktu, dan komunikasi tim.</p>
                            </div>
                        </div>
                        @endif
                        
                        @if(($jumlahTerpenuhi ?? 0) == 5)
                        <div class="border-l-4 border-emerald-500 bg-emerald-50 rounded-r-xl p-4 flex gap-4">
                            <div class="mt-0.5"><i class="fa-solid fa-star text-emerald-500 text-lg"></i></div>
                            <div>
                                <h6 class="text-xs font-extrabold text-slate-800">Kompetensi Sangat Baik!</h6>
                                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Pertahankan nilai baikmu. Fokus eksplorasi portofolio agar lebih siap terjun ke dunia industri.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </section>

        @else
            <!-- ========================================== -->
            <!-- STATE 2: JIKA USER BELUM MENGISI ASESMEN   -->
            <!-- ========================================== -->

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
                    <div class="flex gap-4 items-start border-l-2 border-[#4298B4] pl-4 -ml-[18px]">
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

            {{-- GRID 9 JALUR KARIER --}}
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