@extends('layouts.kurir')

@section('title', 'Detail Pesanan')

@section('content')
<section class="max-w-4xl mx-auto py-10 px-6">

    <a href="{{ route('kurir.pesanan') }}"
       class="text-sm text-emerald-600 hover:underline">
        ← Kembali ke daftar pesanan
    </a>

    <div class="bg-white rounded-3xl shadow-xl p-8 mt-6">

        {{-- HEADER --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <p class="text-sm text-slate-500">No Resi</p>
                <h1 class="text-2xl font-extrabold text-slate-800">
                    {{ $pemesanan->no_resi }}
                </h1>
            </div>

            <span class="px-4 py-2 rounded-full text-sm font-semibold
                @if($pemesanan->status_pesan == 'Menunggu Kurir')
                    bg-yellow-100 text-yellow-700
                @elseif($pemesanan->status_pesan == 'Sedang Diantar')
                    bg-blue-100 text-blue-700
                @else
                    bg-emerald-100 text-emerald-700
                @endif">
                {{ $pemesanan->status_pesan }}
            </span>
        </div>

        {{-- INFO PELANGGAN --}}
        <div class="grid md:grid-cols-2 gap-6 mb-8">

            <div class="bg-slate-50 rounded-2xl p-5">
                <h3 class="font-semibold text-slate-800 mb-3">
                    👤 Pelanggan
                </h3>
                <p class="text-sm">Nama: <strong>{{ $pemesanan->pelanggan->nama ?? '-' }}</strong></p>
                <p class="text-sm">No HP: <strong>{{ $pemesanan->pelanggan->no_hp ?? '-' }}</strong></p>
            </div>

            <div class="bg-slate-50 rounded-2xl p-5">
                <h3 class="font-semibold text-slate-800 mb-3">
                    📍 Alamat Pengantaran
                </h3>
                <p class="text-sm leading-relaxed">
                    {{ $pemesanan->alamat_pengantaran ?? '-' }}
                </p>
            </div>

        </div>

        {{-- DETAIL PAKET --}}
        <div class="mb-8">
            <h3 class="font-semibold text-slate-800 mb-4">
                🍱 Detail Pesanan
            </h3>

            <div class="space-y-3">
                @foreach ($pemesanan->detailPemesanan as $detail)
                    <div class="flex justify-between items-center
                                bg-slate-50 rounded-xl p-4">
                        <div>
                            <p class="font-semibold">
                                {{ $detail->paket->nama_paket }}
                            </p>
                            <p class="text-sm text-slate-500">
                                {{ $detail->qty }} pax
                            </p>
                        </div>

                        <p class="font-bold">
                            Rp {{ number_format($detail->subtotal) }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between mt-4 text-lg font-extrabold">
                <span>Total Bayar</span>
                <span class="text-emerald-600">
                    Rp {{ number_format($pemesanan->total_bayar) }}
                </span>
            </div>
        </div>

        {{-- ACTION --}}
        <div class="flex gap-4">

            @if($pemesanan->status_pesan == 'Menunggu Kurir')
                <form method="POST"
                      action="{{ route('kurir.pesanan.ambil', $pemesanan->id) }}">
                    @csrf
                    <button
                        class="px-6 py-3 rounded-xl bg-emerald-500
                               hover:bg-emerald-600 transition
                               font-semibold text-white">
                        Ambil Pesanan
                    </button>
                </form>
            @endif

            @if($pemesanan->status_pesan == 'Sedang Diantar')
                <form method="POST"
                      action="{{ route('kurir.pesanan.selesai', $pemesanan->id) }}">
                    @csrf
                    <button
                        class="px-6 py-3 rounded-xl bg-blue-600
                               hover:bg-blue-700 transition
                               font-semibold text-white">
                        Tandai Selesai
                    </button>
                </form>
            @endif

        </div>

    </div>
</section>
@endsection
