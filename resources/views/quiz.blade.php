<x-app-layout>
    <!-- KAKAK TAMBAHIN id="top-area" SEBAGAI TARGET TEMBAK SCROLL KE ATAS -->
    <div id="top-area" x-data="assessmentForm()" x-init="initForm()" class="max-w-[95%] 2xl:max-w-[1400px] mx-auto pb-20 pt-6">
        
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mb-8">
            <div class="flex justify-between items-end mb-4">
                <div>
                    <h2 class="text-xl font-bold text-[#4298B4]" x-text="`Eksplorasi Tahap ${currentStep} dari 9`"></h2>
                    <p class="text-sm text-slate-500 mt-1" x-text="getJudulSesi()"></p>
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
                    $semua_sesi = [
                        // SESI 1: 3D AR
                        1 => [
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
                        ],
                        // SESI 2: 3D VR
                        2 => [
                            "Saya memahami konsep user experience (UX) di dalam ruang 360 derajat",
                            "Saya mampu merancang alur interaksi tanpa tombol fisik (menggunakan motion controller)",
                            "Saya mengerti prinsip fisika dasar untuk objek di dalam dunia virtual",
                            "Saya mahir menggunakan Unity atau Unreal Engine untuk pengembangan VR",
                            "Saya mampu mengintegrasikan perangkat VR (seperti Oculus Quest atau VR Box)",
                            "Saya memahami teknik optimasi render agar aplikasi VR tidak menyebabkan pusing (motion sickness)",
                            "Saya mampu menjelaskan konsep dunia virtual yang kompleks kepada orang lain",
                            "Saya dapat bekerja sama dalam tim lintas media (suara, visual, koding)",
                            "Saya memiliki dedikasi tinggi dalam riset kenyamanan pengguna",
                            "Saya bermimpi menciptakan dunia virtual yang bisa dijelajahi banyak orang",
                            "Saya sangat menikmati bermain game atau menonton konten VR",
                            "Saya tertarik pada masa depan teknologi Metaverse",
                            "Saya pernah membangun aplikasi tur virtual 360 atau simulasi VR",
                            "Saya pernah mencoba dan mempelajari koding untuk VR controller",
                            "Saya memiliki portofolio proyek VR yang bisa dijalankan di headset VR"
                        ],
                        // SESI 3: 3D GAME
                        3 => [
                            "Saya mampu merancang gameplay yang menantang namun tetap seimbang",
                            "Saya memahami logika matematika untuk sistem skor, nyawa, dan level",
                            "Saya mampu menyusun skenario cerita atau misi yang menarik",
                            "Saya menguasai bahasa pemrograman C# (untuk Unity) atau C++ (untuk Unreal)",
                            "Saya mahir menggunakan Game Engine untuk mengatur assets dan animasi",
                            "Saya mampu membuat sistem AI untuk karakter musuh atau NPC",
                            "Saya mampu menerima masukan dari player untuk memperbaiki kualitas game",
                            "Saya dapat bekerja dalam tim besar (Desainer, Musisi, Programmer)",
                            "Saya memiliki ketekunan untuk memperbaiki ratusan bug yang muncul",
                            "Saya sangat mencintai dunia game dan ingin tahu proses pembuatannya",
                            "Saya ingin menciptakan game yang bisa dimainkan jutaan orang di dunia",
                            "Saya senang mempelajari desain mekanisme game yang baru",
                            "Saya pernah membuat minimal satu game sederhana (meskipun hanya tugas kuliah)",
                            "Saya pernah mengikuti Game Jam atau komunitas pengembang game",
                            "Saya memiliki akun di platform seperti Itch.io untuk memamerkan karya game"
                        ]
                    ];
                @endphp

                @foreach($semua_sesi as $nomor_sesi => $pertanyaan_sesi)
                    
                    <div x-show="currentStep === {{ $nomor_sesi }}" style="display: {{ $nomor_sesi == 1 ? 'block' : 'none' }};" class="space-y-6">
                        
                        @foreach($pertanyaan_sesi as $index => $pertanyaan)
                        @php
                            $nomor_global = (($nomor_sesi - 1) * 15) + $index + 1;
                        @endphp
                        
                        <div id="q-{{ $nomor_global }}" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:border-[#4298B4]/50 transition-all duration-300 question-card scroll-mt-[100px]">
                            <h3 class="text-lg font-bold text-slate-800 mb-6 leading-relaxed">
                                <span class="text-[#4298B4] mr-2">{{ $nomor_global }}.</span> {{ $pertanyaan }}
                            </h3>
                            
                            <div class="flex flex-wrap md:flex-nowrap gap-3 md:gap-0 justify-between items-center bg-slate-50 p-2 rounded-xl">
                                
                                <label class="flex-1 text-center cursor-pointer relative group">
                                    <input type="radio" name="q{{ $nomor_global }}" value="1" class="peer sr-only" @change="autoScroll({{ $nomor_global }}, {{ $nomor_sesi }})">
                                    <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-red-200 peer-checked:shadow-md peer-checked:text-red-500 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                        Sangat Tidak Setuju
                                    </div>
                                </label>
                                
                                <label class="flex-1 text-center cursor-pointer relative group">
                                    <input type="radio" name="q{{ $nomor_global }}" value="2" class="peer sr-only" @change="autoScroll({{ $nomor_global }}, {{ $nomor_sesi }})">
                                    <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-orange-200 peer-checked:shadow-md peer-checked:text-orange-500 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                        Tidak Setuju
                                    </div>
                                </label>

                                <label class="flex-1 text-center cursor-pointer relative group">
                                    <input type="radio" name="q{{ $nomor_global }}" value="3" class="peer sr-only" @change="autoScroll({{ $nomor_global }}, {{ $nomor_sesi }})">
                                    <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-slate-300 peer-checked:shadow-md peer-checked:text-slate-700 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                        Netral
                                    </div>
                                </label>

                                <label class="flex-1 text-center cursor-pointer relative group">
                                    <input type="radio" name="q{{ $nomor_global }}" value="4" class="peer sr-only" @change="autoScroll({{ $nomor_global }}, {{ $nomor_sesi }})">
                                    <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-[#4298B4]/40 peer-checked:shadow-md peer-checked:text-[#4298B4] text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                        Setuju
                                    </div>
                                </label>

                                <label class="flex-1 text-center cursor-pointer relative group">
                                    <input type="radio" name="q{{ $nomor_global }}" value="5" class="peer sr-only" @change="autoScroll({{ $nomor_global }}, {{ $nomor_sesi }})">
                                    <div class="px-2 py-4 rounded-xl border border-transparent peer-checked:bg-white peer-checked:border-emerald-200 peer-checked:shadow-md peer-checked:text-emerald-600 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-white">
                                        Sangat Setuju
                                    </div>
                                </label>

                            </div>
                        </div>

                        @endforeach
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

                getJudulSesi() {
                    const judul = {
                        1: "Sesi 1: Menemukan Potensimu",
                        2: "Sesi 2: Menjelajah Dimensi Baru",
                        3: "Sesi 3: Merancang Dinamika Interaktif",
                        4: "Sesi 4: Membaca Pola Tersembunyi",
                        5: "Sesi 5: Menggali Kedalaman Informasi",
                        6: "Sesi 6: Memodelkan Masa Depan",
                        7: "Sesi 7: Merangkai Arsitektur Digital",
                        8: "Sesi 8: Mengeksplorasi Logika Sistem",
                        9: "Sesi 9: Menghubungkan Dunia"
                    };
                    return judul[this.currentStep] || `Sesi ${this.currentStep}`;
                },

                autoScroll(currentIndex, currentSesi) {
                    let batasBawah = currentSesi * 15;
                    
                    if (currentIndex < batasBawah) {
                        let nextIndex = currentIndex + 1;
                        let nextElement = document.getElementById('q-' + nextIndex);
                        
                        if (nextElement) {
                            setTimeout(() => {
                                nextElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                nextElement.classList.add('ring-2', 'ring-[#4298B4]', 'ring-offset-2');
                                setTimeout(() => {
                                    nextElement.classList.remove('ring-2', 'ring-[#4298B4]', 'ring-offset-2');
                                }, 600);
                            }, 150);
                        }
                    }
                },

                nextStep() {
                    let startIndex = ((this.currentStep - 1) * 15) + 1;
                    let endIndex = this.currentStep * 15;
                    let adaYangKosong = false;

                    for (let i = startIndex; i <= endIndex; i++) {
                        let dijawab = document.querySelector(`input[name="q${i}"]:checked`);
                        
                        if (!dijawab) {
                            adaYangKosong = true;
                            let elemenKosong = document.getElementById(`q-${i}`);
                            
                            if (elemenKosong) {
                                elemenKosong.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                elemenKosong.classList.add('ring-2', 'ring-red-500', 'bg-red-50');
                                setTimeout(() => {
                                    elemenKosong.classList.remove('ring-2', 'ring-red-500', 'bg-red-50');
                                }, 1500);
                            }
                            
                            alert(`Eitss, tunggu dulu! Soal nomor ${i} belum kamu isi tuh. Yuk lengkapi dulu!`);
                            break; 
                        }
                    }

                    if (!adaYangKosong) {
                        if (this.currentStep < 9) {
                            // Ganti Sesi-nya dulu
                            this.currentStep++;
                            
                            // 🔥 FIX TARGET TEMBAK: Kasih waktu 150ms biar soal baru muncul, lalu tembak layarnya ke paling atas! 🔥
                            setTimeout(() => {
                                document.getElementById('top-area').scrollIntoView({ behavior: 'smooth', block: 'start' });
                                // Backup buat browser yang bandel
                                window.scrollTo(0, 0);
                            }, 150);
                            
                        } else {
                            alert("BINGO! Semua 135 soal selesai. Di sini nanti mesin SPK Backend beraksi memproses jawabanmu!");
                        }
                    }
                }
            }
        }
    </script>
</x-app-layout>