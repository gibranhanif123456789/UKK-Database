@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500 text-sm">Total Pemesanan</p>
        <h2 class="text-3xl font-bold">{{ $totalPemesanan }}</h2>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500 text-sm">Menunggu Konfirmasi</p>
        <h2 class="text-3xl font-bold text-yellow-500">
            {{ $menungguKonfirmasi }}
        </h2>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500 text-sm">Sedang Diproses</p>
        <h2 class="text-3xl font-bold text-blue-500">
            {{ $sedangDiproses }}
        </h2>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500 text-sm">Total Omzet</p>
        <h2 class="text-2xl font-bold text-green-600">
            Rp {{ number_format($totalOmzet) }}
        </h2>
    </div>

</div>

<!-- Pesanan Terbaru -->
<div class="bg-white rounded shadow">
    <div class="p-4 border-b font-semibold">
        Pesanan Terbaru
    </div>

    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Pelanggan</th>
                <th class="p-3 text-left">Tanggal</th>
                <th class="p-3 text-left">Total</th>
                <th class="p-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pesananTerbaru as $item)
            <tr class="border-t">
                <td class="p-3">{{ $item->pelanggan->nama_pelanggan }}</td>
                <td class="p-3">{{ $item->tgl_pesan->format('d M Y') }}</td>
                <td class="p-3">Rp {{ number_format($item->total_bayar) }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 text-xs rounded
                        @if($item->status_pesan == 'Menunggu Konfirmasi') bg-yellow-100 text-yellow-700
                        @elseif($item->status_pesan == 'Sedang Diproses') bg-blue-100 text-blue-700
                        @else bg-green-100 text-green-700
                        @endif">
                        {{ $item->status_pesan }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-gray-500">
                    Belum ada pesanan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
