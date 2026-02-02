@extends('layouts.admin')

@section('title', 'Jenis Pembayaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Jenis Pembayaran</h1>
        <a href="{{ route('admin.jenis-pembayaran.create') }}"
           class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
            + Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Metode Pembayaran</th>
                <th class="p-3 w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($data as $item)
            <tr class="border-t">
                <td class="p-3">{{ $item->metode_pembayaran }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.jenis-pembayaran.edit', $item->id) }}"
                       class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('admin.jenis-pembayaran.destroy', $item->id) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus data ini?')"
                                class="text-red-600 hover:underline ml-2">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="p-3 text-center text-gray-500">
                    Data kosong
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
