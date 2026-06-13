<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - Career Insight</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-[#1E293B] antialiased bg-white">
    <div class="flex min-h-screen">
        
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-[#4298B4] to-[#2B6A80] p-12 flex-col justify-between relative overflow-hidden">
            <div class="absolute top-[-10%] left-[-10%] w-64 h-64 bg-white opacity-10 rounded-xl transform rotate-12"></div>
            <div class="absolute bottom-[-5%] right-[-5%] w-80 h-80 bg-white opacity-10 rounded-full"></div>

            <div class="relative z-10">
                <div class="bg-white px-6 py-3 rounded-xl inline-block shadow-lg">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Career Insight" class="h-10 md:h-12 w-auto">
                </div>
            </div>

            <div class="relative z-10 my-auto">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/20 text-white text-sm font-medium mb-6 backdrop-blur-sm border border-white/30">
                    <svg class="w-4 h-4 mr-2 pb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    Sistem Pendukung Keputusan Karier
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-4">
                    Temukan Karier IT Terbaikmu dengan Teknologi Cerdas.
                </h1>
                <p class="text-white/80 text-lg max-w-md">
                    Asesmen berbasis SPK yang dirancang khusus untuk mahasiswa Teknik Informatika.
                </p>
            </div>

            <div class="relative z-10 flex gap-3">
                <span class="px-5 py-2 rounded-full bg-white/20 text-white text-sm font-medium backdrop-blur-sm border border-white/20">9 Jalur Karier</span>
                <span class="px-5 py-2 rounded-full bg-white/20 text-white text-sm font-medium backdrop-blur-sm border border-white/20">135 Pertanyaan</span>
                <span class="px-5 py-2 rounded-full bg-white/20 text-white text-sm font-medium backdrop-blur-sm border border-white/20">Akurasi 91%</span>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 sm:p-12">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-extrabold text-[#1E293B] mb-2">Selamat datang kembali</h2>
                <p class="text-gray-500 mb-8 font-medium">Masuk ke akun Career Insight kamu.</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="login" class="block text-sm font-bold text-[#1E293B] mb-1.5">Email atau NIM</label>
                        <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#4298B4] focus:border-transparent transition-all" placeholder="Masukkan NIM atau email">
                        <x-input-error :messages="$errors->get('login')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-bold text-[#1E293B] mb-1.5">Kata Sandi</label>
                        <input id="password" type="password" name="password" required class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-[#4298B4] focus:border-transparent transition-all" placeholder="Masukkan kata sandimu">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <button type="submit" class="w-full bg-[#4298B4] hover:bg-[#327A94] text-white font-bold py-3.5 rounded-xl transition-colors shadow-lg shadow-[#4298B4]/30 mt-4 text-lg">
                        Masuk
                    </button>
                </form>

                <p class="text-center text-sm text-gray-500 mt-8 font-medium">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-[#4298B4] font-bold hover:underline">Daftar</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>