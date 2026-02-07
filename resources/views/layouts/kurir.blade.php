<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Kurir')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 text-slate-800">

<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-72 bg-gradient-to-b from-slate-900 to-slate-800 text-white shadow-xl hidden md:flex flex-col">
        <div class="p-7 border-b border-slate-700">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <span class="text-xl">🚚</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">Kurir<span class="text-emerald-400">Panel</span></h1>
                    <p class="text-sm text-slate-400 mt-1">Delivery Management</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-5 py-8 space-y-2">
            <a href="{{ route('kurir.dashboard') }}"
               class="flex items-center px-5 py-3.5 rounded-xl transition-all duration-200
                      {{ request()->routeIs('kurir.dashboard') 
                         ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg shadow-emerald-500/20' 
                         : 'text-slate-300 hover:bg-slate-800/50 hover:text-white hover:translate-x-1' }}">
                <span class="text-lg mr-3">📊</span>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('kurir.pesanan') }}"
               class="flex items-center px-5 py-3.5 rounded-xl transition-all duration-200
                      {{ request()->routeIs('kurir.pesanan') 
                         ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg shadow-emerald-500/20' 
                         : 'text-slate-300 hover:bg-slate-800/50 hover:text-white hover:translate-x-1' }}">
                <span class="text-lg mr-3">📦</span>
                <span class="font-medium">Pesanan</span>
            </a>
        </nav>

        {{-- LOGOUT --}}
        <div class="p-6 border-t border-slate-700">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button class="w-full flex items-center justify-center px-5 py-3.5 rounded-xl
                               bg-gradient-to-r from-red-500/10 to-red-600/10 text-red-300
                               hover:from-red-600/20 hover:to-red-700/20 hover:text-white
                               transition-all duration-200 hover:shadow-lg hover:shadow-red-500/10
                               border border-red-500/20">
                    <span class="text-lg mr-3">🚪</span>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
            <div class="mt-4 pt-4 border-t border-slate-700">
                <div class="text-center text-slate-400 text-sm">
                    <div class="font-medium">{{ auth()->user()->name }}</div>
                    <div class="text-xs mt-1">Kurir · {{ date('H:i') }}</div>
                </div>
            </div>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col">

        {{-- TOPBAR MOBILE --}}
        <header class="md:hidden bg-gradient-to-r from-slate-900 to-slate-800 text-white px-6 py-4 flex items-center shadow-lg">
            <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center mr-3">
                <span class="text-lg">🚚</span>
            </div>
            <h1 class="font-bold text-lg">
                @yield('header', 'Kurir Dashboard')
            </h1>
        </header>

        {{-- TOPBAR DESKTOP --}}
        <header class="hidden md:flex bg-white shadow-sm px-8 py-5 justify-between items-center border-b border-slate-200">
            <h1 class="font-bold text-xl text-slate-800">
                @yield('header', 'Dashboard Kurir')
            </h1>

            <div class="flex items-center space-x-4">
                <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="text-right">
                    <div class="font-semibold text-slate-800">{{ auth()->user()->name }}</div>
                    <div class="text-sm text-emerald-600 font-medium">Kurir</div>
                </div>
            </div>
        </header>

        {{-- CONTENT --}}
        <main class="flex-1 p-6 md:p-8">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

</div>
@yield('scripts')

</body>
</html>