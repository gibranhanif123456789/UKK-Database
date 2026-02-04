@extends('layouts.admin')

@section('title', 'Tambah Jenis Pembayaran')

@section('content')
<div class="max-w-2xl bg-white rounded-2xl shadow-lg p-8">

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-slate-800">
            Tambah Jenis Pembayaran
        </h1>
        <p class="text-sm text-slate-500 mt-1">
            Lengkapi data metode dan detail pembayaran
        </p>
    </div>

    {{-- FORM --}}
    <form method="POST"
          action="{{ route('admin.jenis-pembayaran.store') }}"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf

        {{-- METODE PEMBAYARAN --}}
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Metode Pembayaran
            </label>
            <input
                type="text"
                name="metode_pembayaran"
                value="{{ old('metode_pembayaran') }}"
                class="w-full rounded-xl border border-slate-300 px-4 py-3
                       focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                       transition"
                placeholder="Contoh: Transfer Bank, E-Wallet"
                required
            >
            @error('metode_pembayaran')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- DIVIDER --}}
        <hr class="border-slate-200">

        {{-- DETAIL --}}
        <div>
            <h3 class="text-lg font-bold text-slate-800 mb-4">
                Detail Pembayaran
            </h3>

            <div class="space-y-5">

                {{-- NO REKENING --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        No Rekening / ID
                    </label>
                    <input
                        type="text"
                        name="no_rek"
                        value="{{ old('no_rek') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3
                               focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                               transition"
                        placeholder="Masukkan nomor rekening / ID"
                        required
                    >
                    @error('no_rek')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TEMPAT BAYAR --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Tempat Bayar
                    </label>
                    <input
                        type="text"
                        name="tempat_bayar"
                        value="{{ old('tempat_bayar') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3
                               focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                               transition"
                        placeholder="Contoh: BCA, Mandiri, OVO"
                        required
                    >
                    @error('tempat_bayar')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- LOGO --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Logo (Opsional)
                    </label>
                    <input
                        type="file"
                        name="logo"
                        class="w-full rounded-xl border border-slate-300 px-4 py-2
                               bg-white file:mr-4 file:py-2 file:px-4
                               file:rounded-lg file:border-0
                               file:bg-orange-100 file:text-orange-700
                               hover:file:bg-orange-200 transition"
                    >
                    @error('logo')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </div>

        {{-- ACTION --}}
        <div class="flex items-center justify-end gap-4 pt-6">
            <a href="{{ route('admin.jenis-pembayaran.index') }}"
               class="px-6 py-3 rounded-xl border border-slate-300
                      text-slate-700 font-medium hover:bg-slate-100 transition">
                Kembali
            </a>

            <button
                type="submit"
                class="px-8 py-3 rounded-xl
                       bg-orange-500 hover:bg-orange-600
                       text-white font-semibold
                       shadow-lg hover:shadow-xl
                       transition active:scale-95">
                Simpan
            </button>
        </div>

    </form>
</div>
@endsection
