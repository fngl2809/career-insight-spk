<x-app-layout>
    <div class="max-w-[95%] 2xl:max-w-[1400px] mx-auto pb-12 pt-4">
        
        <div class="text-center space-y-4 mb-12">
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-[#4298B4]/10 text-[#4298B4] text-xs font-bold border border-[#4298B4]/20">
                <i class="fa-solid fa-layer-group"></i> 9 Sesi - 135 Pertanyaan
            </div>
            <h1 class="text-5xl font-black text-slate-800">Sebelum Kamu Mulai</h1>
            <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed">
                Baca panduan berikut agar hasil rekomendasimu akurat dan sesuai dengan potensi sesungguhnya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-6 hover:shadow-xl transition-all group">
                <div class="w-20 h-20 bg-white rounded-2xl shadow-lg shadow-[#4298B4]/10 flex items-center justify-center border border-slate-50 group-hover:scale-110 transition-transform">
                    <img src="https://cdn-icons-png.flaticon.com/512/1149/1149168.png" class="w-12 h-12 object-contain" alt="Icon">
                </div>
                <div class="space-y-3">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Panduan 01</span>
                    <h3 class="text-xl font-bold text-slate-800">Jujur Pada Dirimu</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Jawab berdasarkan kemampuan, minat, dan kepribadianmu saat ini. Tidak ada jawaban benar atau salah.</p>
                </div>
            </div>

            <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-6 hover:shadow-xl transition-all group">
                <div class="w-20 h-20 bg-white rounded-2xl shadow-lg shadow-[#88619A]/10 flex items-center justify-center border border-slate-50 group-hover:scale-110 transition-transform">
                    <img src="https://cdn-icons-png.flaticon.com/512/3589/3589839.png" class="w-12 h-12 object-contain" alt="Icon">
                </div>
                <div class="space-y-3">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Panduan 02</span>
                    <h3 class="text-xl font-bold text-slate-800">Pahami Skala Penilaian</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Pilih opsi yang paling mencerminkan dirimu. Jawaban yang tegas meningkatkan akurasi rekomendasi.</p>
                </div>
            </div>

            <div class="bg-white p-10 rounded-[40px] shadow-sm border border-slate-100 flex flex-col items-center text-center space-y-6 hover:shadow-xl transition-all group">
                <div class="w-20 h-20 bg-white rounded-2xl shadow-lg shadow-[#22C55E]/10 flex items-center justify-center border border-slate-50 group-hover:scale-110 transition-transform">
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="w-12 h-12 object-contain" alt="Icon">
                </div>
                <div class="space-y-3">
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Panduan 03</span>
                    <h3 class="text-xl font-bold text-slate-800">Selesaikan Semua Sesi</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">Asesmen terdiri dari 9 sesi eksplorasi dengan 135 pertanyaan. Selesaikan semua untuk hasil terbaik.</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-[40px] p-8 max-w-4xl mx-auto mb-16">
            <div class="text-center space-y-8">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Skala Jawaban</span>
                <div class="flex flex-wrap justify-center gap-4 md:gap-8">
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm">STS</span>
                        <span class="text-[10px] font-medium text-slate-500">Sangat Tidak Setuju</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm">TS</span>
                        <span class="text-[10px] font-medium text-slate-500">Tidak Setuju</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm">N</span>
                        <span class="text-[10px] font-medium text-slate-500">Netral</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm">S</span>
                        <span class="text-[10px] font-medium text-slate-500">Setuju</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 bg-white border border-slate-200 rounded-lg text-xs font-bold text-slate-700 shadow-sm">SS</span>
                        <span class="text-[10px] font-medium text-slate-500">Sangat Setuju</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="px-20 py-6 bg-[#4298B4] hover:bg-[#327A94] text-white text-2xl font-extrabold rounded-[24px] transition-all shadow-2xl shadow-[#4298B4]/30 flex items-center justify-center gap-5 mx-auto group">
                Mulai Asesmen 
                <i class="fa-solid fa-arrow-right text-xl group-hover:translate-x-3 transition-transform"></i>
            </button>
        </div>

    </div>
</x-app-layout>