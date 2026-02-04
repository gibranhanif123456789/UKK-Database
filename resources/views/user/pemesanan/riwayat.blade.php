@extends('layouts.user')

@section('title', 'Riwayat Pesanan')

@section('content')
<section class="py-24 bg-slate-100">
    <div class="max-w-6xl mx-auto px-6">

        {{-- HEADER --}}
        <div class="mb-14 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-3">
                Riwayat Pesanan
            </h1>
            <p class="text-slate-500">
                Semua pesanan yang pernah kamu buat
            </p>
        </div>

        {{-- LIST PESANAN --}}
        @forelse ($pesanan as $item)
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-10">

                {{-- TOP --}}
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <p class="text-xs text-slate-400 uppercase tracking-wide">
                            No Resi
                        </p>
                        <p class="font-semibold text-slate-800 text-lg">
                            {{ $item->no_resi }}
                        </p>
                        <p class="text-sm text-slate-500 mt-1">
                            {{ $item->tgl_pesan->format('d M Y, H:i') }}
                        </p>
                    </div>

                    <span class="px-5 py-2 rounded-full text-sm font-semibold
                        @if($item->status_pesan == 'Menunggu Konfirmasi')
                            bg-yellow-100 text-yellow-700
                        @elseif($item->status_pesan == 'Sedang Diproses')
                            bg-blue-100 text-blue-700
                        @else
                            bg-emerald-100 text-emerald-700
                        @endif">
                        {{ $item->status_pesan }}
                    </span>
                </div>

                {{-- DETAIL PAKET --}}
                <div class="space-y-5 mb-8">
                    @foreach ($item->detailPemesanan as $detail)
                        <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                            <div>
                                <p class="font-semibold text-slate-800">
                                    {{ $detail->paket->nama_paket }}
                                </p>
                                <p class="text-sm text-slate-500">
                                    {{ $detail->qty }} pax
                                </p>
                            </div>

                            <p class="font-semibold text-slate-800">
                                Rp {{ number_format($detail->subtotal) }}
                            </p>
                        </div>
                    @endforeach
                </div>

                {{-- TOTAL --}}
                <div class="flex justify-between items-center bg-slate-50 rounded-2xl p-6">
                    <span class="font-semibold text-slate-600">
                        Total Bayar
                    </span>
                    <span class="text-2xl font-extrabold text-emerald-600">
                        Rp {{ number_format($item->total_bayar) }}
                    </span>
                </div>
            </div>
        @empty
            {{-- EMPTY STATE --}}
            <div class="bg-white rounded-3xl p-14 text-center shadow-lg">
                <div class="text-6xl mb-4">🛒</div>
                <p class="text-slate-500 mb-6">
                    Kamu belum punya pesanan
                </p>
                <a href="{{ route('home') }}"
                   class="inline-block bg-emerald-500 hover:bg-emerald-600
                          text-slate-900 font-semibold
                          px-8 py-4 rounded-xl transition">
                    Lihat Paket Catering
                </a>
            </div>
        @endforelse

        {{-- BACK HOME --}}
        <div class="mt-16 text-center">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2
                      text-slate-600 hover:text-emerald-600
                      font-medium transition">
                ← Kembali ke Home
            </a>
        </div>

    </div>
</section>
@endsection
