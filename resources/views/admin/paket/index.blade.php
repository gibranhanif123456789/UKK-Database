@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            Data Paket Catering
        </h1>

        <a href="{{ route('admin.paket.create') }}"
           class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
            + Tambah Paket
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left">Nama Paket</th>
                    <th class="px-4 py-3 text-left">Jenis</th>
                    <th class="px-4 py-3 text-left">Kategori</th>
                    <th class="px-4 py-3 text-center">Pax</th>
                    <th class="px-4 py-3 text-right">Harga</th>
                    <th class="px-4 py-3 text-center">Foto</th>
                    <th class="px-4 py-3 text-center w-40">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($pakets as $paket)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-800">
                        {{ $paket->nama_paket }}
                    </td>

                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-sm rounded bg-blue-100 text-blue-700">
                            {{ $paket->jenis }}
                        </span>
                    </td>

                    <td class="px-4 py-3">
                        {{ $paket->kategori }}
                    </td>

                    <td class="px-4 py-3 text-center">
                        {{ $paket->jumlah_pax }}
                    </td>

                    <td class="px-4 py-3 text-right">
                        Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}
                    </td>

                    <!-- FOTO -->
                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">
                            @foreach(['foto1','foto2','foto3'] as $foto)
                                @if($paket->$foto)
                                    <img src="{{ asset('storage/'.$paket->$foto) }}"
                                         class="w-12 h-12 object-cover rounded border">
                                @endif
                            @endforeach

                            @if(!$paket->foto1 && !$paket->foto2 && !$paket->foto3)
                                <span class="text-gray-400 text-sm">-</span>
                            @endif
                        </div>
                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-3">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.paket.edit', $paket->id) }}"
                               class="px-3 py-1 text-sm bg-yellow-400 text-white rounded hover:bg-yellow-500">
                                Edit
                            </a>

                            <form action="{{ route('admin.paket.destroy', $paket->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus paket ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                        Data paket masih kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
