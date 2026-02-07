@extends('layouts.user')

@section('title', 'Paket Catering')

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="relative bg-gradient-to-br from-emerald-50 via-white to-slate-50 pt-24 pb-20 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-64 h-64 bg-emerald-200 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-300 rounded-full translate-x-1/3 translate-y-1/3"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <!-- Icon Badge -->
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl mb-6 shadow-lg">
                <i class="fas fa-utensils text-white text-2xl"></i>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold text-slate-800 mb-4 leading-tight">
                Paket Catering <span class="text-emerald-600">Premium</span>
            </h1>
            
            <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto">
                Temukan paket catering terbaik untuk setiap momen spesial. 
                Dari acara keluarga hingga kebutuhan korporat.
            </p>

            <!-- Stats -->
            <div class="flex flex-wrap justify-center gap-8 mb-10">
                <div class="text-center">
                    <div class="text-2xl font-bold text-emerald-600">{{ $pakets->count() }}</div>
                    <div class="text-sm text-slate-500">Paket Tersedia</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-emerald-600">5</div>
                    <div class="text-sm text-slate-500">Kategori</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-emerald-600">⭐ 4.9</div>
                    <div class="text-sm text-slate-500">Rating</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= FILTER SECTION ================= -->
<section class="bg-white border-b border-slate-100 py-6 shadow-sm">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Search -->
            <div class="relative flex-1 max-w-md">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-400"></i>
                <input 
                    type="text" 
                    placeholder="Cari paket catering..." 
                    class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200"
                >
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap gap-2">
                <button class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-medium shadow-md">
                    Semua
                </button>
                <button class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors">
                    Prasmanan
                </button>
                <button class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors">
                    Box
                </button>
                <button class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ================= PACKAGE LIST ================= -->
<section class="bg-gradient-to-b from-slate-50 to-white py-16">
    <div class="max-w-7xl mx-auto px-6">
        @if($pakets->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($pakets as $paket)
                    @php
                        $foto = $paket->foto1 ?? $paket->foto2 ?? $paket->foto3;
                        $badgeColor = match($paket->kategori) {
                            'Pernikahan' => 'bg-pink-500',
                            'Ulang Tahun' => 'bg-blue-500',
                            'Selamatan' => 'bg-purple-500',
                            'Rapat' => 'bg-indigo-500',
                            'Studi Tour' => 'bg-amber-500',
                            default => 'bg-emerald-500'
                        };
                    @endphp

                    <!-- Package Card -->
                    <div class="group bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 hover:border-emerald-200 hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            @if($foto)
                                <img
                                    src="{{ asset('storage/' . $foto) }}"
                                    alt="{{ $paket->nama_paket }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-emerald-50 flex items-center justify-center">
                                    <i class="fas fa-utensils text-emerald-300 text-5xl"></i>
                                </div>
                            @endif

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                <span class="inline-flex items-center {{ $badgeColor }} text-white text-xs font-semibold px-4 py-2 rounded-full shadow-lg">
                                    {{ $paket->kategori ?? 'Paket' }}
                                </span>
                                <span class="inline-flex items-center bg-white/90 backdrop-blur-sm text-slate-700 text-xs font-medium px-3 py-1.5 rounded-full">
                                    <i class="fas {{ $paket->jenis == 'Prasmanan' ? 'fa-users' : 'fa-box' }} mr-1.5"></i>
                                    {{ $paket->jenis }}
                                </span>
                            </div>

                            <!-- Pax Badge -->
                            <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-sm rounded-xl px-3 py-2 shadow">
                                <div class="text-center">
                                    <div class="font-bold text-slate-800">{{ $paket->jumlah_pax }}</div>
                                    <div class="text-xs text-slate-500">Pax</div>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Title -->
                            <h2 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-emerald-600 transition-colors line-clamp-2">
                                {{ $paket->nama_paket }}
                            </h2>

                            <!-- Description -->
                            <p class="text-slate-500 text-sm mb-6 leading-relaxed line-clamp-3">
                                {{ $paket->deskripsi }}
                            </p>

                            <!-- Price & Action -->
                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                <div>
                                    <div class="text-2xl font-bold text-emerald-600">
                                        Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}
                                    </div>
                                    <div class="text-xs text-slate-500 mt-1">
                                        {{ $paket->jumlah_pax }} pax • {{ $paket->jenis }}
                                    </div>
                                </div>

                                <a href="{{ route('paket.show', $paket->id) }}"
                                   class="group/btn inline-flex items-center gap-2 px-5 py-2.5 rounded-xl
                                          bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700
                                          text-white font-semibold
                                          shadow-md hover:shadow-lg
                                          transition-all duration-300">
                                    <span>Detail</span>
                                    <i class="fas fa-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            </div>

                            <!-- Features -->
                            <div class="mt-5 flex flex-wrap gap-2">
                                <span class="inline-flex items-center text-xs text-slate-600 bg-slate-100 px-3 py-1 rounded-full">
                                    <i class="fas fa-check text-emerald-500 mr-1.5 text-xs"></i>
                                    Bahan Segar
                                </span>
                                <span class="inline-flex items-center text-xs text-slate-600 bg-slate-100 px-3 py-1 rounded-full">
                                    <i class="fas fa-check text-emerald-500 mr-1.5 text-xs"></i>
                                    Gratis Konsultasi
                                </span>
                                <span class="inline-flex items-center text-xs text-slate-600 bg-slate-100 px-3 py-1 rounded-full">
                                    <i class="fas fa-check text-emerald-500 mr-1.5 text-xs"></i>
                                    Free Delivery*
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State (Fallback) -->
            @if($pakets->count() == 0)
                <div class="text-center py-16">
                    <div class="inline-block p-8 bg-slate-100 rounded-3xl mb-6">
                        <i class="fas fa-utensils text-slate-400 text-5xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-700 mb-3">Belum ada paket catering</h3>
                    <p class="text-slate-500 max-w-md mx-auto mb-8">
                        Paket catering akan segera tersedia. Silakan hubungi admin untuk informasi lebih lanjut.
                    </p>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold hover:shadow-lg transition-all">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-block p-10 bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-3xl mb-8 border border-emerald-200">
                    <i class="fas fa-search text-emerald-400 text-6xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-slate-800 mb-4">Belum ada paket catering</h3>
                <p class="text-slate-500 text-lg max-w-md mx-auto mb-10">
                    Saat ini belum ada paket catering yang tersedia. Silakan cek kembali nanti atau hubungi kami untuk kebutuhan khusus.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold hover:shadow-lg transition-all">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                    <a href="#contact"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-emerald-500 text-emerald-600 font-semibold hover:bg-emerald-50 transition-colors">
                        <i class="fas fa-phone-alt mr-2"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        @endif

        <!-- Pagination -->
        {{-- @if($pakets->hasPages())
            <div class="mt-16 flex justify-center">
                <div class="inline-flex items-center gap-2 bg-white rounded-2xl shadow-lg px-6 py-3">
                    <button class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center hover:bg-emerald-200 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <span class="px-4 text-slate-700">Halaman 1 dari 3</span>
                    <button class="w-10 h-10 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white flex items-center justify-center hover:shadow-md transition-all">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        @endif --}}
    </div>
</section>

<!-- ================= CTA SECTION ================= -->
<section class="bg-gradient-to-r from-emerald-600 to-emerald-700 py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6">
            <i class="fas fa-calendar-check text-white text-2xl"></i>
        </div>
        <h2 class="text-3xl font-bold text-white mb-4">Butuh Paket Khusus?</h2>
        <p class="text-emerald-100 text-lg mb-8 max-w-2xl mx-auto">
            Kami siap membuatkan paket catering custom sesuai kebutuhan acara Anda. Konsultasi gratis!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6281234567890" target="_blank"
               class="inline-flex items-center justify-center px-8 py-3 rounded-xl bg-white text-emerald-600 font-bold hover:bg-emerald-50 hover:shadow-xl transition-all duration-300">
                <i class="fab fa-whatsapp mr-3 text-lg"></i>
                Konsultasi via WhatsApp
            </a>
            <a href="tel:081234567890"
               class="inline-flex items-center justify-center px-8 py-3 rounded-xl border-2 border-white text-white font-bold hover:bg-white/10 transition-colors">
                <i class="fas fa-phone-alt mr-3"></i>
                Telepon Sekarang
            </a>
        </div>
    </div>
</section>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.6s ease-out;
}
</style>

@endsection