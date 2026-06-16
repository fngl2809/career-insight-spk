<x-app-layout>
    <div x-data="assessmentForm()" x-init="initForm()" class="max-w-[95%] 2xl:max-w-[1400px] mx-auto pb-20 pt-6">
        
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mb-8 sticky top-[88px] z-30">
            <div class="flex justify-between items-end mb-4">
                <div>
                    <h2 class="text-xl font-bold text-[#4298B4]" x-text="`Eksplorasi Tahap ${currentStep} dari 9`"></h2>
                    <p class="text-sm text-slate-500 mt-1" x-text="`Sesi ${currentStep}: Menemukan Potensimu`"></p>
                </div>
                <div class="text-sm font-bold text-slate-600" x-text="`${Math.round((currentStep - 1) * 11.11)}% selesai`"></div>
            </div>
            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                <div class="bg-gradient-to-r from-[#4298B4] to-[#88619A] h-2.5 rounded-full transition-all duration-500 ease-out" :style="`width: ${(currentStep - 1) * 11.11}%`"></div>
            </div>
        </div>

        <form id="quizForm" action="#" method="POST">
            @csrf
            
            <div class="space-y-6">
                
                @php
                    // Soal Sesi 1: 3D AR
                    $pertanyaan_dummy = [
                        "Saya memahami konsep koordinat 3D (X, Y, Z) dan pencahayaan objek",
                        "Saya mampu merancang bagaimana objek digital harus muncul di kamera HP",
                        "Saya memiliki imajinasi spasial yang baik dalam menata ruang virtual",
                        "Saya mahir menggunakan tools pengembangan AR (seperti Vuforia, Spark AR, atau ARCore)",
                        "Saya mampu membuat atau mengedit objek 3D (Blender, Maya, atau Cinema 4D)",
                        "Saya mampu melakukan koding untuk interaksi objek AR di Unity",
                        "Saya sangat memperhatikan detail visual dan estetika desain",
                        "Saya mampu bekerja sama dengan desainer grafis dan programmer",
                        "Saya sabar dalam melakukan testing pada berbagai perangkat kamera",
                        "Saya sangat tertarik pada teknologi yang menggabungkan dunia maya dan nyata",
                        "Saya senang mencoba filter-filter AR terbaru di Instagram atau TikTok",
                        "Saya ingin menciptakan aplikasi inovatif berbasis Augmented Reality",
                        "Saya pernah membuat filter AR sederhana atau aplikasi katalog AR",
                        "Saya memiliki portofolio aset 3D yang pernah saya buat sendiri",
                        "Saya pernah mengikuti pameran atau kompetisi karya digital"
                    ];
                @endphp

                @foreach($pertanyaan_dummy as $index => $pertanyaan)
                <div id="q-{{ $index + 1 }}" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:border-[#4298B4]/50 transition-colors question-card scroll-mt-[200px]">
                    <h3 class="text-lg font-bold text-slate-800 mb-6 leading-relaxed">
                        <span class="text-[#4298B4] mr-2">{{ $index + 1 }}.</span> {{ $pertanyaan }}
                    </h3>
                    
                    <div class="flex flex-wrap md:flex-nowrap gap-3 md:gap-0 justify-between items-center bg-slate-50 p-2 rounded-xl">
                        
                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="1" class="peer sr-only" @change="autoScroll({{ $index + 1 }})" required>
                            <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-red-200 peer-checked:shadow-md peer-checked:text-red-500 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                Sangat Tidak Setuju
                            </div>
                        </label>
                        
                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="2" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-orange-200 peer-checked:shadow-md peer-checked:text-orange-500 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                Tidak Setuju
                            </div>
                        </label>

                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="3" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-slate-300 peer-checked:shadow-md peer-checked:text-slate-700 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                Netral
                            </div>
                        </label>

                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="4" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-[#4298B4]/40 peer-checked:shadow-md peer-checked:text-[#4298B4] text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                Setuju
                            </div>
                        </label>

                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="5" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-emerald-200 peer-checked:shadow-md peer-checked:text-emerald-600 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                Sangat Setuju
                            </div>
                        </label>

                    </div>
                </div>
                @endforeach

            </div>

            <div class="mt-12 text-center pb-8">
                <button type="button" @click="nextStep()" class="px-16 py-5 bg-[#C9BBCF] hover:bg-[#A993B4] text-white text-xl font-bold rounded-2xl transition-all shadow-xl shadow-slate-200 mx-auto block w-full md:w-auto">
                    <span x-text="currentStep < 9 ? `Lanjut: Tahap ${currentStep + 1} →` : 'Kirim Jawaban & Hitung Potensi'"></span>
                </button>
            </div>

        </form>

    </div>

    <script>
        function assessmentForm() {
            return {
                currentStep: 1,
                
                initForm() {
                    window.scrollTo(0, 0);
                },

                autoScroll(currentIndex) {
                    let nextIndex = currentIndex + 1;
                    let nextElement = document.getElementById('q-' + nextIndex);
                    
                    if (nextElement) {
                        // Jeda dipersingkat jadi 150ms biar lebih responsif
                        setTimeout(() => {
                            // Menggunakan metode scrollIntoView bawaan browser yang lebih mulus
                            nextElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            
                            // Efek kedip biru penanda fokus
                            nextElement.classList.add('ring-2', 'ring-[#4298B4]', 'ring-offset-2');
                            setTimeout(() => {
                                nextElement.classList.remove('ring-2', 'ring-[#4298B4]', 'ring-offset-2');
                            }, 600);

                        }, 150);
                    }
                },

                nextStep() {
                    if (this.currentStep < 9) {
                        this.currentStep++;
                        // Balik ke atas pas ganti tahap
                        window.scrollTo({top: 0, behavior: 'smooth'}); 
                    } else {
                        alert("BINGO! Simulasi selesai. Di sini nanti Backend ngitung Profile Matching, AHP, & TOPSIS!");
                    }
                }
            }
        }
    </script>
</x-app-layout>