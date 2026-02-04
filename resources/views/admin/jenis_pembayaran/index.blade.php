@extends('layouts.admin')

@section('title', 'Jenis Pembayaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold">Jenis Pembayaran</h1>

        <a href="{{ route('admin.jenis-pembayaran.create') }}"
           class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
            + Tambah
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-5">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Metode Pembayaran</th>
                    <th class="p-3 text-center w-56">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($data as $item)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">
                        {{ $item->metode_pembayaran }}
                    </td>
                    <td class="p-3 text-center space-x-3">

                        <a href="{{ route('admin.jenis-pembayaran.detail', $item->id) }}"
                           class="text-green-600 hover:underline font-medium">
                            Detail
                        </a>

                        <a href="{{ route('admin.jenis-pembayaran.edit', $item->id) }}"
                           class="text-blue-600 hover:underline font-medium">
                            Edit
                        </a>

                        <form action="{{ route('admin.jenis-pembayaran.destroy', $item->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data ini?')"
                                    class="text-red-600 hover:underline font-medium">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2"
                        class="p-4 text-center text-gray-500 italic">
                        Data jenis pembayaran masih kosong
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
