@extends('layouts.user')

@section('title', 'Catering Harian & Acara')

@section('content')

{{-- HERO --}}
<section class="relative bg-slate-900 overflow-hidden">
    {{-- blur blob --}}
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-emerald-500/30 rounded-full blur-3xl"></div>
    <div class="absolute top-1/3 -right-32 w-96 h-96 bg-amber-400/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-32 grid md:grid-cols-2 gap-16 items-center">

        {{-- TEXT --}}
        <div class="text-white">
            <span class="inline-flex items-center gap-2 mb-6 px-4 py-1 rounded-full
                         bg-white/10 backdrop-blur text-sm">
                🍱 Catering Harian & Event
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Catering
                <span class="text-emerald-400">Praktis</span><br>
                Tanpa Ribet
            </h1>

            <p class="text-slate-300 mb-10 max-w-lg">
                Nikmati makanan berkualitas tanpa repot masak.
                Cocok untuk rumah, kantor, hingga acara besar.
            </p>

            <div class="flex gap-4">
                <a href="#paket"
                   class="group bg-emerald-500 hover:bg-emerald-600
                          text-slate-900 font-semibold px-7 py-3 rounded-xl
                          flex items-center gap-2 transition">
                    Lihat Paket
                    <span class="group-hover:translate-x-1 transition">→</span>
                </a>

                <a href="#"
                   class="px-7 py-3 rounded-xl border border-white/20
                          text-white hover:bg-white/10 transition">
                    Cara Pesan
                </a>
            </div>
        </div>

        {{-- IMAGE --}}
        <div class="relative group">
            <div class="absolute inset-0 rounded-3xl bg-gradient-to-tr
                        from-emerald-500 to-amber-400 opacity-60 blur-xl
                        group-hover:opacity-80 transition"></div>

            <img src="{{ asset('images/hero-food.jpg') }}"
                 class="relative rounded-3xl shadow-2xl
                        object-cover h-[460px] w-full
                        group-hover:scale-[1.03] transition duration-500"
                 alt="Catering">
        </div>
    </div>
</section>


{{-- KEUNGGULAN --}}
<section class="py-28 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-20">
            Kenapa Banyak yang Pilih Kami?
        </h2>

        <div class="grid md:grid-cols-3 gap-10">
            @foreach ([
                ['🍲','Rasa Rumahan','Chef berpengalaman, bahan segar setiap hari'],
                ['⏱️','Tepat Waktu','Pengiriman konsisten & terjadwal'],
                ['💰','Harga Masuk Akal','Fleksibel sesuai kebutuhan']
            ] as $f)

            <div class="group relative p-8 rounded-2xl bg-slate-900
                        border border-white/5 overflow-hidden">

                <div class="absolute inset-0 bg-gradient-to-br
                            from-emerald-500/10 to-amber-400/10
                            opacity-0 group-hover:opacity-100 transition"></div>

                <div class="relative">
                    <div class="text-4xl mb-5">{{ $f[0] }}</div>
                    <h3 class="text-lg font-semibold mb-2">{{ $f[1] }}</h3>
                    <p class="text-slate-400 text-sm">{{ $f[2] }}</p>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>



{{-- PAKET --}}
<section id="paket" class="py-28 bg-slate-100">
    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl md:text-4xl font-bold text-center mb-20">
            Paket Favorit
        </h2>

        <div class="grid md:grid-cols-3 gap-12">

            @forelse ($pakets as $paket)

            <a href="{{ route('paket.index', $paket) }}"
               class="group block bg-white rounded-3xl shadow-lg
                      hover:shadow-2xl transition overflow-hidden">

                <div class="p-8 h-full flex flex-col justify-between">

                    {{-- INFO --}}
                    <div>
                        <h3 class="text-xl font-semibold mb-3 text-slate-800">
                            {{ $paket->nama_paket }}
                        </h3>

                        <p class="text-slate-600 text-sm mb-6">
                            {{ Str::limit($paket->deskripsi, 100) }}
                        </p>
                    </div>

                    {{-- FOOTER --}}
                    <div class="flex items-center justify-between mt-6">

                        <span class="text-2xl font-bold text-emerald-600">
                            Rp {{ number_format($paket->harga_paket) }}
                        </span>

                        {{-- BUTTON PESAN --}}
                        <span
                            onclick="event.stopPropagation()"
                            class="relative overflow-hidden px-5 py-2 rounded-xl
                                   bg-slate-900 text-white text-sm font-medium">

                            <span class="relative z-10">Pesan</span>

                            <span class="absolute inset-0 bg-emerald-500
                                         translate-y-full
                                         group-hover:translate-y-0
                                         transition"></span>
                        </span>

                    </div>

                </div>
            </a>

            @empty
                <p class="col-span-3 text-center text-slate-500">
                    Paket belum tersedia
                </p>
            @endforelse

        </div>
    </div>
</section>



@endsection
