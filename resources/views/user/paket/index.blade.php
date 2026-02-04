@extends('layouts.user')

@section('title', 'Paket Catering')

@section('content')

{{-- ================= HEADER ================= --}}
<section class="bg-slate-100 pt-24 pb-16">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-4">
            Semua Paket Catering
        </h1>
        <p class="text-slate-500 max-w-2xl mx-auto">
            Pilih paket catering terbaik sesuai kebutuhan harian maupun acara spesial kamu
        </p>
    </div>
</section>

{{-- ================= LIST PAKET ================= --}}
<section class="bg-slate-100 pb-28">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            @forelse ($pakets as $paket)
                <div
                    class="group bg-white rounded-3xl shadow-lg overflow-hidden
                           hover:shadow-2xl transition duration-300">

                    {{-- IMAGE --}}
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('images/food-placeholder.jpg') }}"
                             alt="{{ $paket->nama_paket }}"
                             class="w-full h-full object-cover
                                    group-hover:scale-105 transition duration-500">

                        <span class="absolute top-4 left-4
                                     bg-emerald-500/90 text-white
                                     text-xs font-semibold
                                     px-3 py-1 rounded-full">
                            {{ $paket->kategori ?? 'Paket' }}
                        </span>
                    </div>

                    {{-- CONTENT --}}
                    <div class="p-7 flex flex-col justify-between h-[260px]">

                        <div>
                            <h2 class="text-xl font-bold text-slate-800 mb-2">
                                {{ $paket->nama_paket }}
                            </h2>

                            <p class="text-slate-500 text-sm leading-relaxed">
                                {{ Str::limit($paket->deskripsi, 90) }}
                            </p>
                        </div>

                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-2xl font-extrabold text-emerald-600">
                                Rp {{ number_format($paket->harga_paket) }}
                            </span>

                            <a href="{{ route('paket.show', $paket->id) }}"
                               class="inline-flex items-center gap-1
                                      text-sm font-semibold text-emerald-600
                                      hover:text-emerald-700 transition">
                                Detail
                                <span class="group-hover:translate-x-1 transition">→</span>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <p class="col-span-full text-center text-slate-500">
                    Paket catering belum tersedia.
                </p>
            @endforelse

        </div>
    </div>
</section>

@endsection
