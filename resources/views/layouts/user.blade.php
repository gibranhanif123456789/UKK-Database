<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catering')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b from-slate-50 to-white text-slate-800">

    {{-- NAVBAR --}}
    <header class="bg-white/95 backdrop-blur-sm shadow-sm border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            {{-- LOGO --}}
            <a href="{{ route('home') }}"
               class="flex items-center space-x-3 group">
                <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-emerald-200 transition-all duration-300">
                    <span class="text-xl">🍱</span>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-emerald-700 bg-clip-text text-transparent">
                    CateringKu
                </span>
            </a>

            {{-- MENU --}}
            <nav class="flex items-center gap-6">

    {{-- ========================= --}}
    {{-- SUDAH LOGIN (PELANGGAN) --}}
    {{-- ========================= --}}
    @auth('pelanggan')
        <a href="{{ route('paket.index') }}"
           class="font-medium text-slate-700 hover:text-emerald-600 hover:font-semibold px-3 py-2 rounded-lg hover:bg-emerald-50 transition-all duration-200">
            Paket
        </a>

        {{-- <a href="#kontak"
           class="font-medium hover:text-emerald-600 transition">
            Kontak
        </a> --}}

        <a href="{{ route('user.pesanan.riwayat') }}"
           class="font-medium text-slate-700 hover:text-emerald-600 hover:font-semibold px-3 py-2 rounded-lg hover:bg-emerald-50 transition-all duration-200">
            Pesanan Saya
        </a>

        {{-- USER --}}
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-3 pl-4 border-l border-slate-300">
                <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full flex items-center justify-center text-white text-sm font-bold shadow">
                    {{ substr(auth('pelanggan')->user()->name, 0, 1) }}
                </div>
                <span class="font-medium text-slate-700">{{ auth('pelanggan')->user()->name }}</span>
            </div>
            <form method="POST" action="{{ route('pelanggan.logout') }}" class="ml-2">
                @csrf
                <button type="submit"
                        class="font-medium text-slate-600 hover:text-white hover:bg-gradient-to-r hover:from-red-500 hover:to-red-600 px-4 py-2 rounded-lg border border-red-200 hover:border-red-600 transition-all duration-200">
                    Logout
                </button>
            </form>
        </div>
    @endauth

    {{-- ========================= --}}
    {{-- BELUM LOGIN --}}
    {{-- ========================= --}}
    @guest('pelanggan')
        <a href="{{ route('login') }}"
           class="font-medium text-slate-700 hover:text-emerald-600 hover:font-semibold px-3 py-2 rounded-lg hover:bg-emerald-50 transition-all duration-200">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700
                  text-white font-semibold px-6 py-2.5 rounded-xl shadow-md hover:shadow-lg transition-all duration-200">
            Register
        </a>
    @endguest

</nav>

        </div>
    </header>

    {{-- CONTENT --}}
    <main class="min-h-[70vh]">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gradient-to-b from-slate-900 to-slate-800 text-slate-300 mt-24">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-3 gap-12">

            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-xl">🍱</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white">
                        CateringKu
                    </h3>
                </div>
                <p class="text-sm leading-relaxed text-slate-400 max-w-md">
                    Solusi catering harian & acara dengan rasa rumahan dan kualitas premium. 
                    Melayani berbagai kebutuhan makanan dengan bahan segar pilihan.
                </p>
            </div>

            <div>
                <h3 class="text-lg font-bold text-white mb-6 pb-2 border-b border-slate-700">
                    Menu Utama
                </h3>
                <ul class="space-y-3">
    <li>
        <a href="{{ route('paket.index') }}" 
           class="flex items-center text-sm hover:text-white group transition-colors duration-200">
            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
            Paket Catering
        </a>
    </li>

    @auth('pelanggan')
        <li>
            <a href="{{ route('user.pesanan.riwayat') }}" 
               class="flex items-center text-sm hover:text-white group transition-colors duration-200">
                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
                Pesanan Saya
            </a>
        </li>
    @endauth
    
    <li>
        <a href="#kontak" 
           class="flex items-center text-sm hover:text-white group transition-colors duration-200">
            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-3 group-hover:scale-125 transition-transform"></span>
            Hubungi Kami
        </a>
    </li>
</ul>

            </div>

            <div id="kontak" class="space-y-4">
                <h3 class="text-lg font-bold text-white mb-6 pb-2 border-b border-slate-700">
                    Kontak & Lokasi
                </h3>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-emerald-400">📞</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Telepon</p>
                            <p class="text-sm text-slate-400">0819-xxxx-xxxx</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-emerald-400">📍</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Alamat</p>
                            <p class="text-sm text-slate-400">Jakarta, Indonesia</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                            <span class="text-emerald-400">🕒</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Jam Operasional</p>
                            <p class="text-sm text-slate-400">08:00 - 20:00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-700/50">
            <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm text-slate-500">
                    © {{ date('Y') }} CateringKu. All rights reserved.
                </div>
                <div class="flex items-center space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-sm text-slate-500 hover:text-emerald-400 transition-colors">
                        Terms of Service
                    </a>
                    <a href="#" class="text-sm text-slate-500 hover:text-emerald-400 transition-colors">
                        Privacy Policy
                    </a>
                    <a href="#" class="text-sm text-slate-500 hover:text-emerald-400 transition-colors">
                        FAQ
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>