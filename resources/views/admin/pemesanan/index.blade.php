@extends('layouts.admin')

@section('title', 'Data Pemesanan')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data Pemesanan</h1>

<div class="bg-white rounded shadow overflow-x-auto">
<table class="w-full text-sm">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="p-3">No Resi</th>
            <th class="p-3">Pelanggan</th>
            <th class="p-3">Tanggal</th>
            <th class="p-3">Total</th>
            <th class="p-3">Status</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemesanan as $item)
        <tr class="border-t">
            <td class="p-3">{{ $item->no_resi ?? '-' }}</td>
            <td class="p-3">{{ $item->pelanggan->nama_pelanggan }}</td>
            <td class="p-3">{{ $item->tgl_pesan->format('d M Y') }}</td>
            <td class="p-3 font-semibold">
                Rp {{ number_format($item->total_bayar) }}
            </td>
            <td class="p-3">
                <span class="px-2 py-1 rounded text-xs
                    @if($item->status_pesan == 'Menunggu Konfirmasi') bg-yellow-100 text-yellow-700
                    @elseif($item->status_pesan == 'Sedang Diproses') bg-blue-100 text-blue-700
                    @else bg-green-100 text-green-700
                    @endif">
                    {{ $item->status_pesan }}
                </span>
            </td>
            <td class="p-3 flex gap-2">
                <a href="{{ route('admin.pemesanan.show', $item->id) }}"
                   class="text-blue-600 hover:underline">
                    Detail
                </a>

                <a href="{{ route('admin.pemesanan.edit', $item->id) }}"
                   class="text-orange-600 hover:underline">
                    Update Status
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
