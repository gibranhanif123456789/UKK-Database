@extends('layouts.admin')

@section('title', 'Update Status Pesanan')

@section('content')
<div class="max-w-xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-sync-alt text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Update Status Pesanan
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Perbarui status pesanan pelanggan
                </p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
        <form action="{{ route('admin.pemesanan.update', $pemesanan->id) }}" 
              method="POST"
              class="space-y-8">
            @csrf
            @method('PUT')

            <!-- No Resi -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    <i class="fas fa-barcode mr-2 text-blue-500"></i>
                    Nomor Resi
                </label>
                <input type="text"
                       value="{{ $pemesanan->no_resi ?? 'Belum ada resi' }}"
                       readonly
                       class="w-full rounded-xl bg-slate-50 border border-slate-200 px-4 py-3.5
                              text-slate-700 font-medium">
                <p class="text-xs text-slate-500 mt-2">
                    No. Resi akan digenerate otomatis saat status berubah
                </p>
            </div>

            <!-- Informasi Pesanan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">
                        <i class="fas fa-user mr-2 text-blue-500"></i>
                        Pelanggan
                    </label>
                    <input type="text"
                           value="{{ $pemesanan->pelanggan->nama_pelanggan ?? '-' }}"
                           readonly
                           class="w-full rounded-xl bg-slate-50 border border-slate-200 px-4 py-3.5
                                  text-slate-700">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">
                        <i class="fas fa-calendar mr-2 text-blue-500"></i>
                        Tanggal Pesan
                    </label>
                    <input type="text"
                           value="{{ $pemesanan->tgl_pesan->format('d F Y') }}"
                           readonly
                           class="w-full rounded-xl bg-slate-50 border border-slate-200 px-4 py-3.5
                                  text-slate-700">
                </div>
            </div>

            <!-- Status Saat Ini -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    Status Saat Ini
                </label>
                <div class="px-4 py-3 rounded-xl border border-slate-200 bg-slate-50">
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
                        <i class="fas fa-info-circle mr-2"></i>
                        {{ $pemesanan->status_pesan }}
                    </span>
                </div>
            </div>

            <!-- Status Baru -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    <i class="fas fa-flag mr-2 text-blue-500"></i>
                    Status Pesanan Baru
                </label>
                <select name="status_pesan"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                               focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                               transition-all duration-200 bg-white cursor-pointer
                               appearance-none"
                        required>
                    <option value="" disabled selected>-- Pilih Status Baru --</option>
                    <option value="Menunggu Konfirmasi" {{ $pemesanan->status_pesan == 'Menunggu Konfirmasi' ? 'selected' : '' }}
                            class="text-yellow-600">
                        ⏳ Menunggu Konfirmasi
                    </option>
                    <option value="Sedang Diproses" {{ $pemesanan->status_pesan == 'Sedang Diproses' ? 'selected' : '' }}
                            class="text-blue-600">
                        🔧 Sedang Diproses
                    </option>
                    <option value="Menunggu Kurir" {{ $pemesanan->status_pesan == 'Menunggu Kurir' ? 'selected' : '' }}
                            class="text-orange-600">
                        🚚 Menunggu Kurir
                    </option>
                    <option value="Selesai" {{ $pemesanan->status_pesan == 'Selesai' ? 'selected' : '' }}
                            class="text-green-600">
                        ✅ Selesai
                    </option>
                    <option value="Dibatalkan" {{ $pemesanan->status_pesan == 'Dibatalkan' ? 'selected' : '' }}
                            class="text-red-600">
                        ❌ Dibatalkan
                    </option>
                </select>
                <p class="text-xs text-slate-500 mt-2">
                    Pilih status yang sesuai dengan progress pesanan
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-100">
                <a href="{{ route('admin.pemesanan.index') }}"
                   class="px-6 py-3 rounded-xl border border-slate-300
                          text-slate-700 font-medium hover:bg-slate-50
                          transition-all duration-200 flex items-center">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>

                <button type="submit"
                        class="px-8 py-3 rounded-xl
                               bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700
                               text-white font-semibold
                               shadow-lg hover:shadow-xl
                               transition-all duration-200 active:scale-95 flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Update Status
                </button>
            </div>

        </form>
    </div>
</div>
@endsection