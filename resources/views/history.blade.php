<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-800">Riwayat Asesmen</h1>
                <p class="text-slate-500 mt-1 font-medium">Lihat kembali hasil rekomendasi sebelumnya</p>
            </div>
            <a href="{{ route('assessment.index') }}" class="inline-flex items-center gap-2 bg-[#4298B4] hover:bg-[#367d94] text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-[#4298B4]/20 transition-all active:scale-95">
                <i class="fa-solid fa-plus text-sm"></i>
                Asesmen Baru
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-5 text-[11px] font-bold text-slate-400 uppercase tracking-wider">No</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Tanggal & Waktu</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Rekomendasi Utama</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Skor Topsis</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($history_data as $index => $data)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-6 py-5 text-sm font-medium text-slate-400">{{ $index + 1 }}</td>
                            <td class="px-6 py-5 text-sm font-semibold text-slate-600">
                                {{ $data['tanggal'] }}
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-sm font-bold text-slate-800">{{ $data['rekomendasi'] }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <div class="inline-flex items-center px-3 py-1 rounded-full bg-[#4298B4]/10 text-[#4298B4] text-xs font-bold border border-[#4298B4]/20">
                                    {{ $data['skor'] }}
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <a href="{{ route('result.show', $data['id']) }}" class="...">
                                <i class="fa-solid fa-eye text-xs"></i> Lihat Hasil
                                </a>
                            </td>
                        </tr>   
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="bg-slate-50 h-16 w-16 rounded-full flex items-center justify-center mb-4">
                                        <i class="fa-solid fa-folder-open text-slate-300 text-2xl"></i>
                                    </div>
                                    <p class="text-slate-400 font-medium">Belum ada riwayat asesmen.</p>
                                    <a href="{{ route('assessment.index') }}" class="text-[#4298B4] text-sm font-bold mt-2">Mulai Asesmen Sekarang →</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <p class="mt-6 text-center text-xs text-slate-400 font-medium">
            Sistem menyimpan riwayat asesmen untuk membantu Anda memantau perkembangan karier.
        </p>
    </div>
</x-app-layout>