@extends('layouts.kurir')

@section('title', 'Pesanan Kurir')
@section('header', 'Daftar Pesanan')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-shipping-fast text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Daftar Pesanan
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Kelola pengiriman pesanan catering
                </p>
            </div>
        </div>

        <!-- Stats Badge -->
        <div class="px-4 py-2 bg-emerald-50 border border-emerald-200 rounded-xl">
            <div class="flex items-center space-x-2">
                <span class="text-sm text-slate-600">Total Pesanan:</span>
                <span class="font-bold text-emerald-600">{{ $pesanan->count() }}</span>
            </div>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 rounded-xl flex items-center">
            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-check text-emerald-600"></i>
            </div>
            <div class="flex-1">
                <p class="font-medium text-emerald-800">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Status Filter -->
    <div class="mb-6 bg-white rounded-2xl shadow-sm p-4 border border-slate-100">
        <div class="flex items-center space-x-4">
            <span class="text-sm font-medium text-slate-700">Filter Status:</span>
            <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 rounded-xl bg-emerald-500 text-white text-sm font-medium shadow">
                    Semua
                </button>
                <button class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition-colors">
                    Menunggu Kurir
                </button>
                <button class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition-colors">
                    Sedang Diantar
                </button>
                <button class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200 transition-colors">
                    Selesai
                </button>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
        @if($pesanan->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-emerald-50 to-emerald-100">
                        <tr>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-barcode mr-3 text-emerald-500"></i>
                                    No. Resi
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-3 text-emerald-500"></i>
                                    Pelanggan & Alamat
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-flag mr-3 text-emerald-500"></i>
                                    Status
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700 w-64">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-cogs mr-3 text-emerald-500"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @foreach ($pesanan as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            <!-- No Resi -->
                            <td class="p-4">
                                <div class="font-medium text-slate-800 font-mono">
                                    {{ $item->no_resi }}
                                </div>
                                <div class="text-xs text-slate-500 mt-1">
                                    {{ $item->created_at->format('d/m/Y H:i') }}
                                </div>
                            </td>

                            <!-- Pelanggan -->
                            <td class="p-4">
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-blue-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-800">
                                                {{ $item->nama_pelanggan }}
                                            </p>
                                            <p class="text-sm text-slate-500">
                                                <i class="fas fa-phone-alt mr-1"></i>
                                                {{ $item->pelanggan->no_hp ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                    @if($item->alamat_pengiriman)
                                    <div class="flex items-start mt-2">
                                        <i class="fas fa-map-marker-alt text-slate-400 mt-1 mr-2"></i>
                                        <p class="text-sm text-slate-600">
                                            {{ Str::limit($item->alamat_pengiriman, 50) }}
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="p-4">
                                <div class="flex justify-center">
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                        @if($item->status_pesan === 'Menunggu Kurir')
                                            bg-orange-100 text-orange-700 border border-orange-200
                                        @elseif($item->status_pesan === 'Sedang Diantar')
                                            bg-emerald-100 text-emerald-700 border border-emerald-200
                                        @elseif($item->status_pesan === 'Selesai')
                                            bg-blue-100 text-blue-700 border border-blue-200
                                        @else
                                            bg-slate-100 text-slate-700 border border-slate-200
                                        @endif">
                                        @if($item->status_pesan === 'Menunggu Kurir')
                                            <i class="fas fa-hourglass-half mr-2"></i>
                                        @elseif($item->status_pesan === 'Sedang Diantar')
                                            <i class="fas fa-truck mr-2"></i>
                                        @elseif($item->status_pesan === 'Selesai')
                                            <i class="fas fa-check-circle mr-2"></i>
                                        @endif
                                        {{ $item->status_pesan }}
                                    </span>
                                </div>
                            </td>

                            <!-- Aksi -->
                            <td class="p-4">
                                <div class="flex flex-col items-center space-y-3">
                                    <!-- BELUM ADA PENGIRIMAN → TOMBOL AMBIL -->
                                    @if (!$item->pengiriman)
                                        <form action="{{ route('kurir.pesanan.ambil', $item->id) }}" method="POST" class="w-full">
                                            @csrf
                                            <button type="submit"
                                                    class="w-full px-4 py-2.5 rounded-xl
                                                           bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700
                                                           text-white font-semibold
                                                           shadow-md hover:shadow-lg
                                                           transition-all duration-200 flex items-center justify-center">
                                                <i class="fas fa-hand-paper mr-2"></i>
                                                Ambil Pesanan
                                            </button>
                                            <p class="text-xs text-slate-500 text-center mt-2">
                                                Ambil dari kitchen
                                            </p>
                                        </form>
                                    @endif

                                    <!-- SUDAH DIAMBIL → TIBA DI TUJUAN -->
                                    @if ($item->pengiriman && $item->pengiriman->status_kirim === 'Sedang Dikirim')
                                        <div class="w-full space-y-3">
                                            <form action="{{ route('kurir.pesanan.selesai', $item->id) }}"
                                                  method="POST"
                                                  enctype="multipart/form-data"
                                                  class="space-y-3">
                                                @csrf
                                                
                                                <div class="space-y-2">
                                                    <label class="block text-sm font-medium text-slate-700">
                                                        <i class="fas fa-camera mr-1 text-emerald-500"></i>
                                                        Upload Bukti Foto
                                                    </label>
                                                    <div class="relative">
                                                        <input type="file" 
                                                               name="bukti_foto" 
                                                               required 
                                                               accept="image/*"
                                                               class="w-full rounded-xl border-2 border-dashed border-slate-200 px-4 py-3
                                                                      bg-white file:mr-4 file:py-2.5 file:px-4
                                                                      file:rounded-lg file:border-0
                                                                      file:bg-gradient-to-r file:from-emerald-500 file:to-emerald-600
                                                                      file:text-white file:font-medium
                                                                      hover:file:from-emerald-600 hover:file:to-emerald-700
                                                                      transition-all duration-200 cursor-pointer
                                                                      hover:border-emerald-300">
                                                    </div>
                                                    <p class="text-xs text-slate-500">
                                                        Foto kondisi paket saat sampai tujuan
                                                    </p>
                                                </div>

                                                <button type="submit"
                                                        class="w-full px-4 py-2.5 rounded-xl
                                                               bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700
                                                               text-white font-semibold
                                                               shadow-md hover:shadow-lg
                                                               transition-all duration-200 flex items-center justify-center">
                                                    <i class="fas fa-check-circle mr-2"></i>
                                                    Konfirmasi Tiba di Tujuan
                                                </button>
                                            </form>
                                        </div>
                                    @endif

                                    <!-- SUDAH SELESAI -->
                                    @if ($item->pengiriman && $item->pengiriman->status_kirim === 'Tiba Di Tujuan')
                                        <div class="w-full text-center space-y-2">
                                            <div class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200">
                                                <i class="fas fa-check-circle text-emerald-600 mr-2"></i>
                                                <span class="font-semibold text-emerald-700">Selesai Dikirim</span>
                                            </div>
                                            @if($item->pengiriman->bukti_foto)
                                            <div class="mt-2">
                                                <a href="{{ asset('storage/' . $item->pengiriman->bukti_foto) }}" 
                                                   target="_blank"
                                                   class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                                                    <i class="fas fa-image mr-1"></i>
                                                    Lihat Bukti Foto
                                                </a>
                                            </div>
                                            @endif
                                            <p class="text-xs text-slate-500">
                                                {{ $item->pengiriman->updated_at->format('d/m/Y H:i') }}
                                            </p>
                                        </div>
                                    @endif
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
                        <i class="fas fa-info-circle mr-2 text-emerald-500"></i>
                        Menampilkan {{ $pesanan->count() }} pesanan
                    </div>
                    <div class="text-slate-500">
                        {{-- Total: {{ $pesanan->total() }} pesanan --}}
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="p-12 text-center">
                <div class="inline-block p-6 bg-slate-100 rounded-full mb-4">
                    <i class="fas fa-box-open text-slate-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 mb-2">
                    Belum ada pesanan
                </h3>
                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                    Saat ini belum ada pesanan yang perlu dikirim
                </p>
                <div class="inline-flex items-center px-4 py-2 bg-slate-100 rounded-xl">
                    <i class="fas fa-clock text-slate-400 mr-2"></i>
                    <span class="text-slate-600">Tunggu pesanan dari admin</span>
                </div>
            </div>
        @endif
    </div>

    <!-- Delivery Tips -->
    <div class="mt-6 bg-gradient-to-r from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200">
        <div class="flex items-center mb-4">
            <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                <i class="fas fa-lightbulb text-emerald-600"></i>
            </div>
            <h3 class="font-bold text-slate-800">Tips Pengiriman</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                    <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                        <i class="fas fa-1 text-blue-600 text-xs"></i>
                    </div>
                    <span class="font-medium text-slate-700">Periksa Pesanan</span>
                </div>
                <p class="text-sm text-slate-600">Pastikan semua item sesuai sebelum berangkat</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                    <div class="w-6 h-6 bg-emerald-100 rounded-full flex items-center justify-center mr-2">
                        <i class="fas fa-2 text-emerald-600 text-xs"></i>
                    </div>
                    <span class="font-medium text-slate-700">Konfirmasi Pelanggan</span>
                </div>
                <p class="text-sm text-slate-600">Hubungi 30 menit sebelum sampai lokasi</p>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                    <div class="w-6 h-6 bg-orange-100 rounded-full flex items-center justify-center mr-2">
                        <i class="fas fa-3 text-orange-600 text-xs"></i>
                    </div>
                    <span class="font-medium text-slate-700">Upload Bukti</span>
                </div>
                <p class="text-sm text-slate-600">Foto kondisi paket saat sampai tujuan</p>
            </div>
        </div>
    </div>

</div>
@endsection