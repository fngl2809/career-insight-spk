<x-app-layout>
    <div class="max-w-[1100px] mx-auto pt-10 pb-8 px-4 md:px-0">
        
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-[#4298B4]/10 text-[#4298B4] text-[12px] font-semibold border border-[#4298B4]/20">
                <i class="fa-solid fa-layer-group"></i> 9 Sesi - 135 Pertanyaan
            </div>
            <h1 class="text-[36px] font-bold text-slate-800 mt-6 mb-3">Sebelum Kamu Mulai</h1>
            <p class="text-slate-500 text-[15px] max-w-2xl mx-auto leading-relaxed">
                Baca panduan berikut agar hasil rekomendasimu akurat dan sesuai dengan potensi sesungguhnya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center hover:shadow-lg transition-all group">
                <div class="w-16 h-16 mb-6 bg-[#F0F7FA] rounded-2xl flex items-center justify-center group-hover:scale-105 transition-transform">
                    <img src="https://plus.unsplash.com/premium_vector-1745505033893-2f2647f44d0c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fG1pcnJvcnxlbnwwfHwwfHx8MA%3D%3D" class="w-8 h-8 object-contain opacity-80" alt="Icon">
                </div>
                <span class="text-[11px] font-bold text-[#8BA3CB] uppercase tracking-widest mb-2.5">Panduan 01</span>
                <h3 class="text-[19px] font-bold text-slate-800 mb-2.5">Jujur Pada Dirimu</h3>
                <p class="text-[14px] text-slate-500 leading-relaxed">Jawab berdasarkan kemampuan, minat, dan kepribadianmu saat ini. Tidak ada jawaban benar atau salah.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center hover:shadow-lg transition-all group">
                <div class="w-16 h-16 mb-6 bg-[#F5F3F7] rounded-2xl flex items-center justify-center group-hover:scale-105 transition-transform">
                    <img src="https://cdn-icons-png.flaticon.com/512/3589/3589839.png" class="w-8 h-8 object-contain opacity-80" alt="Icon">
                </div>
                <span class="text-[11px] font-bold text-[#8BA3CB] uppercase tracking-widest mb-2.5">Panduan 02</span>
                <h3 class="text-[19px] font-bold text-slate-800 mb-2.5">Pahami Skala Penilaian</h3>
                <p class="text-[14px] text-slate-500 leading-relaxed">Pilih opsi yang paling mencerminkan dirimu. Jawaban yang tegas meningkatkan akurasi rekomendasi.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex flex-col items-center text-center hover:shadow-lg transition-all group">
                <div class="w-16 h-16 mb-6 bg-[#F0FDF4] rounded-2xl flex items-center justify-center group-hover:scale-105 transition-transform">
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="w-8 h-8 object-contain opacity-80" alt="Icon">
                </div>
                <span class="text-[11px] font-bold text-[#8BA3CB] uppercase tracking-widest mb-2.5">Panduan 03</span>
                <h3 class="text-[19px] font-bold text-slate-800 mb-2.5">Selesaikan Semua Sesi</h3>
                <p class="text-[14px] text-slate-500 leading-relaxed">Asesmen terdiri dari 9 sesi eksplorasi dengan 135 pertanyaan. Selesaikan semua untuk hasil terbaik.</p>
            </div>
        </div>

        <div class="bg-[#F8FAFC] border border-slate-200/60 rounded-2xl p-7 max-w-[950px] mx-auto mb-10">
            <div class="text-center">
                <span class="text-[12px] font-bold text-[#8BA3CB] uppercase tracking-widest block mb-5">Skala Jawaban</span>
                <div class="flex flex-wrap justify-center gap-x-8 gap-y-4">
                    <div class="flex items-center gap-2.5">
                        <span class="text-[12px] font-bold text-[#4298B4]">STS</span>
                        <span class="text-[14px] font-medium text-slate-500">Sangat Tidak Setuju</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="text-[12px] font-bold text-[#4298B4]">TS</span>
                        <span class="text-[14px] font-medium text-slate-500">Tidak Setuju</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="text-[12px] font-bold text-[#4298B4]">CS</span>
                        <span class="text-[14px] font-medium text-slate-500">Cukup Setuju</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="text-[12px] font-bold text-[#4298B4]">S</span>
                        <span class="text-[14px] font-medium text-slate-500">Setuju</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="text-[12px] font-bold text-[#4298B4]">SS</span>
                        <span class="text-[14px] font-medium text-slate-500">Sangat Setuju</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('quiz.index') }}" class="inline-flex px-12 py-4 bg-[#4298B4] hover:bg-[#327A94] text-white text-[16px] font-bold rounded-xl transition-all shadow-lg shadow-[#4298B4]/20 items-center justify-center gap-2.5 group">
                Mulai Asesmen 
                <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1.5 transition-transform"></i>
            </a>
        </div>

    </div>
</x-app-layout>