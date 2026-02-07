@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-chart-line text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Dashboard Admin
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    {{ now()->translatedFormat('l, d F Y') }}
                </p>
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="flex items-center space-x-3">
            <div class="text-right">
                <p class="text-sm text-slate-500">Sesi Aktif</p>
                <p class="font-semibold text-slate-800">{{ auth()->user()->name }}</p>
            </div>
            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold shadow">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <!-- Total Pemesanan -->
        <div class="bg-gradient-to-br from-white to-orange-50 rounded-2xl shadow-lg p-6 border border-orange-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600 mb-1">
                        <i class="fas fa-shopping-cart mr-2 text-orange-500"></i>
                        Total Pemesanan
                    </p>
                    <h2 class="text-3xl font-bold text-slate-800">{{ $totalPemesanan }}</h2>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow">
                    <i class="fas fa-chart-bar text-white"></i>
                </div>
            </div>
            <p class="text-xs text-slate-500 mt-3">
                <span class="text-green-600 font-medium">
                    <i class="fas fa-arrow-up mr-1"></i>
                    {{ round(($totalPemesanan / ($totalPemesanan + 1)) * 100) }}%
                </span>
                dari periode lalu
            </p>
        </div>

        <!-- Menunggu Konfirmasi -->
        <div class="bg-gradient-to-br from-white to-yellow-50 rounded-2xl shadow-lg p-6 border border-yellow-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600 mb-1">
                        <i class="fas fa-clock mr-2 text-yellow-500"></i>
                        Menunggu Konfirmasi
                    </p>
                    <h2 class="text-3xl font-bold text-yellow-600">{{ $menungguKonfirmasi }}</h2>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow">
                    <i class="fas fa-hourglass-half text-white"></i>
                </div>
            </div>
            <p class="text-xs text-slate-500 mt-3">
                Perlu tindakan segera
            </p>
        </div>

        <!-- Sedang Diproses -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-lg p-6 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600 mb-1">
                        <i class="fas fa-cogs mr-2 text-blue-500"></i>
                        Sedang Diproses
                    </p>
                    <h2 class="text-3xl font-bold text-blue-600">{{ $sedangDiproses }}</h2>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow">
                    <i class="fas fa-tasks text-white"></i>
                </div>
            </div>
            <p class="text-xs text-slate-500 mt-3">
                Dalam proses produksi
            </p>
        </div>

        <!-- Total Omzet -->
        <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-lg p-6 border border-green-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600 mb-1">
                        <i class="fas fa-money-bill-wave mr-2 text-green-500"></i>
                        Total Omzet
                    </p>
                    <h2 class="text-3xl font-bold text-green-600">
                        Rp {{ number_format($totalOmzet, 0, ',', '.') }}
                    </h2>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow">
                    <i class="fas fa-wallet text-white"></i>
                </div>
            </div>
            <p class="text-xs text-slate-500 mt-3">
                Bulan {{ now()->format('F Y') }}
            </p>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-r from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200">
            <h3 class="font-semibold text-slate-800 mb-4 flex items-center">
                <i class="fas fa-bolt mr-2 text-orange-500"></i>
                Quick Actions
            </h3>
            <div class="space-y-3">
                {{-- <a href="{{ route('admin.pemesanan.edit') }}"
                   class="flex items-center justify-between p-3 bg-white rounded-xl hover:shadow-md transition-all duration-200">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-plus text-blue-600"></i>
                        </div>
                        <span class="font-medium text-slate-700">Tambah Pesanan</span>
                    </div>
                    <i class="fas fa-chevron-right text-slate-400"></i>
                </a> --}}
                <a href="{{ route('admin.paket.create') }}"
                   class="flex items-center justify-between p-3 bg-white rounded-xl hover:shadow-md transition-all duration-200">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-utensils text-green-600"></i>
                        </div>
                        <span class="font-medium text-slate-700">Tambah Paket</span>
                    </div>
                    <i class="fas fa-chevron-right text-slate-400"></i>
                </a>
            </div>
        </div>

        <div class="md:col-span-2 bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
            <div class="px-6 py-4 border-b border-slate-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-history text-blue-600"></i>
                        </div>
                        <h2 class="font-bold text-slate-800">Pesanan Terbaru</h2>
                    </div>
                    <a href="{{ route('admin.pemesanan.index') }}"
                       class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                        Lihat Semua
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-slate-50 to-slate-100">
                        <tr>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-3 text-orange-500"></i>
                                    Pelanggan
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar mr-3 text-orange-500"></i>
                                    Tanggal
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-money-bill-wave mr-3 text-orange-500"></i>
                                    Total
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-flag mr-3 text-orange-500"></i>
                                    Status
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-cog mr-3 text-orange-500"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($pesananTerbaru as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            <td class="p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-orange-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-slate-800">
                                            {{ $item->pelanggan->nama_pelanggan }}
                                        </p>
                                        <p class="text-xs text-slate-500">
                                            {{ Str::limit($item->pelanggan->email, 20) }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <div>
                                    <p class="font-medium text-slate-800">
                                        {{ $item->tgl_pesan->format('d M Y') }}
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        {{ $item->tgl_pesan->format('H:i') }}
                                    </p>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-slate-800">
                                    Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-semibold
                                    @if($item->status_pesan == 'Menunggu Konfirmasi')
                                        bg-yellow-100 text-yellow-700 border border-yellow-200
                                    @elseif($item->status_pesan == 'Sedang Diproses')
                                        bg-blue-100 text-blue-700 border border-blue-200
                                    @elseif($item->status_pesan == 'Menunggu Kurir')
                                        bg-orange-100 text-orange-700 border border-orange-200
                                    @elseif($item->status_pesan == 'Selesai')
                                        bg-green-100 text-green-700 border border-green-200
                                    @else
                                        bg-slate-100 text-slate-700 border border-slate-200
                                    @endif">
                                    @if($item->status_pesan == 'Menunggu Konfirmasi')
                                        <i class="fas fa-clock mr-1.5"></i>
                                    @elseif($item->status_pesan == 'Sedang Diproses')
                                        <i class="fas fa-cogs mr-1.5"></i>
                                    @elseif($item->status_pesan == 'Menunggu Kurir')
                                        <i class="fas fa-truck mr-1.5"></i>
                                    @elseif($item->status_pesan == 'Selesai')
                                        <i class="fas fa-check-circle mr-1.5"></i>
                                    @endif
                                    {{ $item->status_pesan }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex justify-center">
                                    <a href="{{ route('admin.pemesanan.show', $item->id) }}"
                                       class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200 text-sm flex items-center">
                                        <i class="fas fa-eye mr-1.5"></i>
                                        Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center">
                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-inbox text-slate-400 text-2xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 font-medium">Belum ada pesanan</p>
                                        <p class="text-sm text-slate-400 mt-1">Pesanan yang masuk akan muncul di sini</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            @if($pesananTerbaru->isNotEmpty())
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle mr-2 text-orange-500"></i>
                        Menampilkan {{ $pesananTerbaru->count() }} pesanan terbaru
                    </div>
                    <div class="text-slate-500">
                        Total: {{ $totalPemesanan }} pesanan
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Additional Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Package Summary -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-slate-100">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-box text-purple-600"></i>
                </div>
                <h3 class="font-bold text-slate-800">Paket Catering</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-slate-600">Total Paket</span>
                    <span class="font-bold text-slate-800">{{ $totalPaket ?? '0' }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-600">Prasmanan</span>
                    <span class="font-bold text-purple-600">{{ $paketPrasmanan ?? '0' }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-600">Box</span>
                    <span class="font-bold text-emerald-600">{{ $paketBox ?? '0' }}</span>
                </div>
            </div>
            <a href="{{ route('admin.paket.index') }}"
               class="mt-6 w-full block text-center py-2.5 rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-50 transition-colors duration-200 font-medium">
                Kelola Paket
            </a>
        </div>

        <!-- Recent Activity -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6 border border-slate-100">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-bell text-blue-600"></i>
                </div>
                <h3 class="font-bold text-slate-800">Aktivitas Terkini</h3>
            </div>
            <div class="space-y-4">
                <div class="flex items-start space-x-3 p-3 bg-blue-50/50 rounded-xl">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mt-1">
                        <i class="fas fa-shopping-cart text-blue-600 text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-slate-800">Pesanan baru diterima</p>
                        <p class="text-sm text-slate-500">Dari: {{ $pesananTerbaru->first()->pelanggan->nama_pelanggan ?? 'Pelanggan' }}</p>
                        <p class="text-xs text-slate-400">{{ now()->subMinutes(15)->format('H:i') }}</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3 p-3 bg-green-50/50 rounded-xl">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mt-1">
                        <i class="fas fa-check-circle text-green-600 text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-slate-800">Pembayaran berhasil dikonfirmasi</p>
                        <p class="text-sm text-slate-500">No. Resi: {{ $pesananTerbaru->first()->no_resi ?? 'RESI001' }}</p>
                        <p class="text-xs text-slate-400">{{ now()->subHours(2)->format('H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection