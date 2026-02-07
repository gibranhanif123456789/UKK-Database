@extends('layouts.kurir')

@section('title', 'Dashboard Kurir')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                <span class="text-xl text-white">🚚</span>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Dashboard Kurir
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    {{ now()->translatedFormat('l, d F Y') }}
                </p>
            </div>
        </div>
        
        <!-- User Info -->
        <div class="flex items-center space-x-3">
            <div class="text-right">
                <p class="text-sm text-slate-500">Kurir Aktif</p>
                <p class="font-semibold text-slate-800">{{ auth()->user()->name }}</p>
            </div>
            <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-bold shadow">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <!-- Pesanan Aktif -->
        <div class="bg-gradient-to-br from-white to-emerald-50 rounded-2xl shadow-lg p-6 border border-emerald-100 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-slate-600 mb-1">
                        <span class="w-3 h-3 bg-emerald-500 rounded-full inline-block mr-2"></span>
                        Pesanan Aktif
                    </p>
                    <h2 class="text-4xl font-bold text-emerald-600">{{ $dikirim }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-truck-loading text-white text-xl"></i>
                </div>
            </div>
            <div class="pt-4 border-t border-emerald-100">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-slate-600">Dalam pengiriman</span>
                    <span class="font-semibold text-emerald-600">
                        <i class="fas fa-clock mr-1"></i>
                        Sedang diproses
                    </span>
                </div>
            </div>
        </div>

        <!-- Menunggu Kurir -->
        <div class="bg-gradient-to-br from-white to-orange-50 rounded-2xl shadow-lg p-6 border border-orange-100 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-slate-600 mb-1">
                        <span class="w-3 h-3 bg-orange-500 rounded-full inline-block mr-2"></span>
                        Menunggu Kurir
                    </p>
                    <h2 class="text-4xl font-bold text-orange-600">{{ $menunggu }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-hourglass-half text-white text-xl"></i>
                </div>
            </div>
            <div class="pt-4 border-t border-orange-100">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-slate-600">Siap diambil</span>
                    <span class="font-semibold text-orange-600">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        Perlu segera diambil
                    </span>
                </div>
            </div>
        </div>

        <!-- Selesai Hari Ini -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-slate-600 mb-1">
                        <span class="w-3 h-3 bg-blue-500 rounded-full inline-block mr-2"></span>
                        Selesai Hari Ini
                    </p>
                    <h2 class="text-4xl font-bold text-blue-600">{{ $selesai }}</h2>
                </div>
                <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-check-circle text-white text-xl"></i>
                </div>
            </div>
            <div class="pt-4 border-t border-blue-100">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-slate-600">Pengiriman berhasil</span>
                    <span class="font-semibold text-blue-600">
                        <i class="fas fa-calendar-check mr-1"></i>
                        {{ now()->format('d M') }}
                    </span>
                </div>
            </div>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Start Delivery Button -->
        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-white mb-2">Mulai Pengiriman</h3>
                    <p class="text-emerald-100 text-sm">
                        Ambil pesanan yang menunggu kurir
                    </p>
                </div>
                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-play text-white text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('kurir.pesanan') }}"
               class="mt-6 w-full inline-flex items-center justify-center px-6 py-3 bg-white text-emerald-600 font-semibold rounded-xl hover:bg-emerald-50 transition-all duration-200 shadow-lg">
                <i class="fas fa-shipping-fast mr-3"></i>
                Lihat Daftar Pesanan
            </a>
        </div>

        <!-- Today's Summary -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-slate-100">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-pie text-blue-600"></i>
                </div>
                <h3 class="font-bold text-slate-800">Ringkasan Hari Ini</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-truck text-emerald-600"></i>
                        </div>
                        <span class="text-slate-700">Total Pengiriman</span>
                    </div>
                    <span class="font-bold text-slate-800">{{ $dikirim + $selesai }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-clock text-orange-600"></i>
                        </div>
                        <span class="text-slate-700">Menunggu Diambil</span>
                    </div>
                    <span class="font-bold text-orange-600">{{ $menunggu }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-check text-blue-600"></i>
                        </div>
                        <span class="text-slate-700">Berhasil Dikirim</span>
                    </div>
                    <span class="font-bold text-blue-600">{{ $selesai }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Deliveries -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
        <div class="px-6 py-4 border-b border-slate-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-history text-emerald-600"></i>
                    </div>
                    <h2 class="font-bold text-slate-800">Pengiriman Terbaru</h2>
                </div>
                <a href="{{ route('kurir.pesanan') }}"
                   class="text-sm text-emerald-600 hover:text-emerald-800 font-medium flex items-center">
                    Lihat Semua
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <div class="p-6">
            <!-- Example Delivery Item 1 -->
            <div class="flex items-center justify-between p-4 bg-emerald-50/50 rounded-xl mb-4 border border-emerald-100">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-box text-white"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800">Paket Pernikahan A</p>
                        <p class="text-sm text-slate-600">
                            <i class="fas fa-user mr-1"></i>
                            Sinta Wijaya • 
                            <i class="fas fa-map-marker-alt ml-2 mr-1"></i>
                            Jl. Merdeka No. 123
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-emerald-100 text-emerald-700 border border-emerald-200">
                        <i class="fas fa-truck mr-1.5"></i>
                        Dalam Perjalanan
                    </span>
                    <p class="text-xs text-slate-500 mt-2">ETA: 30 menit</p>
                </div>
            </div>

            <!-- Example Delivery Item 2 -->
            <div class="flex items-center justify-between p-4 bg-orange-50/50 rounded-xl mb-4 border border-orange-100">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-box text-white"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800">Paket Rapat Kantor</p>
                        <p class="text-sm text-slate-600">
                            <i class="fas fa-user mr-1"></i>
                            PT. Sejahtera • 
                            <i class="fas fa-map-marker-alt ml-2 mr-1"></i>
                            Jl. Sudirman No. 45
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-orange-100 text-orange-700 border border-orange-200">
                        <i class="fas fa-hourglass-half mr-1.5"></i>
                        Menunggu
                    </span>
                    <p class="text-xs text-slate-500 mt-2">Siap diambil</p>
                </div>
            </div>

            <!-- Example Delivery Item 3 -->
            <div class="flex items-center justify-between p-4 bg-blue-50/50 rounded-xl border border-blue-100">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-box text-white"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-slate-800">Paket Ulang Tahun B</p>
                        <p class="text-sm text-slate-600">
                            <i class="fas fa-user mr-1"></i>
                            Budi Santoso • 
                            <i class="fas fa-map-marker-alt ml-2 mr-1"></i>
                            Jl. Melati No. 78
                        </p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-700 border border-blue-200">
                        <i class="fas fa-check-circle mr-1.5"></i>
                        Selesai
                    </span>
                    <p class="text-xs text-slate-500 mt-2">10:30 WIB</p>
                </div>
            </div>
        </div>

        <!-- Table Footer -->
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
            <div class="text-center">
                <a href="{{ route('kurir.pesanan') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 shadow hover:shadow-lg">
                    <i class="fas fa-list mr-3"></i>
                    Lihat Semua Pesanan
                </a>
            </div>
        </div>
    </div>

    <!-- Delivery Tips -->
    <div class="mt-8 bg-gradient-to-r from-slate-800 to-slate-900 rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-lightbulb text-white"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Tips Pengiriman Hari Ini</h3>
                    <p class="text-slate-300 text-sm">Jaga keamanan dan ketepatan waktu pengiriman</p>
                </div>
            </div>
            <i class="fas fa-quote-right text-amber-400 text-3xl opacity-50"></i>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-shield-alt text-amber-400"></i>
                    </div>
                    <span class="text-white font-medium">Keamanan Paket</span>
                </div>
                <p class="text-slate-300 text-sm">Pastikan paket dalam kondisi baik sebelum dan sesudah pengiriman</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-clock text-amber-400"></i>
                    </div>
                    <span class="text-white font-medium">Ketepatan Waktu</span>
                </div>
                <p class="text-slate-300 text-sm">Perkiraan waktu pengiriman: 1-2 jam dari pengambilan</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 bg-amber-500/20 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-phone text-amber-400"></i>
                    </div>
                    <span class="text-white font-medium">Komunikasi</span>
                </div>
                <p class="text-slate-300 text-sm">Hubungi pelanggan 30 menit sebelum sampai lokasi</p>
            </div>
        </div>
    </div>

</div>
@endsection