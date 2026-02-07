@extends('layouts.user')

@section('title', 'Riwayat Pesanan')

@section('content')
<section class="py-24 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-16 text-center">
            <div class="inline-flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-history text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
                        Riwayat Pesanan
                    </h1>
                    <p class="text-slate-500 mt-2">
                        Semua pesanan yang pernah kamu buat
                    </p>
                </div>
            </div>

            <!-- Stats -->
            <div class="inline-flex items-center gap-6 bg-white rounded-2xl shadow-sm p-4 mb-8">
                <div class="text-center px-4">
                    <div class="text-xl font-bold text-slate-800">{{ $pesanan->count() }}</div>
                    <div class="text-sm text-slate-500">Total Pesanan</div>
                </div>
                <div class="h-6 w-px bg-slate-200"></div>
                <div class="text-center px-4">
                    <div class="text-xl font-bold text-emerald-600">
                        {{ $pesanan->where('status_pesan', 'Selesai')->count() }}
                    </div>
                    <div class="text-sm text-slate-500">Selesai</div>
                </div>
            </div>
        </div>

        <!-- Orders List -->
        @if($pesanan->isNotEmpty())
            <div class="space-y-8">
                @foreach ($pesanan as $item)
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-300">
                    
                    <!-- Order Header -->
                    <div class="p-8 border-b border-slate-100">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-receipt text-emerald-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-slate-500 uppercase tracking-wide">
                                            No. Resi
                                        </p>
                                        <p class="font-bold text-lg text-slate-800 font-mono">
                                            {{ $item->no_resi }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 text-sm">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-calendar text-slate-400"></i>
                                        <span class="text-slate-600">{{ $item->tgl_pesan->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-clock text-slate-400"></i>
                                        <span class="text-slate-600">{{ $item->tgl_pesan->format('H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Badge -->
                            <div>
                                <span class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-sm font-semibold
                                    @if($item->status_pesan == 'Menunggu Konfirmasi')
                                        bg-yellow-100 text-yellow-700 border border-yellow-200
                                    @elseif($item->status_pesan == 'Sedang Diproses')
                                        bg-blue-100 text-blue-700 border border-blue-200
                                    @elseif($item->status_pesan == 'Menunggu Kurir')
                                        bg-orange-100 text-orange-700 border border-orange-200
                                    @elseif($item->status_pesan == 'Selesai')
                                        bg-emerald-100 text-emerald-700 border border-emerald-200
                                    @else
                                        bg-slate-100 text-slate-700 border border-slate-200
                                    @endif">
                                    @if($item->status_pesan == 'Menunggu Konfirmasi')
                                        <i class="fas fa-clock"></i>
                                    @elseif($item->status_pesan == 'Sedang Diproses')
                                        <i class="fas fa-cogs"></i>
                                    @elseif($item->status_pesan == 'Menunggu Kurir')
                                        <i class="fas fa-truck"></i>
                                    @elseif($item->status_pesan == 'Selesai')
                                        <i class="fas fa-check-circle"></i>
                                    @endif
                                    {{ $item->status_pesan }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Package Details -->
                    <div class="p-8">
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-slate-800 mb-4 flex items-center">
                                <i class="fas fa-box text-emerald-500 mr-3"></i>
                                Detail Pesanan
                            </h3>
                            
                            <div class="space-y-4">
                                @foreach ($item->detailPemesanan as $detail)
                                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition-colors">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-white rounded-lg border border-slate-200 p-1">
                                            @if($detail->paket->foto1)
                                                <img src="{{ asset('storage/' . $detail->paket->foto1) }}" 
                                                     alt="{{ $detail->paket->nama_paket }}"
                                                     class="w-full h-full object-cover rounded">
                                            @else
                                                <div class="w-full h-full bg-emerald-100 rounded flex items-center justify-center">
                                                    <i class="fas fa-utensils text-emerald-400"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-800">
                                                {{ $detail->paket->nama_paket }}
                                            </p>
                                            <div class="flex items-center gap-3 mt-1">
                                                <span class="text-sm text-slate-500">
                                                    {{ $detail->qty }} pax
                                                </span>
                                                <span class="text-xs text-slate-400">•</span>
                                                <span class="text-sm text-slate-500">
                                                    @ Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-slate-800 text-lg">
                                            Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl p-6 border border-emerald-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-slate-600">Total Pembayaran</p>
                                    <p class="text-xs text-slate-500">Sudah termasuk PPN 10%</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-3xl font-bold text-emerald-600">
                                        Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        @if($item->status_pesan == 'Menunggu Konfirmasi')
                            <div class="mt-6 flex gap-3">
                                <button class="px-5 py-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition-colors text-sm font-medium">
                                    <i class="fas fa-times mr-2"></i>
                                    Batalkan Pesanan
                                </button>
                                <a href="https://wa.me/6281234567890?text=Halo, saya ingin bertanya tentang pesanan No. Resi: {{ $item->no_resi }}" 
                                   target="_blank"
                                   class="px-5 py-2.5 bg-emerald-50 text-emerald-600 rounded-xl hover:bg-emerald-100 transition-colors text-sm font-medium">
                                    <i class="fab fa-whatsapp mr-2"></i>
                                    Tanya Status
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-3xl shadow-lg p-14 text-center">
                <div class="inline-block p-8 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-3xl mb-6 border border-emerald-100">
                    <i class="fas fa-shopping-cart text-emerald-400 text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-3">Belum ada pesanan</h3>
                <p class="text-slate-500 text-lg mb-8 max-w-md mx-auto">
                    Anda belum pernah melakukan pemesanan. Yuk, pesan paket catering pertama Anda!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('paket.index') }}"
                       class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-2xl
                              bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600
                              text-white font-bold shadow-lg hover:shadow-xl transition-all">
                        <i class="fas fa-utensils"></i>
                        Lihat Paket Catering
                    </a>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl
                              border border-emerald-500 text-emerald-600 hover:bg-emerald-50 transition-colors">
                        <i class="fas fa-home"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif

        <!-- Back to Home -->
        <div class="mt-16 text-center">
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-3 px-6 py-3 rounded-xl
                      bg-white border border-slate-200 text-slate-700 hover:bg-slate-50
                      transition-colors font-medium">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</section>
@endsection