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
                        // SESI 7: WEB (Masih Kosong / Dummy)
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
                        // SESI 9: MOBILE (Ini yang barusan kamu kirim)
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
                        9: "Sesi 9: Menghubungkan Dunia",
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
                    
                    // 🔥 Keranjang penampung nomor soal yang kosong
                    let nomorKosong = [];

                    // Cek semua soal dari awal sampai akhir sesi ini secara serentak
                    for (let i = startIndex; i <= endIndex; i++) {
                        let dijawab = document.querySelector(`input[name="q${i}"]:checked`);
                        
                        if (!dijawab) {
                            // Masukin nomor soal ke keranjang
                            nomorKosong.push(i);
                            
                            // Kasih efek merah ke semua kartu soal yang belum diisi
                            let elemenKosong = document.getElementById(`q-${i}`);
                            if (elemenKosong) {
                                elemenKosong.classList.add('ring-2', 'ring-red-500', 'bg-red-50');
                                setTimeout(() => {
                                    elemenKosong.classList.remove('ring-2', 'ring-red-500', 'bg-red-50');
                                }, 2500); // Efek merah bertahan 2.5 detik biar user sempat melihat
                            }
                        }
                    }

                    // 🚨 Jika isi keranjang ada isinya (artinya ada soal yang kosong)
                    if (nomorKosong.length > 0) {
                        // Otomatis scroll layar ke soal kosong pertama yang paling atas
                        let elemenPertamaKosong = document.getElementById(`q-${nomorKosong[0]}`);
                        if (elemenPertamaKosong) {
                            elemenPertamaKosong.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        
                        // Satukan nomor pakai koma (Contoh: "2, 5, 10")
                        let daftarNomor = nomorKosong.join(', ');
                        
                        // Tampilkan pesan alert borongan sekaligus!
                        alert(`Eitss, tunggu dulu! Soal nomor ${daftarNomor} belum kamu isi tuh. Yuk lengkapi dulu!`);
                        return; // Hentikan proses, jangan lanjut ke sesi berikutnya dulu!
                    }

                    // JIKA SEMUA SOAL SUDAH TERISI AMAN, BARU BOLEH LANJUT
                    if (this.currentStep < 9) {
                        this.currentStep++;
                        
                        setTimeout(() => {
                            document.getElementById('top-area').scrollIntoView({ behavior: 'smooth', block: 'start' });
                            window.scrollTo(0, 0);
                        }, 150);
                        
                    } else {
                        // Jika sudah di sesi 9 dan semua terisi, langsung kirim ke backend
                        document.getElementById('quizForm').submit();
                    }
                }
            }
        }
    </script>
</x-app-layout>