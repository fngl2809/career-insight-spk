<x-app-layout>
    <div class="max-w-[1100px] mx-auto pt-10 pb-8 px-4 md:px-0">
        
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-[#4298B4]/10 text-[#4298B4] text-[12px] font-semibold border border-[#4298B4]/20 shadow-sm">
                <i class="fa-solid fa-layer-group"></i> 9 Sesi - 135 Pertanyaan
            </div>
            <h1 class="text-[36px] font-extrabold text-slate-800 mt-6 mb-3 tracking-tight">Sebelum Kamu Mulai</h1>
            <p class="text-slate-500 text-[16px] max-w-2xl mx-auto leading-relaxed">
                Baca panduan berikut agar hasil rekomendasimu akurat dan sesuai dengan potensi sesungguhnya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white p-8 rounded-2xl shadow-md border border-slate-100 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-20 h-20 mb-6 bg-[#4298B4]/10 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <img src="https://plus.unsplash.com/premium_vector-1745505033893-2f2647f44d0c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fG1pcnJvcnxlbnwwfHwwfHx8MA%3D%3D" class="w-10 h-10 object-contain opacity-90" alt="Icon Jujur">
                </div>
                <span class="text-[11px] font-bold text-[#4298B4] uppercase tracking-widest mb-2.5">Panduan 01</span>
                <h3 class="text-[20px] font-bold text-slate-800 mb-3">Jujur Pada Dirimu</h3>
                <p class="text-[14px] text-slate-500 leading-relaxed">Jawab berdasarkan kemampuan, minat, dan kepribadianmu saat ini. Tidak ada jawaban benar atau salah.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-md border border-slate-100 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-20 h-20 mb-6 bg-[#4298B4]/10 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/3589/3589839.png" class="w-10 h-10 object-contain opacity-90" alt="Icon Skala">
                </div>
                <span class="text-[11px] font-bold text-[#4298B4] uppercase tracking-widest mb-2.5">Panduan 02</span>
                <h3 class="text-[20px] font-bold text-slate-800 mb-3">Pahami Skala Penilaian</h3>
                <p class="text-[14px] text-slate-500 leading-relaxed">Pilih opsi yang paling mencerminkan dirimu. Jawaban yang tegas meningkatkan akurasi rekomendasi.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-md border border-slate-100 flex flex-col items-center text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-20 h-20 mb-6 bg-[#4298B4]/10 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="w-10 h-10 object-contain opacity-90" alt="Icon Selesai">
                </div>
                <span class="text-[11px] font-bold text-[#4298B4] uppercase tracking-widest mb-2.5">Panduan 03</span>
                <h3 class="text-[20px] font-bold text-slate-800 mb-3">Selesaikan Semua Sesi</h3>
                <p class="text-[14px] text-slate-500 leading-relaxed">Asesmen terdiri dari 9 sesi eksplorasi dengan 135 pertanyaan. Selesaikan semua untuk hasil terbaik.</p>
            </div>
        </div>

       <div class="bg-white shadow-sm border border-slate-200 rounded-2xl py-5 px-6 max-w-[850px] mx-auto mb-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-[#4298B4]/5 rounded-bl-full -z-10"></div>
            
            <div class="text-center">
                <span class="text-[12px] font-bold text-slate-800 uppercase tracking-widest block mb-4">Skala Jawaban</span>
                <div class="flex flex-wrap justify-center gap-3 md:gap-4">
                    
                    <div class="flex items-center gap-2.5 bg-slate-50 hover:bg-slate-100 transition-colors px-3 py-2 rounded-lg border border-slate-200">
                        <span class="bg-white px-2 py-1 rounded shadow-sm text-[12px] font-black text-red-500 border border-red-100">STS</span>
                        <span class="text-[13px] font-medium text-slate-600">Sangat Tidak Setuju</span>
                    </div>
                    
                    <div class="flex items-center gap-2.5 bg-slate-50 hover:bg-slate-100 transition-colors px-3 py-2 rounded-lg border border-slate-200">
                        <span class="bg-white px-2 py-1 rounded shadow-sm text-[12px] font-black text-orange-500 border border-orange-100">TS</span>
                        <span class="text-[13px] font-medium text-slate-600">Tidak Setuju</span>
                    </div>
                    
                    <div class="flex items-center gap-2.5 bg-slate-50 hover:bg-slate-100 transition-colors px-3 py-2 rounded-lg border border-slate-200">
                        <span class="bg-white px-2 py-1 rounded shadow-sm text-[12px] font-black text-amber-500 border border-amber-100">CS</span>
                        <span class="text-[13px] font-medium text-slate-600">Cukup Setuju</span>
                    </div>
                    
                    <div class="flex items-center gap-2.5 bg-slate-50 hover:bg-slate-100 transition-colors px-3 py-2 rounded-lg border border-slate-200">
                        <span class="bg-white px-2 py-1 rounded shadow-sm text-[12px] font-black text-blue-500 border border-blue-100">S</span>
                        <span class="text-[13px] font-medium text-slate-600">Setuju</span>
                    </div>
                    
                    <div class="flex items-center gap-2.5 bg-slate-50 hover:bg-slate-100 transition-colors px-3 py-2 rounded-lg border border-slate-200">
                        <span class="bg-white px-2 py-1 rounded shadow-sm text-[12px] font-black text-emerald-500 border border-emerald-100">SS</span>
                        <span class="text-[13px] font-medium text-slate-600">Sangat Setuju</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('quiz.index') }}" class="inline-flex px-14 py-4 md:py-5 bg-[#4298B4] hover:bg-[#2C7891] text-white text-[16px] md:text-[18px] font-bold rounded-2xl transition-all duration-300 shadow-[0_8px_30px_rgb(66,152,180,0.4)] hover:shadow-[0_8px_30px_rgb(66,152,180,0.6)] hover:-translate-y-1 items-center justify-center gap-3 group">
                Mulai Asesmen Sekarang
                <i class="fa-solid fa-arrow-right text-base group-hover:translate-x-2 transition-transform duration-300"></i>
            </a>
        </div>

    </div>
</x-app-layout>