@extends('layouts.admin')

@section('title', 'Edit Jenis Pembayaran')

@section('content')
<div class="max-w-2xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-edit text-white text-lg"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Jenis Pembayaran
            </h1>
        </div>
        <p class="text-sm text-slate-500 ml-13">
            Perbarui data metode dan detail pembayaran
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
        <form action="{{ route('admin.jenis-pembayaran.update', $jenis_pembayaran->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-8">
            @csrf
            @method('PUT')

            {{-- METODE PEMBAYARAN --}}
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    Metode Pembayaran
                </label>
                <input type="text"
                       name="metode_pembayaran"
                       value="{{ old('metode_pembayaran', $jenis_pembayaran->metode_pembayaran) }}"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                              focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                              transition-all duration-200 bg-white"
                       required>
                @error('metode_pembayaran')
                    <p class="text-sm text-red-500 mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- DETAIL SECTION --}}
            <div class="space-y-6 pt-6 border-t border-slate-100">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-list-alt text-orange-500"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800">
                        Detail Jenis Pembayaran
                    </h3>
                </div>

                @forelse($details as $detail)
                    <div class="space-y-6 pl-2 bg-slate-50/50 p-6 rounded-xl">
                        
                        {{-- NO REKENING --}}
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">
                                Nomor Rekening / ID Pembayaran
                            </label>
                            <input type="text"
                                   name="no_rek"
                                   value="{{ old('no_rek', $detail->no_rek) }}"
                                   class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                          focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                          transition-all duration-200 bg-white"
                                   placeholder="Masukkan nomor rekening / ID">
                        </div>

                        {{-- TEMPAT BAYAR --}}
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">
                                Tempat / Platform Pembayaran
                            </label>
                            <input type="text"
                                   name="tempat_bayar"
                                   value="{{ old('tempat_bayar', $detail->tempat_bayar) }}"
                                   class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                          focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                          transition-all duration-200 bg-white"
                                   placeholder="Contoh: BCA, Mandiri, OVO">
                        </div>

                        {{-- LOGO --}}
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">
                                Logo Pembayaran
                            </label>
                            
                            @if($detail->logo ?? false)
                                <div class="mb-4 flex items-center space-x-4">
                                    <div class="w-24 h-24 bg-white border border-slate-200 rounded-xl p-3 shadow-sm">
                                        <img src="{{ asset('storage/' . $detail->logo) }}"
                                             alt="Logo {{ $detail->tempat_bayar }}"
                                             class="w-full h-full object-contain">
                                    </div>
                                    <div class="text-sm text-slate-600">
                                        <p class="font-medium">Logo saat ini</p>
                                        <p class="text-slate-400">Unggah file baru untuk mengganti</p>
                                    </div>
                                </div>
                            @endif

                            <input type="file"
                                   name="logo"
                                   class="w-full rounded-xl border-2 border-dashed border-slate-200 px-4 py-4
                                          bg-white file:mr-4 file:py-2.5 file:px-4
                                          file:rounded-lg file:border-0
                                          file:bg-gradient-to-r file:from-orange-500 file:to-orange-600
                                          file:text-white file:font-medium
                                          hover:file:from-orange-600 hover:file:to-orange-700
                                          transition-all duration-200 cursor-pointer
                                          hover:border-orange-300">
                        </div>

                    </div>
                @empty
                    <div class="text-center py-8 bg-slate-50 rounded-xl">
                        <i class="fas fa-inbox text-slate-400 text-3xl mb-3"></i>
                        <p class="text-slate-500 font-medium">Detail pembayaran belum tersedia</p>
                        <p class="text-sm text-slate-400 mt-1">Tambahkan detail pembayaran di bawah</p>
                    </div>
                @endforelse
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex items-center justify-between pt-8 border-t border-slate-100">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.jenis-pembayaran.index') }}"
                       class="px-6 py-3 rounded-xl border border-slate-300
                              text-slate-700 font-medium hover:bg-slate-50
                              transition-all duration-200 flex items-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                    <a href="{{ route('admin.jenis-pembayaran.detail', $jenis_pembayaran->id) }}"
                       class="px-6 py-3 rounded-xl border border-slate-300
                              text-slate-700 font-medium hover:bg-slate-50
                              transition-all duration-200 flex items-center">
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Detail
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <button type="submit"
                            class="px-8 py-3 rounded-xl
                                   bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                                   text-white font-semibold
                                   shadow-lg hover:shadow-xl
                                   transition-all duration-200 active:scale-95 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Data
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection