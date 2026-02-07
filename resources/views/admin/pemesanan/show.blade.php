@extends('layouts.admin')

@section('title', 'Detail Pemesanan')

@section('content')
<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-file-invoice text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Detail Pemesanan
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    No. Resi: {{ $pemesanan->no_resi }}
                </p>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.pemesanan.index') }}"
               class="px-5 py-2.5 rounded-xl border border-slate-300
                      text-slate-700 font-medium hover:bg-slate-50
                      transition-all duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <a href="{{ route('admin.pemesanan.edit', $pemesanan->id) }}"
               class="px-5 py-2.5 rounded-xl
                      bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                      text-white font-semibold
                      shadow-lg hover:shadow-xl
                      transition-all duration-200 flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Update Status
            </a>
        </div>
    </div>

    <!-- Info Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Info Pelanggan -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user text-blue-600"></i>
                </div>
                <h2 class="font-bold text-slate-800">Informasi Pelanggan</h2>
            </div>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-slate-500">Nama</p>
                    <p class="font-medium text-slate-800">{{ $pemesanan->pelanggan->nama_pelanggan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Email</p>
                    <p class="font-medium text-slate-800">{{ $pemesanan->pelanggan->email ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Telepon</p>
                    <p class="font-medium text-slate-800">{{ $pemesanan->pelanggan->no_hp ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Info Pesanan -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-green-600"></i>
                </div>
                <h2 class="font-bold text-slate-800">Detail Pesanan</h2>
            </div>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-slate-500">Tanggal Pesan</p>
                    <p class="font-medium text-slate-800">{{ $pemesanan->tgl_pesan->format('d F Y, H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">No. Resi</p>
                    <p class="font-medium text-slate-800">{{ $pemesanan->no_resi ?? 'Belum ada' }}</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Status</p>
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                        @if($pemesanan->status_pesan == 'Menunggu Konfirmasi')
                            bg-yellow-100 text-yellow-700 border border-yellow-200
                        @elseif($pemesanan->status_pesan == 'Sedang Diproses')
                            bg-blue-100 text-blue-700 border border-blue-200
                        @elseif($pemesanan->status_pesan == 'Menunggu Kurir')
                            bg-orange-100 text-orange-700 border border-orange-200
                        @elseif($pemesanan->status_pesan == 'Selesai')
                            bg-green-100 text-green-700 border border-green-200
                        @else
                            bg-slate-100 text-slate-700 border border-slate-200
                        @endif">
                        @if($pemesanan->status_pesan == 'Menunggu Konfirmasi')
                            <i class="fas fa-clock mr-2"></i>
                        @elseif($pemesanan->status_pesan == 'Sedang Diproses')
                            <i class="fas fa-cogs mr-2"></i>
                        @elseif($pemesanan->status_pesan == 'Menunggu Kurir')
                            <i class="fas fa-truck mr-2"></i>
                        @elseif($pemesanan->status_pesan == 'Selesai')
                            <i class="fas fa-check-circle mr-2"></i>
                        @endif
                        {{ $pemesanan->status_pesan }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Total Bayar -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-slate-100">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-emerald-600"></i>
                </div>
                <h2 class="font-bold text-slate-800">Pembayaran</h2>
            </div>
            <div class="text-center">
                <p class="text-sm text-slate-500 mb-2">Total Bayar</p>
                <p class="text-4xl font-bold text-emerald-600 mb-4">
                    Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}
                </p>
                <div class="text-sm text-slate-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Sudah termasuk PPN 10%
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Item -->
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-slate-100 mb-8">
        <div class="px-6 py-4 border-b border-slate-100">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-list-alt text-orange-500"></i>
                </div>
                <h2 class="font-bold text-slate-800">Detail Item Pesanan</h2>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-slate-50 to-slate-100">
                    <tr>
                        <th class="p-4 text-left font-semibold text-slate-700">
                            <div class="flex items-center">
                                <i class="fas fa-utensils mr-3 text-orange-500"></i>
                                Paket
                            </div>
                        </th>
                        <th class="p-4 text-center font-semibold text-slate-700">
                            <div class="flex items-center justify-center">
                                <i class="fas fa-hashtag mr-3 text-orange-500"></i>
                                Qty
                            </div>
                        </th>
                        <th class="p-4 text-right font-semibold text-slate-700">
                            <div class="flex items-center justify-end">
                                <i class="fas fa-tag mr-3 text-orange-500"></i>
                                Harga Satuan
                            </div>
                        </th>
                        <th class="p-4 text-right font-semibold text-slate-700">
                            <div class="flex items-center justify-end">
                                <i class="fas fa-calculator mr-3 text-orange-500"></i>
                                Subtotal
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($pemesanan->detailPemesanan as $detail)
                    <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                        <td class="p-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-orange-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-800">
                                        {{ $detail->paket->nama_paket }}
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        {{ $detail->paket->jenis }} • {{ $detail->paket->kategori }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-lg font-bold text-slate-800">
                                        {{ $detail->qty }}
                                    </div>
                                    <div class="text-xs text-slate-500">Pcs</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="text-right">
                                <p class="font-medium text-slate-800">
                                    Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="text-right">
                                <p class="font-bold text-lg text-emerald-600">
                                    Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    {{ $detail->qty }} × Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gradient-to-r from-slate-50 to-slate-100">
                    <tr>
                        <td colspan="3" class="p-4 text-right font-bold text-slate-800">
                            Total
                        </td>
                        <td class="p-4 text-right">
                            <div class="text-right">
                                <p class="text-2xl font-bold text-emerald-600">
                                    Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}
                                </p>
                                <p class="text-sm text-slate-500">
                                    Termasuk PPN 10%
                                </p>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-center space-x-4">
        <a href="{{ route('admin.pemesanan.edit', $pemesanan->id) }}"
           class="px-6 py-3 rounded-xl
                  bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                  text-white font-semibold
                  shadow-lg hover:shadow-xl
                  transition-all duration-200 flex items-center">
            <i class="fas fa-sync-alt mr-2"></i>
            Update Status Pesanan
        </a>
        
        <button onclick="window.print()"
                class="px-6 py-3 rounded-xl border border-slate-300
                       text-slate-700 font-medium hover:bg-slate-50
                       transition-all duration-200 flex items-center">
            <i class="fas fa-print mr-2"></i>
            Cetak Invoice
        </button>
    </div>
</div>
@endsection