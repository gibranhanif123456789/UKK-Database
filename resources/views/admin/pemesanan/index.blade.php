@extends('layouts.admin')

@section('title', 'Data Pemesanan')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-shopping-cart text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Data Pemesanan
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Kelola semua pemesanan dari pelanggan
                </p>
            </div>
        </div>
        
        <!-- Filter & Search -->
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" 
                       placeholder="Cari no. resi..." 
                       class="pl-10 pr-4 py-2 rounded-xl border border-slate-200
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-3 text-slate-400"></i>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-blue-600 font-medium">Total Pesanan</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ $pemesanan->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-shopping-bag text-white"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border border-yellow-200 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-yellow-600 font-medium">Menunggu Konfirmasi</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">
                        {{ $pemesanan->where('status_pesan', 'Menunggu Konfirmasi')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-white"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-blue-600 font-medium">Sedang Diproses</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">
                        {{ $pemesanan->where('status_pesan', 'Sedang Diproses')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-cogs text-white"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-green-50 to-green-100 border border-green-200 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-green-600 font-medium">Selesai</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">
                        {{ $pemesanan->where('status_pesan', 'Selesai')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
        @if($pemesanan->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                        <tr>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-barcode mr-3 text-blue-500"></i>
                                    No. Resi
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-3 text-blue-500"></i>
                                    Pelanggan
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar mr-3 text-blue-500"></i>
                                    Tanggal
                                </div>
                            </th>
                            <th class="p-4 text-right font-semibold text-slate-700">
                                <div class="flex items-center justify-end">
                                    <i class="fas fa-money-bill-wave mr-3 text-blue-500"></i>
                                    Total
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-flag mr-3 text-blue-500"></i>
                                    Status
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700 w-48">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-cogs mr-3 text-blue-500"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($pemesanan as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            <td class="p-4">
                                <div class="font-medium text-slate-800">
                                    {{ $item->no_resi ?? '-' }}
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-blue-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-slate-800">
                                            {{ $item->pelanggan->nama_pelanggan ?? '-' }}
                                        </p>
                                        <p class="text-xs text-slate-500">
                                            {{ $item->pelanggan->email ?? '' }}
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
                                <div class="text-right">
                                    <p class="font-bold text-slate-800 text-lg">
                                        Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                                    </p>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="flex justify-center">
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
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
                                            <i class="fas fa-clock mr-2"></i>
                                        @elseif($item->status_pesan == 'Sedang Diproses')
                                            <i class="fas fa-cogs mr-2"></i>
                                        @elseif($item->status_pesan == 'Menunggu Kurir')
                                            <i class="fas fa-truck mr-2"></i>
                                        @elseif($item->status_pesan == 'Selesai')
                                            <i class="fas fa-check-circle mr-2"></i>
                                        @endif
                                        {{ $item->status_pesan }}
                                    </span>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.pemesanan.show', $item->id) }}"
                                       class="px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg
                                              hover:from-blue-600 hover:to-blue-700 transition-all duration-200
                                              flex items-center shadow hover:shadow-md">
                                        <i class="fas fa-eye mr-2"></i>
                                        Detail
                                    </a>

                                    <a href="{{ route('admin.pemesanan.edit', $item->id) }}"
                                       class="px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg
                                              hover:from-orange-600 hover:to-orange-700 transition-all duration-200
                                              flex items-center shadow hover:shadow-md">
                                        <i class="fas fa-edit mr-2"></i>
                                        Update
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <div class="flex items-center">
                        <i class="fas fa-shopping-cart mr-2 text-blue-500"></i>
                        Menampilkan {{ $pemesanan->count() }} pemesanan
                    </div>
                    <div class="text-slate-500">
                        Total pendapatan: Rp {{ number_format($pemesanan->sum('total_bayar'), 0, ',', '.') }}
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="p-12 text-center">
                <div class="inline-block p-6 bg-slate-100 rounded-full mb-4">
                    <i class="fas fa-shopping-cart text-slate-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 mb-2">
                    Belum ada pemesanan
                </h3>
                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                    Saat ini belum ada pesanan yang masuk dari pelanggan
                </p>
            </div>
        @endif
    </div>
</div>
@endsection