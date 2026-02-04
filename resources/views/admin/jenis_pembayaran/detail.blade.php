@extends('layouts.admin')

@section('title', 'Detail Jenis Pembayaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold">
            Detail {{ $jenis->metode_pembayaran }}
        </h1>

        <a href="{{ route('admin.jenis-pembayaran.index') }}"
           class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
            ← Kembali
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">No Rekening</th>
                    <th class="p-3 text-left">Tempat Bayar</th>
                    <th class="p-3 text-left w-40">Logo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($details as $item)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">
                            {{ $item->no_rek ?? '-' }}
                        </td>
                        <td class="p-3">
                            {{ $item->tempat_bayar ?? '-' }}
                        </td>
                        <td class="p-3">
                            @if(!empty($item->logo))
                                <img
                                    src="{{ asset('storage/'.$item->logo) }}"
                                    alt="Logo Pembayaran"
                                    class="h-16 object-contain rounded border"
                                >
                            @else
                                <span class="text-gray-400 italic">Tidak ada</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"
                            class="p-4 text-center text-gray-500 italic">
                            Belum ada detail jenis pembayaran
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
