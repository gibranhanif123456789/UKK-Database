<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-50">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-orange-50 to-white border-r border-gray-200 shadow-sm flex flex-col">
        <div class="px-6 py-5 border-b border-gray-100">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-utensils text-white text-lg"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Catering<span class="text-orange-600">Admin</span></h1>
            </div>
            <p class="text-xs text-gray-500 mt-2 ml-13">Management Dashboard</p>
        </div>

        <nav class="flex-1 px-4 py-8 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-200
               {{ request()->routeIs('admin.dashboard') 
                  ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-100' 
                  : 'text-gray-700 hover:bg-orange-50 hover:text-orange-700 hover:pl-5' }}">
                <i class="fas fa-home w-6 text-center mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-orange-400' }}"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('admin.paket.index') }}"
               class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-200
               {{ request()->routeIs('admin.paket.*') 
                  ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-100' 
                  : 'text-gray-700 hover:bg-orange-50 hover:text-orange-700 hover:pl-5' }}">
                <i class="fas fa-utensils w-6 text-center mr-3 {{ request()->routeIs('admin.paket.*') ? 'text-white' : 'text-orange-400' }}"></i>
                <span class="font-medium">Paket</span>
            </a>

            <a href="{{ route('admin.jenis-pembayaran.index') }}"
               class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-200
               {{ request()->routeIs('admin.jenis-pembayaran.*') 
                  ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-100' 
                  : 'text-gray-700 hover:bg-orange-50 hover:text-orange-700 hover:pl-5' }}">
                <i class="fas fa-credit-card w-6 text-center mr-3 {{ request()->routeIs('admin.jenis-pembayaran.*') ? 'text-white' : 'text-orange-400' }}"></i>
                <span class="font-medium">Jenis Pembayaran</span>
            </a>

            <a href="{{ route('admin.pemesanan.index') }}"
               class="flex items-center px-4 py-3.5 rounded-xl transition-all duration-200
               {{ request()->routeIs('admin.pemesanan.*') 
                  ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-lg shadow-orange-100' 
                  : 'text-gray-700 hover:bg-orange-50 hover:text-orange-700 hover:pl-5' }}">
                <i class="fas fa-box w-6 text-center mr-3 {{ request()->routeIs('admin.pemesanan.*') ? 'text-white' : 'text-orange-400' }}"></i>
                <span class="font-medium">Pemesanan</span>
            </a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="p-5 border-t border-gray-100 bg-gradient-to-r from-red-50 to-white">
            @csrf
            <button class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white py-3.5 rounded-xl font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-8 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-full">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>