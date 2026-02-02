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
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r flex flex-col">
        <div class="px-6 py-4 border-b">
            <h1 class="text-xl font-bold text-orange-600">Catering Admin</h1>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-4 py-2 rounded
               {{ request()->routeIs('admin.dashboard') ? 'bg-orange-500 text-white' : 'hover:bg-orange-100' }}">
                <i class="fas fa-home mr-3"></i> Dashboard
            </a>

            <a href="{{ route('admin.paket.index') }}"
               class="flex items-center px-4 py-2 rounded
               {{ request()->routeIs('admin.paket.*') ? 'bg-orange-500 text-white' : 'hover:bg-orange-100' }}">
                <i class="fas fa-utensils mr-3"></i> Paket
            </a>

            <a href="{{ route('admin.jenis-pembayaran.index') }}"
               class="flex items-center px-4 py-2 rounded
               {{ request()->routeIs('admin.jenis-pembayaran.*') ? 'bg-orange-500 text-white' : 'hover:bg-orange-100' }}">
                <i class="fas fa-credit-card mr-3"></i> Jenis Pembayaran
            </a>

            <a href="{{ route('admin.pemesanan.index') }}"
            class="flex items-center px-4 py-2 rounded
            {{ request()->routeIs('admin.pemesanan.*')
                ? 'bg-orange-500 text-white'
                : 'hover:bg-orange-100' }}">
                <i class="fas fa-box mr-3"></i>
                Pemesanan
            </a>

        </nav>

        <form action="{{ route('logout') }}" method="POST" class="p-4 border-t">
            @csrf
            <button class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
