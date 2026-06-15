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
                    $pertanyaan_dummy = [
                        "Saya menikmati merancang antarmuka pengguna yang intuitif untuk memecahkan masalah nyata.",
                        "Saya lebih suka bekerja dengan kumpulan data besar untuk mengekstrak wawasan yang bermakna.",
                        "Saya nyaman mempelajari bahasa pemrograman baru dengan cepat.",
                        "Saya tertarik mengidentifikasi kerentanan keamanan dalam sistem perangkat lunak.",
                        "Saya merasa machine learning dan jaringan saraf tiruan sangat menarik.",
                        "Saya suka memastikan kualitas kode melalui pengujian yang teliti.",
                        "Saya senang berkolaborasi dengan tim lintas fungsi dalam proyek jangka panjang.",
                        "Saya tertarik dengan infrastruktur cloud dan penyebaran aplikasi.",
                        "Saya lebih memilih tugas logis dan matematis yang kompleks.",
                        "Saya menikmati proses debugging dan memecahkan teka-teki logika.",
                        "Saya dapat memecahkan masalah algoritma kompleks secara efisien.",
                        "Saya mampu memimpin tim kecil untuk menyelesaikan modul proyek.",
                        "Saya lebih suka mengerjakan tugas otomatisasi dan skrip.",
                        "Saya selalu mengikuti tren teknologi dan riset terbaru.",
                        "Saya menikmati menulis kode yang bersih, terdokumentasi dengan baik, dan mudah dipelihara."
                    ];
                @endphp

                @foreach($pertanyaan_dummy as $index => $pertanyaan)
                <div id="q-{{ $index + 1 }}" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:border-[#4298B4]/50 transition-colors question-card">
                    <h3 class="text-lg font-bold text-slate-800 mb-6">
                        <span class="text-[#4298B4] mr-1">{{ $index + 1 }}.</span> {{ $pertanyaan }}
                    </h3>
                    
                    <div class="flex flex-wrap md:flex-nowrap gap-3 md:gap-0 justify-between items-center bg-slate-50 p-2 rounded-xl">
                        
                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="1" class="peer sr-only" @change="autoScroll({{ $index + 1 }})" required>
                            <div class="px-2 py-3 rounded-lg border border-transparent peer-checked:bg-white peer-checked:border-red-200 peer-checked:shadow-sm peer-checked:text-red-500 text-slate-500 font-medium text-sm transition-all hover:bg-white">
                                Sangat Tidak Setuju
                            </div>
                        </label>
                        
                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="2" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-3 rounded-lg border border-transparent peer-checked:bg-white peer-checked:border-orange-200 peer-checked:shadow-sm peer-checked:text-orange-500 text-slate-500 font-medium text-sm transition-all hover:bg-white">
                                Tidak Setuju
                            </div>
                        </label>

                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="3" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-3 rounded-lg border border-transparent peer-checked:bg-white peer-checked:border-slate-300 peer-checked:shadow-sm peer-checked:text-slate-700 text-slate-500 font-medium text-sm transition-all hover:bg-white">
                                Netral
                            </div>
                        </label>

                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="4" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-3 rounded-lg border border-transparent peer-checked:bg-white peer-checked:border-[#4298B4]/40 peer-checked:shadow-sm peer-checked:text-[#4298B4] text-slate-500 font-medium text-sm transition-all hover:bg-white">
                                Setuju
                            </div>
                        </label>

                        <label class="flex-1 text-center cursor-pointer relative group">
                            <input type="radio" name="q{{ $index + 1 }}" value="5" class="peer sr-only" @change="autoScroll({{ $index + 1 }})">
                            <div class="px-2 py-3 rounded-lg border border-transparent peer-checked:bg-white peer-checked:border-emerald-200 peer-checked:shadow-sm peer-checked:text-emerald-600 text-slate-500 font-medium text-sm transition-all hover:bg-white">
                                Sangat Setuju
                            </div>
                        </label>

                    </div>
                </div>
                @endforeach

            </div>

            <div class="mt-12 text-center sticky bottom-8 z-30">
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
                        setTimeout(() => {
                            const yOffset = -150; 
                            const y = nextElement.getBoundingClientRect().top + window.pageYOffset + yOffset;
                            
                            window.scrollTo({top: y, behavior: 'smooth'});
                            
                            nextElement.classList.add('ring-2', 'ring-[#4298B4]', 'ring-offset-2');
                            setTimeout(() => {
                                nextElement.classList.remove('ring-2', 'ring-[#4298B4]', 'ring-offset-2');
                            }, 800);

                        }, 300);
                    }
                },

                nextStep() {
                    if (this.currentStep < 9) {
                        this.currentStep++;
                        window.scrollTo({top: 0, behavior: 'smooth'}); 
                    } else {
                        alert("Ini tahap simulasi Frontend. Nanti mesin SPK Backend-nya jalan di sini!");
                    }
                }
            }
        }
    </script>
</x-app-layout>