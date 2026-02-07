@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-utensils text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Data Paket Catering
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Kelola semua paket catering yang tersedia
                </p>
            </div>
        </div>

        <a href="{{ route('admin.paket.create') }}"
           class="px-6 py-3 rounded-xl
                  bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                  text-white font-semibold
                  shadow-lg hover:shadow-xl
                  transition-all duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah Paket
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl flex items-center">
            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-check text-green-600"></i>
            </div>
            <div class="flex-1">
                <p class="font-medium text-green-800">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
        @if($pakets->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-orange-50 to-orange-100">
                        <tr>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-tag mr-3 text-orange-500"></i>
                                    Paket
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-layer-group mr-3 text-orange-500"></i>
                                    Jenis & Kategori
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-users mr-3 text-orange-500"></i>
                                    Pax
                                </div>
                            </th>
                            <th class="p-4 text-right font-semibold text-slate-700">
                                <div class="flex items-center justify-end">
                                    <i class="fas fa-money-bill-wave mr-3 text-orange-500"></i>
                                    Harga
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-image mr-3 text-orange-500"></i>
                                    Foto
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700 w-48">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-cogs mr-3 text-orange-500"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($pakets as $paket)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            <td class="p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-utensils text-orange-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $paket->nama_paket }}</p>
                                        <p class="text-xs text-slate-500 mt-1">
                                            {{ Str::limit($paket->deskripsi, 50) }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="space-y-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                {{ $paket->jenis == 'Prasmanan' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }}">
                                        {{ $paket->jenis }}
                                    </span>
                                    <p class="text-sm text-slate-700">
                                        {{ $paket->kategori }}
                                    </p>
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-slate-800">
                                            {{ $paket->jumlah_pax }}
                                        </div>
                                        <div class="text-xs text-slate-500">Orang</div>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="text-right">
                                    <div class="text-lg font-bold text-slate-800">
                                        Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}
                                    </div>
                                    <div class="text-xs text-slate-500">Per paket</div>
                                </div>
                            </td>

                            <!-- FOTO -->
                            <td class="p-4">
                                <div class="flex justify-center">
                                    <div class="flex items-center space-x-2">
                                        @php
                                            $fotoCount = 0;
                                            $fotos = ['foto1', 'foto2', 'foto3'];
                                        @endphp
                                        
                                        @foreach($fotos as $foto)
                                            @if($paket->$foto)
                                                @php $fotoCount++ @endphp
                                                <div class="relative group">
                                                    <div class="w-10 h-10 bg-white border border-slate-200 rounded-lg overflow-hidden">
                                                        <img src="{{ asset('storage/'.$paket->$foto) }}"
                                                             class="w-full h-full object-cover">
                                                    </div>
                                                    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-black text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                                        Foto {{ $loop->iteration }}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        
                                        @if($fotoCount == 0)
                                            <div class="w-10 h-10 bg-slate-100 border border-slate-200 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-image text-slate-400"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- AKSI -->
                            <td class="p-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('admin.paket.edit', $paket->id) }}"
                                       class="px-4 py-2 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg
                                              hover:from-orange-600 hover:to-orange-700 transition-all duration-200
                                              flex items-center shadow hover:shadow-md">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.paket.destroy', $paket->id) }}"
                                          method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket \"{{ $paket->nama_paket }}\"?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg
                                                       hover:from-red-600 hover:to-red-700 transition-all duration-200
                                                       flex items-center shadow hover:shadow-md">
                                            <i class="fas fa-trash-alt mr-2"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <div class="flex items-center">
                        <i class="fas fa-utensils mr-2 text-orange-500"></i>
                        Menampilkan {{ $pakets->count() }} paket catering
                    </div>
                    <div class="text-slate-500">
                        {{-- Total: {{ $pakets->total() }} paket --}}
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="p-12 text-center">
                <div class="inline-block p-6 bg-slate-100 rounded-full mb-4">
                    <i class="fas fa-utensils text-slate-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 mb-2">
                    Belum ada paket catering
                </h3>
                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                    Tambahkan paket catering baru untuk mulai menawarkan layanan kepada pelanggan
                </p>
                <a href="{{ route('admin.paket.create') }}"
                   class="inline-flex items-center px-6 py-3 rounded-xl
                          bg-gradient-to-r from-orange-500 to-orange-600
                          text-white font-semibold hover:from-orange-600 hover:to-orange-700
                          transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Paket Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection