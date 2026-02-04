@extends('layouts.admin')

@section('title', 'Data Pemesanan')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Data Pemesanan</h1>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
            <tr>
                <th class="p-4">No Resi</th>
                <th class="p-4">Pelanggan</th>
                <th class="p-4">Tanggal</th>
                <th class="p-4">Total</th>
                <th class="p-4">Status</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanan as $item)
            <tr class="border-t hover:bg-gray-50 transition">
                <td class="p-4 font-medium">{{ $item->no_resi ?? '-' }}</td>
                <td class="p-4">{{ $item->pelanggan->nama_pelanggan ?? '-' }}</td>
                <td class="p-4">{{ $item->tgl_pesan->format('d M Y') }}</td>
                <td class="p-4 font-semibold">
                    Rp {{ number_format($item->total_bayar) }}
                </td>
                <td class="p-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($item->status_pesan == 'Menunggu Konfirmasi')
                            bg-yellow-100 text-yellow-700
                        @elseif($item->status_pesan == 'Sedang Diproses')
                            bg-blue-100 text-blue-700
                        @else
                            bg-green-100 text-green-700
                        @endif">
                        {{ $item->status_pesan }}
                    </span>
                </td>
                <td class="p-4 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('admin.pemesanan.show', $item->id) }}"
                           class="px-3 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 text-xs">
                            Detail
                        </a>
                        <a href="{{ route('admin.pemesanan.edit', $item->id) }}"
                           class="px-3 py-1 rounded bg-orange-100 text-orange-700 hover:bg-orange-200 text-xs">
                            Update
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
