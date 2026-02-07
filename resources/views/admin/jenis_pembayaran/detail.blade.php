@extends('layouts.admin')

@section('title', 'Detail Jenis Pembayaran')

@section('content')
<div class="max-w-6xl mx-auto">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-credit-card text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    {{ $jenis->metode_pembayaran }}
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Detail informasi metode pembayaran
                </p>
            </div>
        </div>

        <a href="{{ route('admin.jenis-pembayaran.index') }}"
           class="px-5 py-2.5 rounded-xl border border-slate-300
                  text-slate-700 font-medium hover:bg-slate-50
                  transition-all duration-200 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    {{-- CARD CONTAINER --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-orange-50 to-orange-100">
                    <tr>
                        <th class="p-4 text-left font-semibold text-slate-700">
                            <div class="flex items-center">
                                <i class="fas fa-hashtag mr-2 text-orange-500"></i>
                                No. Rekening / ID
                            </div>
                        </th>
                        <th class="p-4 text-left font-semibold text-slate-700">
                            <div class="flex items-center">
                                <i class="fas fa-building mr-2 text-orange-500"></i>
                                Tempat Bayar
                            </div>
                        </th>
                        <th class="p-4 text-left font-semibold text-slate-700">
                            <div class="flex items-center">
                                <i class="fas fa-image mr-2 text-orange-500"></i>
                                Logo
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($details as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            <td class="p-4">
                                <div class="font-medium text-slate-800">
                                    {{ $item->no_rek ?? '-' }}
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="font-medium text-slate-800">
                                    {{ $item->tempat_bayar ?? '-' }}
                                </div>
                            </td>
                            <td class="p-4">
                                @if(!empty($item->logo))
                                    <div class="w-20 h-20 bg-white border border-slate-200 rounded-xl p-2 shadow-sm">
                                        <img
                                            src="{{ asset('storage/'.$item->logo) }}"
                                            alt="Logo {{ $item->tempat_bayar }}"
                                            class="w-full h-full object-contain"
                                        >
                                    </div>
                                @else
                                    <div class="w-20 h-20 bg-slate-100 border border-slate-200 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-image text-slate-400 text-xl"></i>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center">
                                <div class="flex flex-col items-center justify-center space-y-3">
                                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-inbox text-slate-400 text-2xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 font-medium">Belum ada detail pembayaran</p>
                                        <p class="text-sm text-slate-400 mt-1">Tambahkan detail melalui edit data</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- FOOTER INFO --}}
        @if($details->isNotEmpty())
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle mr-2 text-orange-500"></i>
                        Menampilkan {{ $details->count() }} detail pembayaran
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('admin.jenis-pembayaran.edit', $jenis->id) }}"
                           class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-all duration-200 flex items-center">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Data
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection