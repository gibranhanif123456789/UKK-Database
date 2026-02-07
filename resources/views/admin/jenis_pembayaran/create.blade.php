@extends('layouts.admin')

@section('title', 'Tambah Jenis Pembayaran')

@section('content')
<div class="max-w-2xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-credit-card text-white text-lg"></i>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">
                Tambah Jenis Pembayaran
            </h1>
        </div>
        <p class="text-sm text-slate-500 ml-13">
            Lengkapi data metode dan detail pembayaran
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
        <form method="POST"
              action="{{ route('admin.jenis-pembayaran.store') }}"
              enctype="multipart/form-data"
              class="space-y-8">
            @csrf

            {{-- METODE PEMBAYARAN --}}
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    Metode Pembayaran
                </label>
                <input
                    type="text"
                    name="metode_pembayaran"
                    value="{{ old('metode_pembayaran') }}"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                           focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                           transition-all duration-200 bg-white
                           placeholder:text-slate-400"
                    placeholder="Contoh: Transfer Bank, E-Wallet, QRIS"
                    required
                >
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
                        <i class="fas fa-info-circle text-orange-500"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800">
                        Detail Pembayaran
                    </h3>
                </div>

                <div class="space-y-6 pl-2">

                    {{-- NO REKENING --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">
                            Nomor Rekening / ID Pembayaran
                        </label>
                        <input
                            type="text"
                            name="no_rek"
                            value="{{ old('no_rek') }}"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                   focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                   transition-all duration-200 bg-white
                                   placeholder:text-slate-400"
                            placeholder="Masukkan nomor rekening / ID pembayaran"
                            required
                        >
                        @error('no_rek')
                            <p class="text-sm text-red-500 mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- TEMPAT BAYAR --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">
                            Tempat / Platform Pembayaran
                        </label>
                        <input
                            type="text"
                            name="tempat_bayar"
                            value="{{ old('tempat_bayar') }}"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                   focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                   transition-all duration-200 bg-white
                                   placeholder:text-slate-400"
                            placeholder="Contoh: BCA, Mandiri, OVO, DANA, GoPay"
                            required
                        >
                        @error('tempat_bayar')
                            <p class="text-sm text-red-500 mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- LOGO --}}
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">
                            Logo Pembayaran <span class="text-slate-400 font-normal">(Opsional)</span>
                        </label>
                        <div class="relative">
                            <input
                                type="file"
                                name="logo"
                                accept="image/*"
                                class="w-full rounded-xl border-2 border-dashed border-slate-200 px-4 py-4
                                       bg-white file:mr-4 file:py-2.5 file:px-4
                                       file:rounded-lg file:border-0
                                       file:bg-gradient-to-r file:from-orange-500 file:to-orange-600
                                       file:text-white file:font-medium
                                       hover:file:from-orange-600 hover:file:to-orange-700
                                       transition-all duration-200 cursor-pointer
                                       hover:border-orange-300"
                            >
                        </div>
                        <p class="text-xs text-slate-500 mt-2">
                            Format: JPG, PNG, SVG (Maksimal 2MB)
                        </p>
                        @error('logo')
                            <p class="text-sm text-red-500 mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-100">
                <a href="{{ route('admin.jenis-pembayaran.index') }}"
                   class="px-6 py-3 rounded-xl border border-slate-300
                          text-slate-700 font-medium hover:bg-slate-50
                          transition-all duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>

                <button
                    type="submit"
                    class="px-8 py-3 rounded-xl
                           bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                           text-white font-semibold
                           shadow-lg hover:shadow-xl
                           transition-all duration-200 active:scale-95 flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Data
                </button>
            </div>

        </form>
    </div>
</div>
@endsection