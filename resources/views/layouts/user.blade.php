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

<body class="bg-slate-50 text-slate-800">

    {{-- NAVBAR --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            {{-- LOGO --}}
            <a href="{{ route('home') }}"
               class="text-xl font-extrabold text-emerald-600">
                🍱 CateringKu
            </a>

            {{-- MENU --}}
            <nav class="flex items-center gap-8">

    {{-- ========================= --}}
    {{-- SUDAH LOGIN (PELANGGAN) --}}
    {{-- ========================= --}}
    @auth('pelanggan')
        <a href="{{ route('paket.index') }}"
           class="font-medium hover:text-emerald-600 transition">
            Paket
        </a>

        <a href="#kontak"
           class="font-medium hover:text-emerald-600 transition">
            Kontak
        </a>

        <a href="{{ route('user.pesanan.riwayat') }}"
           class="font-medium hover:text-emerald-600 transition">
            Pesanan Saya
        </a>

        {{-- USER --}}
        <div class="relative">
            <form method="POST" action="{{ route('pelanggan.logout') }}">
                @csrf
                <button type="submit"
                        class="font-medium text-slate-700 hover:text-red-600 transition">
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
           class="font-medium hover:text-emerald-600 transition">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="bg-emerald-500 hover:bg-emerald-600
                  text-slate-900 font-semibold
                  px-5 py-2 rounded-xl transition">
            Register
        </a>
    @endguest

</nav>

        </div>
    </header>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-slate-300 mt-24">
        <div class="max-w-7xl mx-auto px-6 py-14 grid md:grid-cols-3 gap-10">

            <div>
                <h3 class="text-lg font-bold text-white mb-3">
                    🍱 CateringKu
                </h3>
                <p class="text-sm leading-relaxed">
                    Solusi catering harian & acara dengan rasa rumahan dan kualitas premium.
                </p>
            </div>

            <div>
                <h3 class="text-lg font-bold text-white mb-3">
                    Menu
                </h3>
                <ul class="space-y-2 text-sm">
    <li>
        <a href="{{ route('paket.index') }}" class="hover:text-white">
            Paket Catering
        </a>
    </li>

    @auth('pelanggan')
        <li>
            <a href="{{ route('user.pesanan.riwayat') }}" class="hover:text-white">
                Pesanan Saya
            </a>
        </li>
    @endauth
</ul>

            </div>

            <div id="kontak">
                <h3 class="text-lg font-bold text-white mb-3">
                    Kontak
                </h3>
                <p class="text-sm">📞 0819-xxxx-xxxx</p>
                <p class="text-sm">📍 Jakarta</p>
            </div>
        </div>

        <div class="text-center text-sm text-slate-500 py-4 border-t border-slate-700">
            © {{ date('Y') }} CateringKu. All rights reserved.
        </div>
    </footer>

</body>
</html>
