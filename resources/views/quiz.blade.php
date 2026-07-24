<x-app-layout>
    <!-- KAKAK TAMBAHIN id="top-area" SEBAGAI TARGET TEMBAK SCROLL KE ATAS -->
    <div id="top-area" x-data="assessmentForm()" x-init="initForm()" class="max-w-[95%] 2xl:max-w-[1400px] mx-auto pb-20 pt-6">
        
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 mb-8">
            <div class="flex justify-between items-end mb-4">
                <div>
                    <!-- Berubah jadi dari 27 Tahap -->
                    <h2 class="text-xl font-bold text-[#4298B4]" x-text="`Eksplorasi Tahap ${currentStep} dari 27`"></h2>
                    <p class="text-sm text-slate-500 mt-1" x-text="getJudulSesi()"></p>
                </div>
                <!-- Progress bar dihitung per tahap (100% / 26 step pergerakan) -->
                <div class="text-sm font-bold text-slate-600" x-text="`${Math.round((currentStep - 1) * 3.846)}% selesai`"></div>
            </div>
            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                <div class="bg-gradient-to-r from-[#4298B4] to-[#88619A] h-2.5 rounded-full transition-all duration-500 ease-out" :style="`width: ${(currentStep - 1) * 3.846}%`"></div>
            </div>
        </div>

        <form id="quizForm" action="{{ route('quiz.store') }}" method="POST">
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
                        ],
                        // SESI 4: DATA ANALYST
                        4 => [
                            "Saya mampu memahami konsep statistik dasar untuk menarik kesimpulan dari data",
                            "Saya memiliki ketelitian tinggi dalam memeriksa keaslian dan kebersihan data",
                            "Saya mampu mengubah data angka menjadi cerita atau narasi yang mudah dipahami",
                            "Saya mahir menggunakan Microsoft Excel tingkat lanjut (Pivot, VLOOKUP, Macro)",
                            "Saya mampu menggunakan bahasa SQL untuk mengambil data dari database",
                            "Saya mampu membuat dashboard interaktif (Tableau, PowerBI, atau Google Looker)",
                            "Saya percaya diri mempresentasikan hasil temuan data kepada atasan/klien",
                            "Saya mampu bekerjasama dengan tim operasional untuk memahami kebutuhan data mereka",
                            "Saya memiliki rasa ingin tahu yang besar terhadap penyebab di balik perubahan angka data",
                            "Saya sangat tertarik bekerja dengan laporan dan grafik setiap hari",
                            "Saya senang mencari solusi bisnis melalui analisis angka",
                            "Saya ingin menjadi seorang ahli yang dipercaya dalam urusan validitas data",
                            "Saya pernah mengerjakan proyek analisis data penjualan atau data akademik",
                            "Saya memiliki sertifikat pelatihan terkait Data Analytics",
                            "Saya memiliki portofolio laporan data yang tersusun rapi"
                        ],
                        // SESI 5: DATA MINING
                        5 => [
                            "Saya memahami logika algoritma klasifikasi, asosiasi, dan clustering",
                            "Saya mampu melakukan preprocessing data (menghilangkan noise atau data hilang)",
                            "Saya memiliki logika kuat dalam menentukan variabel mana yang paling berpengaruh pada pola data",
                            "Saya mampu mengoperasikan tools penambangan data (seperti RapidMiner, KNIME, atau Weka)",
                            "Saya menguasai teknik pemrosesan data teks (Text Mining) atau data transaksi",
                            "Saya mampu mengintegrasikan hasil mining ke dalam aplikasi atau sistem lain",
                            "Saya sabar dalam melakukan iterasi/perulangan eksperimen data berkali-kali",
                            "Saya mampu menjelaskan pola teknis yang rumit menjadi strategi yang sederhana",
                            "Saya dapat bekerja sama dalam tim riset untuk menemukan insight tersembunyi",
                            "Saya sangat tertarik menemukan rahasia atau pola yang tidak terlihat oleh orang biasa",
                            "Saya senang mengeksplorasi kumpulan data besar (Big Data)",
                            "Saya bercita-cita mengembangkan karier sebagai Data Mining Engineer",
                            "Saya pernah melakukan riset atau tugas kuliah menggunakan teknik Data Mining",
                            "Saya pernah mempublikasikan hasil temuan pola data di blog teknis atau jurnal",
                            "Saya memiliki portofolio penggunaan tools seperti RapidMiner atau Python Mining"
                        ],
                        // SESI 6: DATA SCIENCE
                        6 => [
                            "Saya memahami konsep Supervised dan Unsupervised Learning secara mendalam",
                            "Saya mampu merancang eksperimen untuk menguji akurasi sebuah model prediktif",
                            "Saya memiliki logika matematika yang kuat untuk memahami rumus di balik model data",
                            "Saya mahir koding menggunakan Python atau R untuk keperluan Machine Learning",
                            "Saya mampu menggunakan library seperti Scikit-Learn, TensorFlow, atau Pandas",
                            "Saya mampu mengolah data dalam jumlah sangat besar menggunakan teknologi Cloud atau Spark",
                            "Saya memiliki kemampuan memecahkan masalah (problem solving) yang kreatif",
                            "Saya mampu mendengarkan kebutuhan bisnis dan mengubahnya menjadi model data",
                            "Saya dapat bekerja dalam tim lintas divisi (misal: tim marketing atau tim enginering)",
                            "Saya sangat tertarik menciptakan sistem cerdas yang bisa memprediksi masa depan",
                            "Saya senang terus belajar algoritma terbaru yang sedang tren di dunia IT",
                            "Saya berminat kuat menjadi seorang Data Scientist profesional",
                            "Saya pernah membangun model prediksi (seperti prediksi harga, klasifikasi gambar, dll)",
                            "Saya pernah mengikuti kompetisi data (seperti Kaggle atau Satria Data)",
                            "Saya memiliki portofolio koding data di GitHub yang aktif"
                        ],
                        // SESI 7: WEB
                        7 => [
                            "Saya memahami alur kerja pengiriman data dari browser ke server",
                            "Saya mampu merancang skema database relasional yang optimal",
                            "Saya memiliki logika kuat dalam menyelesaikan bug pada tampilan maupun sistem",
                            "Saya mahir HTML, CSS, dan JavaScript tingkat lanjut",
                            "Saya mampu menggunakan framework (seperti Laravel, React, atau Vite)",
                            "Saya terbiasa melakukan deployment (mengunggah website agar bisa diakses online)",
                            "Saya mampu bekerjasama antar tim (misal: tim desain ke tim database)",
                            "Saya komunikatif dalam menjelaskan fitur web kepada klien",
                            "Saya teliti dalam menjaga keamanan data pengguna di dalam website",
                            "Saya senang menciptakan sistem yang memudahkan akses informasi banyak orang",
                            "Saya selalu ingin tahu teknologi web terbaru yang muncul setiap bulan",
                            "Saya berniat serius menjadi seorang Fullstack Web Developer",
                            "Saya pernah membangun sistem informasi berbasis web dari awal sampai selesai",
                            "Saya memiliki portofolio koding web di GitHub atau platform serupa",
                            "Saya pernah mengikuti proyek pembuatan website secara profesional"
                        ],
                        // SESI 8: AI 
                        8 => [
                            "Saya memahami konsep dasar Jaringan Syaraf Tiruan (Neural Networks)",
                            "Saya mampu merancang sistem yang bisa belajar sendiri dari kumpulan data",
                            "Saya memiliki logika matematika yang sangat kuat untuk pengolahan matriks",
                            "Saya mahir menggunakan bahasa Python untuk keperluan AI",
                            "Saya mampu menggunakan tools seperti OpenCV (Computer Vision) atau NLTK (NLP)",
                            "Saya menguasai teknik pelatihan model cerdas (Training Model)",
                            "Saya memiliki cara berpikir kritis terhadap dampak etika dari kecerdasan buatan",
                            "Saya mampu berkolaborasi dengan ahli di berbagai bidang untuk otomasi",
                            "Saya senang bereksperimen dengan hal-hal baru yang belum pernah dilakukan sebelumnya",
                            "Saya sangat bersemangat membuat mesin yang bisa \"berpikir\" seperti manusia",
                            "Saya rutin mengikuti kabar perkembangan teknologi AI terbaru (seperti GPT, dll)",
                            "Saya ingin berkarier sebagai AI Engineer atau Peneliti AI",
                            "Saya pernah membuat sistem deteksi objek atau pengenalan suara",
                            "Saya pernah mengikuti kursus sertifikasi AI dari platform kredibel",
                            "Saya memiliki repositori GitHub yang berisi proyek implementasi AI"
                        ],
                        // SESI 9: MOBILE
                        9 => [
                            "Saya memahami siklus hidup aplikasi mobile (Activity Life Cycle)",
                            "Saya mampu merancang navigasi aplikasi yang simpel namun intuitif",
                            "Saya memahami cara kerja penyimpanan data lokal di memori HP",
                            "Saya mahir bahasa pemrograman Java atau Kotlin untuk Android",
                            "Saya terbiasa menggunakan Android Studio sebagai alat pengembangan utama",
                            "Saya mampu menghubungkan aplikasi Android dengan API dari internet",
                            "Saya sabar dalam memperbaiki aplikasi agar tidak sering force close",
                            "Saya mampu berkolaborasi dengan desainer UI/UX untuk tampilan aplikasi",
                            "Saya bisa menjelaskan cara kerja aplikasi kepada calon pengguna secara sabar",
                            "Saya sangat senang membuat aplikasi yang praktis dan bisa dibawa di saku",
                            "Saya rutin memantau update terbaru dari Google Android Developer",
                            "Saya ingin berkarier di perusahaan pengembang aplikasi mobile ternama",
                            "Saya pernah membuat minimal satu aplikasi Android yang berhasil jalan di HP",
                            "Saya pernah mempublikasikan aplikasi atau koding mobile di platform publik",
                            "Saya memiliki sertifikat pelatihan terkait pengembangan aplikasi mobile"
                        ]
                    ];

                    $global_step = 1; // Menghitung dari halaman 1 sampai 27
                    $q_number = 1; // Menghitung nomor soal dari 1 sampai 135
                @endphp

                @foreach($semua_sesi as $nomor_sesi => $pertanyaan_sesi)
                    
                    @php
                        // Memecah 15 soal menjadi 3 bagian (masing-masing 5 soal)
                        $chunks = array_chunk($pertanyaan_sesi, 5);
                    @endphp

                    @foreach($chunks as $chunkIndex => $chunk)
                        <!-- Menampilkan hanya tahap yang aktif -->
                        <div x-show="currentStep === {{ $global_step }}" style="display: {{ $global_step == 1 ? 'block' : 'none' }};" class="space-y-6">
                            
                            @foreach($chunk as $pertanyaan)
                            
                                <div id="q-{{ $q_number }}" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:border-[#4298B4]/50 transition-all duration-300 question-card scroll-mt-[100px]">
                                    <h3 class="text-lg font-bold text-slate-800 mb-6 leading-relaxed">
                                        <span class="text-[#4298B4] mr-2">{{ $q_number }}.</span> {{ $pertanyaan }}
                                    </h3>
                                    
                                    <div class="flex flex-wrap md:flex-nowrap gap-4 mt-4 md:gap-0 justify-between items-center bg-slate-50 p-2 rounded-xl">
                                        
                                        <label class="flex-1 text-center cursor-pointer relative group">
                                            <input type="radio" name="q{{ $q_number }}" value="1" class="peer sr-only" @change="autoScroll({{ $q_number }})">
                                            <div class="px-2 py-4 rounded-xl border-2 border-slate-100 bg-slate-50 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-slate-100 hover:border-slate-200 peer-checked:bg-red-100 peer-checked:border-red-500 peer-checked:text-red-700 peer-checked:shadow-sm flex items-center justify-center h-full">
                                                Sangat Tidak Setuju
                                            </div>
                                        </label>

                                        <label class="flex-1 text-center cursor-pointer relative group">
                                            <input type="radio" name="q{{ $q_number }}" value="2" class="peer sr-only" @change="autoScroll({{ $q_number }})">
                                            <div class="px-2 py-4 rounded-xl border-2 border-slate-100 bg-slate-50 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-slate-100 hover:border-slate-200 peer-checked:bg-orange-100 peer-checked:border-orange-500 peer-checked:text-orange-700 peer-checked:shadow-sm flex items-center justify-center h-full">
                                                Tidak Setuju
                                            </div>
                                        </label>

                                        <label class="flex-1 text-center cursor-pointer relative group">
                                            <input type="radio" name="q{{ $q_number }}" value="3" class="peer sr-only" @change="autoScroll({{ $q_number }})">
                                            <div class="px-2 py-4 rounded-xl border-2 border-slate-100 bg-slate-50 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-slate-100 hover:border-slate-200 peer-checked:bg-amber-100 peer-checked:border-amber-500 peer-checked:text-amber-700 peer-checked:shadow-sm flex items-center justify-center h-full">
                                                Cukup Setuju
                                            </div>
                                        </label>

                                        <label class="flex-1 text-center cursor-pointer relative group">
                                            <input type="radio" name="q{{ $q_number }}" value="4" class="peer sr-only" @change="autoScroll({{ $q_number }})">
                                            <div class="px-2 py-4 rounded-xl border-2 border-slate-100 bg-slate-50 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-slate-100 hover:border-slate-200 peer-checked:bg-blue-100 peer-checked:border-blue-500 peer-checked:text-blue-700 peer-checked:shadow-sm flex items-center justify-center h-full">
                                                Setuju
                                            </div>
                                        </label>

                                        <label class="flex-1 text-center cursor-pointer relative group">
                                            <input type="radio" name="q{{ $q_number }}" value="5" class="peer sr-only" @change="autoScroll({{ $q_number }})">
                                            <div class="px-2 py-4 rounded-xl border-2 border-slate-100 bg-slate-50 text-slate-500 font-bold text-sm transition-all duration-300 hover:bg-slate-100 hover:border-slate-200 peer-checked:bg-emerald-100 peer-checked:border-emerald-500 peer-checked:text-emerald-700 peer-checked:shadow-sm flex items-center justify-center h-full">
                                                Sangat Setuju
                                            </div>
                                        </label>

                                    </div>
                                </div>
                                
                                @php $q_number++; @endphp
                                
                            @endforeach
                            
                        </div>
                        
                        @php $global_step++; @endphp
                        
                    @endforeach

                @endforeach

            </div>

            <div class="mt-12 text-center pb-8">
                <button type="button" @click="nextStep()" class="px-16 py-5 bg-[#C9BBCF] hover:bg-[#A993B4] text-white text-xl font-bold rounded-2xl transition-all shadow-xl shadow-slate-200 mx-auto block w-full md:w-auto">
                    <span x-text="currentStep < 27 ? `Lanjut: Tahap ${currentStep + 1} →` : 'Kirim Jawaban & Hitung Potensi'"></span>
                </button>
            </div>

        </form>

    </div>

    <script>
        function assessmentForm() {
            return {
                currentStep: 1, // Sekarang dari 1 sampai 27
                
                initForm() {
                    window.scrollTo(0, 0);
                },

                getJudulSesi() {
                    // Karena 1 sesi dipecah jadi 3 step, kita deteksi sesinya dari pembagian step
                    let sesiAsli = Math.ceil(this.currentStep / 3);
                    const judul = {
                        1: "Sesi 1: Menemukan Potensimu",
                        2: "Sesi 2: Menjelajah Dimensi Baru",
                        3: "Sesi 3: Merancang Dinamika Interaktif",
                        4: "Sesi 4: Membaca Pola Tersembunyi",
                        5: "Sesi 5: Menggali Kedalaman Informasi",
                        6: "Sesi 6: Memodelkan Masa Depan",
                        7: "Sesi 7: Merangkai Arsitektur Digital",
                        8: "Sesi 8: Mengeksplorasi Logika Sistem",
                        9: "Sesi 9: Menghubungkan Dunia",
                    };
                    return judul[sesiAsli] || `Sesi ${sesiAsli}`;
                },

                autoScroll(currentIndex) {
                    // Cek kelipatan 5 untuk auto-scroll, supaya nggak bablas ke halaman berikutnya
                    let batasBawah = this.currentStep * 5;
                    
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
                    // Logika dinamis: Mengecek tepat 5 nomor sesuai currentStep
                    let startIndex = ((this.currentStep - 1) * 5) + 1;
                    let endIndex = this.currentStep * 5;
                    
                    let nomorKosong = [];

                    for (let i = startIndex; i <= endIndex; i++) {
                        let dijawab = document.querySelector(`input[name="q${i}"]:checked`);
                        
                        if (!dijawab) {
                            nomorKosong.push(i);
                            
                            let elemenKosong = document.getElementById(`q-${i}`);
                            if (elemenKosong) {
                                elemenKosong.classList.add('ring-2', 'ring-red-500', 'bg-red-50');
                                setTimeout(() => {
                                    elemenKosong.classList.remove('ring-2', 'ring-red-500', 'bg-red-50');
                                }, 2500); 
                            }
                        }
                    }

                    if (nomorKosong.length > 0) {
                        let elemenPertamaKosong = document.getElementById(`q-${nomorKosong[0]}`);
                        if (elemenPertamaKosong) {
                            elemenPertamaKosong.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        
                        let daftarNomor = nomorKosong.join(', ');
                        alert(`Eitss, tunggu dulu! Soal nomor ${daftarNomor} belum kamu isi tuh. Yuk lengkapi dulu!`);
                        return; 
                    }

                    // JIKA 5 SOAL SUDAH TERISI, LANJUT KE STEP BERIKUTNYA
                    if (this.currentStep < 27) {
                        this.currentStep++;
                        
                        setTimeout(() => {
                            document.getElementById('top-area').scrollIntoView({ behavior: 'smooth', block: 'start' });
                            window.scrollTo(0, 0);
                        }, 150);
                        
                    } else {
                        // Jika sudah di step 27, kirim form
                        document.getElementById('quizForm').submit();
                    }
                }
            }
        }
    </script>
</x-app-layout>