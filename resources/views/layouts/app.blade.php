<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Career Insight') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#F8FAFC]">
    <div class="flex min-h-screen overflow-hidden" x-data="{ sidebarOpen: true }">
        
        <aside :class="sidebarOpen ? 'w-72' : 'w-20'" class="bg-white border-r border-gray-100 flex flex-col transition-all duration-300 ease-in-out z-20">
            <div class="p-6 flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" class="h-10 w-auto" alt="Logo">
            </div>

            <div class="px-6 py-4 mb-6" x-show="sidebarOpen">
                <div class="flex items-center gap-3 bg-slate-50 p-3 rounded-2xl border border-slate-100">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4298B4&color=fff" class="h-10 w-10 rounded-full shadow-sm" alt="Avatar">
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-slate-500 font-medium truncate">NIM. {{ Auth::user()->nim }}</p>
                    </div>
                </div>
            </div>

            <nav class="flex-grow px-4 space-y-1.5 text-sm font-medium"> <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-[#4298B4]/10 text-[#4298B4] font-bold' : 'text-slate-500 hover:bg-slate-50 transition-colors' }}">
                    <i class="fa-solid fa-house text-base w-5 text-center"></i>
                    <span>Beranda</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 transition-colors">
                    <i class="fa-solid fa-pen-to-square text-base w-5 text-center"></i>
                    <span>Mulai Asesmen</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 transition-colors">
                    <i class="fa-solid fa-chart-line text-base w-5 text-center"></i>
                    <span>Hasil Rekomendasi</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-500 hover:bg-slate-50 transition-colors">
                    <i class="fa-solid fa-history text-base w-5 text-center"></i>
                    <span>Riwayat Asesmen</span>
                </a>
            </nav>

            <div class="p-4 border-t border-gray-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-4 px-4 py-3 text-red-500 hover:bg-red-50 w-full rounded-xl transition-colors font-medium">
                        <i class="fa-solid fa-right-from-bracket w-5"></i>
                        <span x-show="sidebarOpen">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-grow overflow-y-auto h-screen bg-[#F8FAFC]">
            <header class="bg-white/80 backdrop-blur-md sticky top-0 z-10 px-8 py-4 flex justify-between items-center border-b border-gray-100">
                <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 hover:text-[#4298B4] transition-colors">
                    <i class="fa-solid fa-bars-staggered text-xl"></i>
                </button>
                
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-slate-600 hidden sm:block">Halo, {{ Auth::user()->name }}!</span>
                    <div class="h-8 w-8 rounded-full bg-[#4298B4] flex items-center justify-center text-white text-xs font-bold shadow-md shadow-[#4298B4]/20 cursor-pointer">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="p-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</body>
</html>