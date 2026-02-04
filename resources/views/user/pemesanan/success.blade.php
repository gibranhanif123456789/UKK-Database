@extends('layouts.user')

@section('title', 'Pesanan Berhasil')

@section('content')
<section class="py-32 bg-slate-100">
    <div class="max-w-xl mx-auto bg-white rounded-3xl shadow-2xl p-12 text-center">

        <div class="flex justify-center mb-6">
            <div class="w-20 h-20 rounded-full bg-emerald-100 flex items-center justify-center">
                <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
            </div>
        </div>

        <h1 class="text-3xl font-extrabold text-slate-800 mb-4">
            Pesanan Berhasil 🎉
        </h1>

        <p class="text-slate-500 mb-6">
            Pesanan kamu berhasil dibuat dan sedang menunggu konfirmasi.
        </p>

        <div class="bg-slate-50 rounded-2xl p-6 mb-8 text-left text-sm">
            <p><strong>No Resi:</strong> {{ $pemesanan->no_resi }}</p>
            <p><strong>Total Bayar:</strong> Rp {{ number_format($pemesanan->total_bayar) }}</p>
            <p><strong>Status:</strong> {{ $pemesanan->status_pesan }}</p>
        </div>

        <div class="flex flex-col gap-4">
            <a href="{{ route('user.pesanan.riwayat') }}"
               class="bg-emerald-600 hover:bg-emerald-700 text-white py-4 rounded-xl font-semibold transition">
                Lihat Riwayat Pesanan
            </a>

            <a href="{{ route('paket.index') }}"
               class="text-emerald-600 hover:underline">
                Pesan Paket Lain
            </a>
        </div>

    </div>
</section>
@endsection
