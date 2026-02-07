@extends('layouts.admin')

@section('title', 'Jenis Pembayaran')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-credit-card text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Jenis Pembayaran
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Kelola metode pembayaran yang tersedia
                </p>
            </div>
        </div>

        <a href="{{ route('admin.jenis-pembayaran.create') }}"
           class="px-6 py-3 rounded-xl
                  bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                  text-white font-semibold
                  shadow-lg hover:shadow-xl
                  transition-all duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah Jenis
        </a>
    </div>

    {{-- ALERT --}}
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

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
        @if($data->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-orange-50 to-orange-100">
                        <tr>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-credit-card mr-3 text-orange-500"></i>
                                    Metode Pembayaran
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700 w-64">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-cogs mr-3 text-orange-500"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($data as $item)
                            <tr class="hover:bg-slate-50/50 transition-colors duration-150 group">
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-credit-card text-orange-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-800">{{ $item->metode_pembayaran }}</p>
                                            <p class="text-xs text-slate-500 mt-1">
                                                ID: {{ $item->id }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center space-x-3">
                                        <a href="{{ route('admin.jenis-pembayaran.detail', $item->id) }}"
                                           class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg
                                                  hover:bg-blue-100 transition-all duration-200
                                                  flex items-center group/item">
                                            <i class="fas fa-eye mr-2"></i>
                                            Detail
                                        </a>

                                        <a href="{{ route('admin.jenis-pembayaran.edit', $item->id) }}"
                                           class="px-4 py-2 bg-orange-50 text-orange-600 rounded-lg
                                                  hover:bg-orange-100 transition-all duration-200
                                                  flex items-center group/item">
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.jenis-pembayaran.destroy', $item->id) }}"
                                              method="POST" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus metode pembayaran ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="px-4 py-2 bg-red-50 text-red-600 rounded-lg
                                                           hover:bg-red-100 transition-all duration-200
                                                           flex items-center group/item">
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

            {{-- TABLE FOOTER --}}
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <div class="flex items-center">
                        <i class="fas fa-list mr-2 text-orange-500"></i>
                        Menampilkan {{ $data->count() }} jenis pembayaran
                    </div>
                    <div class="text-slate-500">
                        {{-- Total: {{ $data->total() }} data --}}
                    </div>
                </div>
            </div>

        @else
            {{-- EMPTY STATE --}}
            <div class="p-12 text-center">
                <div class="inline-block p-6 bg-slate-100 rounded-full mb-4">
                    <i class="fas fa-credit-card text-slate-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 mb-2">
                    Belum ada jenis pembayaran
                </h3>
                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                    Tambahkan metode pembayaran baru untuk memulai pengelolaan
                </p>
                <a href="{{ route('admin.jenis-pembayaran.create') }}"
                   class="inline-flex items-center px-6 py-3 rounded-xl
                          bg-gradient-to-r from-orange-500 to-orange-600
                          text-white font-semibold hover:from-orange-600 hover:to-orange-700
                          transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Jenis Pembayaran Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection