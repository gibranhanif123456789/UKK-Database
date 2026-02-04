@extends('layouts.admin')

@section('title', 'Detail Pemesanan')

@section('content')
<h1 class="text-2xl font-bold mb-6">Detail Pemesanan</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="font-semibold mb-4">Informasi Pesanan</h2>
        <p><strong>No Resi:</strong> {{ $pemesanan->no_resi }}</p>
        <p><strong>Pelanggan:</strong> {{ $pemesanan->pelanggan->nama_pelanggan ?? '-' }}</p>
        <p><strong>Tanggal:</strong> {{ $pemesanan->tgl_pesan->format('d M Y') }}</p>
        <p><strong>Status:</strong>
            <span class="px-2 py-1 rounded-full text-xs bg-gray-100">
                {{ $pemesanan->status_pesan }}
            </span>
        </p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-center">
        <div class="text-center">
            <p class="text-gray-500 text-sm">Total Bayar</p>
            <p class="text-3xl font-bold text-green-600">
                Rp {{ number_format($pemesanan->total_bayar) }}
            </p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm p-6">
    <h2 class="font-semibold mb-4">Detail Item</h2>

    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-3 text-left">Paket</th>
                <th class="p-3 text-center">Qty</th>
                <th class="p-3 text-right">Harga</th>
                <th class="p-3 text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanan->detailPemesanan as $detail)
            <tr class="border-t">
                <td class="p-3">{{ $detail->paket->nama_paket }}</td>
                <td class="p-3 text-center">{{ $detail->qty }}</td>
                <td class="p-3 text-right">Rp {{ number_format($detail->harga) }}</td>
                <td class="p-3 text-right font-semibold">
                    Rp {{ number_format($detail->subtotal) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('admin.pemesanan.index') }}"
   class="inline-block mt-6 text-blue-600 hover:underline">
    ← Kembali ke Data Pemesanan
</a>
@endsection
