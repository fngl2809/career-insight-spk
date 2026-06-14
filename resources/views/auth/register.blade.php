<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - Career Insight</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-[#1E293B] antialiased bg-white">
    <div class="flex min-h-screen">
        
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-[#4298B4] to-[#2B6A80] p-16 flex-col justify-between relative overflow-hidden">
            <div class="absolute top-[-10%] left-[-10%] w-64 h-64 bg-white opacity-10 rounded-xl transform rotate-12"></div>
            <div class="absolute bottom-[-5%] right-[-5%] w-80 h-80 bg-white opacity-10 rounded-full"></div>

            <div class="relative z-10">
                <div class="bg-white px-8 py-4 rounded-2xl inline-block shadow-lg">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Career Insight" class="h-14 w-auto">
                </div>
            </div>

            <div class="relative z-10 my-auto">
                <div class="inline-flex items-center px-5 py-2.5 rounded-full bg-white/20 text-white text-base font-bold mb-8 backdrop-blur-sm border border-white/30">
                    <svg class="w-5 h-5 mr-2 pb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    Sistem Pendukung Keputusan Karier
                </div>

                <h1 class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    Temukan Karier IT Terbaikmu.
                </h1>
                <p class="text-white/80 text-xl max-w-lg leading-relaxed">
                    Asesmen berbasis SPK yang dirancang khusus untuk mahasiswa Teknik Informatika.
                </p>
            </div>

            <div class="relative z-10 flex gap-4">
                <span class="px-6 py-3 rounded-full bg-white/20 text-white text-base font-bold backdrop-blur-sm border border-white/20">9 Jalur Karier</span>
                <span class="px-6 py-3 rounded-full bg-white/20 text-white text-base font-bold backdrop-blur-sm border border-white/20">135 Pertanyaan</span>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 sm:p-16 overflow-y-auto">
            <div class="w-full max-w-lg my-auto py-8">
                <h2 class="text-4xl font-extrabold text-[#1E293B] mb-3">Buat akun baru</h2>
                <p class="text-lg text-gray-500 mb-10 font-medium">Bergabung dengan Career Insight sekarang.</p>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-base font-bold text-[#1E293B] mb-2">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full px-5 py-4 text-lg rounded-xl border border-gray-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#88619A] focus:border-transparent transition-all" placeholder="Nama lengkapmu">
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-500 text-base" />
                    </div>

                    <div>
                        <label for="nim" class="block text-base font-bold text-[#1E293B] mb-2">NIM</label>
                        <input id="nim" type="text" name="nim" value="{{ old('nim') }}" required class="w-full px-5 py-4 text-lg rounded-xl border border-gray-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#88619A] focus:border-transparent transition-all" placeholder="Nomor Induk Mahasiswa">
                        <x-input-error :messages="$errors->get('nim')" class="mt-1 text-red-500 text-base" />
                    </div>

                    <div>
                        <label for="email" class="block text-base font-bold text-[#1E293B] mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full px-5 py-4 text-lg rounded-xl border border-gray-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#88619A] focus:border-transparent transition-all" placeholder="email@kampus.ac.id">
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-base" />
                    </div>

                    <div>
                        <label for="password" class="block text-base font-bold text-[#1E293B] mb-2">Kata Sandi</label>
                        <input id="password" type="password" name="password" required class="w-full px-5 py-4 text-lg rounded-xl border border-gray-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#88619A] focus:border-transparent transition-all" placeholder="Buat kata sandi">
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-base" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-base font-bold text-[#1E293B] mb-2">Konfirmasi Sandi</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full px-5 py-4 text-lg rounded-xl border border-gray-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#88619A] focus:border-transparent transition-all" placeholder="Ulangi kata sandimu">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-500 text-base" />
                    </div>

                    <button type="submit" class="w-full bg-[#88619A] hover:bg-[#725282] text-white font-bold py-4 rounded-xl transition-colors shadow-lg shadow-[#88619A]/30 mt-4 text-xl">
                        Buat Akun
                    </button>
                </form>

                <p class="text-center text-base text-gray-500 mt-8 font-medium">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-[#4298B4] font-bold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>