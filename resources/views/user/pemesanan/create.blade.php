@extends('layouts.user')

@section('title', 'Konfirmasi Pesanan')

@section('content')
<section class="py-24 bg-slate-100">
    <div class="max-w-6xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="mb-14 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-3">
                Konfirmasi Pesanan
            </h1>
            <p class="text-slate-500">
                Pastikan detail pesanan kamu sudah benar
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-10 items-start">

            {{-- ===================== --}}
            {{-- RINGKASAN PAKET --}}
            {{-- ===================== --}}
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-xl p-7 sticky top-28">

                <h2 class="text-lg font-bold text-slate-800 mb-5">
                    Paket Dipilih
                </h2>

                <div class="space-y-5">

                    <div class="bg-slate-50 rounded-2xl p-5">
                        <h3 class="font-semibold text-slate-800 text-lg">
                            {{ $paket->nama_paket }}
                        </h3>

                        <p class="text-sm text-slate-500 mt-2">
                            {{ Str::limit($paket->deskripsi, 90) }}
                        </p>

                        <div class="mt-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-100">
                            <p class="text-xs uppercase tracking-wide text-emerald-600">
                                Harga per pax
                            </p>
                            <p class="text-2xl font-extrabold text-emerald-700">
                                Rp {{ number_format($paket->harga_paket) }}
                            </p>
                        </div>
                    </div>

                    <p class="text-xs text-slate-400">
                        * Total harga akan dihitung otomatis
                    </p>

                </div>
            </div>

            {{-- ===================== --}}
            {{-- FORM PEMESANAN --}}
            {{-- ===================== --}}
            <div class="lg:col-span-3 bg-white rounded-3xl shadow-2xl p-10">

                <form method="POST" action="{{ route('user.pesan.store') }}" class="space-y-8">
                    @csrf

                    <input type="hidden" name="id_paket" value="{{ $paket->id }}">

                    {{-- JUMLAH --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Jumlah Pesanan
                        </label>

                        <div class="relative">
                            <input
                                type="number"
                                name="qty"
                                min="1"
                                value="1"
                                oninput="document.getElementById('totalHarga').innerText =
                                (this.value * {{ $paket->harga_paket }}).toLocaleString('id-ID')"
                                class="w-full rounded-xl border border-slate-300 px-4 py-4
                                       focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                                       transition"
                                required
                            >

                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">
                                pax
                            </span>
                        </div>
                    </div>

                    {{-- ALAMAT --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Alamat Pengiriman
                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="w-full rounded-xl border border-slate-300 px-4 py-4
                                   focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                                   transition"
                            required
                        >{{ $pelanggan->alamat1 }}</textarea>

                        <p class="mt-2 text-xs text-slate-400">
                            Pastikan alamat lengkap dan mudah ditemukan kurir
                        </p>
                    </div>

                    {{-- PEMBAYARAN --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Metode Pembayaran
                        </label>

                        <div class="relative">
                            <select
                                name="id_jenis_bayar"
                                class="w-full appearance-none rounded-xl border border-slate-300
                                       bg-white px-4 py-4 pr-12
                                       focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
                                       transition"
                                required
                            >
                                <option value="">Pilih metode pembayaran</option>
                                @foreach ($jenisPembayaran as $jp)
                                    <option value="{{ $jp->id }}">
                                        {{ $jp->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>

                            <svg class="absolute right-4 top-1/2 -translate-y-1/2 h-5 w-5 text-slate-500"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>

                    {{-- TOTAL --}}
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-600 text-sm">
                                Estimasi Total Bayar
                            </span>
                            <span class="text-2xl font-extrabold text-slate-800">
                                Rp <span id="totalHarga">{{ number_format($paket->harga_paket) }}</span>
                            </span>
                        </div>
                    </div>

                    {{-- SUBMIT --}}
                    <button
                        type="submit"
                        class="w-full
                               bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500
                               hover:from-emerald-600 hover:via-teal-600 hover:to-cyan-600
                               text-white font-bold tracking-wide
                               py-5 rounded-2xl
                               shadow-xl hover:shadow-2xl
                               transition-all duration-300
                               flex items-center justify-center gap-3
                               active:scale-95">

                        <span>Konfirmasi Pesanan</span>

                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 12h14m-7-7l7 7-7 7"/>
                        </svg>
                    </button>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection
