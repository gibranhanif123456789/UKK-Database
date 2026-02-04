@extends('layouts.user')

@section('title', $paket->nama_paket)

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative bg-slate-900 overflow-hidden">
    {{-- Decorative blur --}}
    <div class="absolute -top-40 -left-40 w-[520px] h-[520px]
                bg-emerald-500/30 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-28
                grid md:grid-cols-2 gap-16 items-center text-white">

        {{-- INFO --}}
        <div>
            <span class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full
                         bg-emerald-500/20 text-emerald-300 text-sm font-medium">
                🍽 Paket Favorit
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                {{ $paket->nama_paket }}
            </h1>

            <p class="text-slate-300 mb-10 leading-relaxed">
                {{ $paket->deskripsi }}
            </p>

            <div class="flex items-end gap-4 mb-12">
                <span class="text-4xl font-extrabold text-emerald-400">
                    Rp {{ number_format($paket->harga) }}
                </span>
                <span class="text-slate-400 mb-1">
                    / porsi
                </span>
            </div>

            {{-- CTA --}}
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('user.pesan', $paket->id) }}"
                   class="group inline-flex items-center gap-2
                          bg-gradient-to-r from-emerald-500 to-teal-500
                          hover:from-emerald-600 hover:to-teal-600
                          text-slate-900 font-semibold
                          px-8 py-4 rounded-xl
                          shadow-lg hover:shadow-2xl
                          transition-all duration-300">
                    Pesan Sekarang
                    <span class="group-hover:translate-x-1 transition">→</span>
                </a>

                <a href="{{ route('home') }}"
                   class="inline-flex items-center px-8 py-4 rounded-xl
                          border border-white/20
                          hover:bg-white/10 transition">
                    Kembali
                </a>
            </div>
        </div>

        {{-- IMAGE --}}
        <div class="relative group">
            <div class="absolute inset-0 rounded-3xl
                        bg-gradient-to-tr from-emerald-500 to-amber-400
                        blur-xl opacity-60
                        group-hover:opacity-80 transition">
            </div>

            <img src="{{ asset('images/food-placeholder.jpg') }}"
                 alt="{{ $paket->nama_paket }}"
                 class="relative rounded-3xl shadow-2xl
                        object-cover h-[440px] w-full
                        group-hover:scale-[1.03]
                        transition duration-500">
        </div>
    </div>
</section>

{{-- ================= DETAIL ================= --}}
<section class="py-28 bg-slate-100">
    <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-3 gap-12">

        {{-- DESKRIPSI --}}
        <div class="md:col-span-2 bg-white rounded-3xl p-10 shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-slate-800">
                Detail Paket
            </h2>

            <p class="text-slate-600 leading-relaxed">
                {{ $paket->deskripsi }}
            </p>
        </div>

        {{-- INFO BOX --}}
        <div class="bg-slate-900 text-white rounded-3xl p-8 shadow-xl">
            <h3 class="text-lg font-semibold mb-6">
                Informasi Paket
            </h3>

            <ul class="space-y-4 text-sm">
                <li class="flex justify-between text-slate-300">
                    <span>Pengiriman</span>
                    <span class="text-white font-medium">Setiap Hari</span>
                </li>

                <li class="flex justify-between text-slate-300">
                    <span>Minimal Order</span>
                    <span class="text-white font-medium">1 Porsi</span>
                </li>

                <li class="flex justify-between text-slate-300">
                    <span>Status</span>
                    <span class="text-emerald-400 font-semibold">
                        Tersedia
                    </span>
                </li>
            </ul>

            {{-- CTA --}}
            <a href="{{ route('user.pesan', $paket->id) }}"
               class="block text-center mt-10 w-full
                      bg-gradient-to-r from-emerald-500 to-teal-500
                      hover:from-emerald-600 hover:to-teal-600
                      text-slate-900 font-bold
                      py-4 rounded-xl
                      shadow-lg hover:shadow-2xl
                      transition-all duration-300">
                Pesan Sekarang
            </a>
        </div>

    </div>
</section>

@endsection
