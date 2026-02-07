<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Owner')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-slate-50 to-amber-50">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-72 bg-gradient-to-b from-slate-900 to-slate-800 text-white shadow-2xl hidden md:flex flex-col">
        <div class="p-7 border-b border-slate-700/50">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                    <span class="text-2xl">👑</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">Owner<span class="text-amber-400">Panel</span></h1>
                    <p class="text-sm text-slate-400 mt-1">Executive Dashboard</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-5 py-8 space-y-2">
            <a href="{{ route('owner.dashboard') }}" 
               class="flex items-center px-5 py-3.5 rounded-xl transition-all duration-200
                      {{ request()->routeIs('owner.dashboard') 
                         ? 'bg-gradient-to-r from-amber-600 to-amber-700 text-white shadow-lg shadow-amber-500/20' 
                         : 'text-slate-300 hover:bg-slate-800/60 hover:text-white hover:pl-6 hover:shadow-md' }}">
                <span class="text-xl mr-3">📊</span>
                <span class="font-medium">Dashboard</span>
                <span class="ml-auto">
                    {{ request()->routeIs('owner.dashboard') ? '●' : '' }}
                </span>
            </a>

            <a href="{{ route('owner.users.index') }}" 
               class="flex items-center px-5 py-3.5 rounded-xl transition-all duration-200
                      {{ request()->routeIs('owner.users.*') 
                         ? 'bg-gradient-to-r from-amber-600 to-amber-700 text-white shadow-lg shadow-amber-500/20' 
                         : 'text-slate-300 hover:bg-slate-800/60 hover:text-white hover:pl-6 hover:shadow-md' }}">
                <span class="text-xl mr-3">👥</span>
                <span class="font-medium">Manajemen User</span>
                <span class="ml-auto">
                    {{ request()->routeIs('owner.users.*') ? '●' : '' }}
                </span>
            </a>
        </nav>

        <div class="p-6 border-t border-slate-700/50">
            <form method="POST" action="{{ route('logout') }}" class="w-full mb-4">
                @csrf
                <button class="w-full flex items-center justify-center px-5 py-3.5 rounded-xl
                               bg-gradient-to-r from-red-500/15 to-red-600/15 text-red-300
                               hover:from-red-600/25 hover:to-red-700/25 hover:text-white
                               transition-all duration-200 hover:shadow-lg hover:shadow-red-500/10
                               border border-red-500/20">
                    <span class="text-xl mr-3">🚪</span>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
            
            <div class="bg-slate-800/40 rounded-xl p-4 border border-slate-700/30">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold shadow">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-semibold text-white">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-amber-400 font-medium">Owner</div>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    {{-- CONTENT --}}
    <div class="flex-1 flex flex-col">

        {{-- TOPBAR MOBILE --}}
        <header class="md:hidden bg-gradient-to-r from-slate-900 to-slate-800 text-white px-6 py-4 flex items-center shadow-lg">
            <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center mr-3 shadow">
                <span class="text-lg">👑</span>
            </div>
            <h1 class="font-bold text-lg">
                @yield('header', 'Owner Dashboard')
            </h1>
        </header>

        {{-- TOPBAR DESKTOP --}}
        <header class="hidden md:flex bg-white/90 backdrop-blur-sm shadow-sm px-8 py-5 justify-between items-center border-b border-slate-200/80">
            <div>
                <h1 class="font-bold text-2xl text-slate-800">
                    @yield('header', 'Dashboard Owner')
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    {{ now()->translatedFormat('l, d F Y') }}
                </p>
            </div>
            
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="text-right">
                        <div class="font-bold text-slate-800">{{ auth()->user()->name }}</div>
                        <div class="text-sm font-medium text-amber-600 flex items-center">
                            <span class="w-2 h-2 bg-amber-500 rounded-full mr-2"></span>
                            Owner
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- CONTENT AREA --}}
        <main class="flex-1 p-6 md:p-8">
            <div class="max-w-7xl mx-auto">
                @yield('content')
            </div>
        </main>

        {{-- FOOTER --}}
        <footer class="bg-white/80 border-t border-slate-200 px-8 py-4">
            <div class="text-center text-sm text-slate-500">
                © {{ date('Y') }} Owner Panel • Executive Management System
            </div>
        </footer>
    </div>

</div>

</body>
</html>