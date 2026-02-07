@extends('layouts.user')

@section('title', $paket->nama_paket)

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900/30">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/10 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-teal-500/10 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-24 grid lg:grid-cols-2 gap-12 items-center">
        
        <!-- Left Content -->
        <div class="text-white space-y-8">
            <!-- Badge -->
            <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-utensils text-white text-sm"></i>
                </div>
                <span class="font-semibold text-emerald-300">
                    {{ $paket->kategori ?? 'Paket Spesial' }}
                </span>
                <span class="text-slate-300">•</span>
                <span class="text-slate-300 text-sm">{{ $paket->jenis }}</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                {{ $paket->nama_paket }}
                <span class="block text-emerald-400 mt-2">
                    Catering Premium
                </span>
            </h1>

            <!-- Description -->
            <p class="text-lg text-slate-300 leading-relaxed max-w-2xl">
                {{ $paket->deskripsi }}
            </p>

            <!-- Price -->
            <div class="space-y-2">
                <div class="flex items-end gap-4">
                    <span class="text-5xl md:text-6xl font-bold text-emerald-400">
                        Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}
                    </span>
                    <div class="mb-2">
                        <span class="text-slate-400 block">untuk</span>
                        <span class="text-2xl font-bold text-white">
                            {{ $paket->jumlah_pax }} Pax
                        </span>
                    </div>
                </div>
                <p class="text-slate-400 text-sm">
                    Harga sudah termasuk PPN 10% • Free konsultasi menu
                </p>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-4 pt-4">
                <a href="{{ route('user.pesan', $paket->id) }}"
                   class="group inline-flex items-center gap-3 px-8 py-4 rounded-2xl
                          bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600
                          text-white font-bold text-lg
                          shadow-2xl hover:shadow-emerald-500/25 hover:scale-105
                          transition-all duration-300">
                    <i class="fas fa-shopping-cart"></i>
                    Pesan Sekarang
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>

                <a href="{{ route('paket.index') }}"
                   class="group inline-flex items-center gap-2 px-8 py-4 rounded-2xl
                          bg-white/10 backdrop-blur-sm border border-white/20
                          text-white hover:bg-white/20
                          transition-all duration-300">
                    <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                    Lihat Paket Lain
                </a>
            </div>
        </div>

        <!-- Right Image -->
        @php
            $foto = $paket->foto1 ?? $paket->foto2 ?? $paket->foto3;
        @endphp
        
        <div class="relative">
            <!-- Floating Badges -->
            <div class="absolute -top-4 -left-4 z-10">
                <div class="bg-gradient-to-r from-amber-500 to-amber-600 text-white px-5 py-2.5 rounded-xl shadow-xl">
                    <div class="text-center">
                        <div class="text-xl font-bold">{{ $paket->jumlah_pax }}</div>
                        <div class="text-xs">Pax</div>
                    </div>
                </div>
            </div>
            
            <!-- Main Image -->
            <div class="relative group">
                <!-- Glow Effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/30 to-teal-500/30 rounded-3xl blur-xl opacity-70 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Image -->
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    @if($foto)
                        <img 
                            src="{{ asset('storage/' . $foto) }}" 
                            alt="{{ $paket->nama_paket }}"
                            class="w-full h-[500px] object-cover group-hover:scale-110 transition-transform duration-700"
                            loading="eager"
                        >
                    @else
                        <div class="w-full h-[500px] bg-gradient-to-br from-emerald-500/20 to-teal-500/20 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-utensils text-white/30 text-8xl mb-4"></i>
                                <p class="text-white/50 font-medium">Preview paket catering</p>
                            </div>
                        </div>
                    @endif
                    
                    <!-- Image Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                
                <!-- Thumbnail Gallery -->
                @if($paket->foto2 || $paket->foto3)
                    <div class="flex gap-3 mt-6 justify-center">
                        @foreach(['foto1', 'foto2', 'foto3'] as $fotoKey)
                            @if($paket->$fotoKey)
                                <div class="w-20 h-20 rounded-xl overflow-hidden border-2 border-white/20 cursor-pointer hover:border-emerald-400 transition-colors">
                                    <img 
                                        src="{{ asset('storage/' . $paket->$fotoKey) }}" 
                                        alt="Thumbnail {{ $loop->iteration }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- ================= DETAILS SECTION ================= -->
<section class="py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-info-circle text-white text-xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-slate-800">Detail Paket</h2>
            </div>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Informasi lengkap mengenai paket {{ $paket->nama_paket }} yang bisa Anda pesan
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Column - Description -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Description Card -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-slate-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 bg-gradient-to-r from-emerald-100 to-teal-100 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-file-alt text-emerald-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-800">Deskripsi Lengkap</h3>
                            <p class="text-slate-500">Tentang paket catering ini</p>
                        </div>
                    </div>
                    
                    <div class="prose prose-lg max-w-none text-slate-700">
                        <p class="leading-relaxed">
                            {{ $paket->deskripsi }}
                        </p>
                        
                        <!-- Additional Info -->
                        <div class="mt-8 grid sm:grid-cols-2 gap-6">
                            <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-xl">
                                <i class="fas fa-check-circle text-emerald-500 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-1">Bahan Berkualitas</h4>
                                    <p class="text-slate-600 text-sm">Menggunakan bahan pilihan segar setiap hari</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-4 bg-slate-50 rounded-xl">
                                <i class="fas fa-check-circle text-emerald-500 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-slate-800 mb-1">Hygienis</h4>
                                    <p class="text-slate-600 text-sm">Proses masak dengan standar kebersihan tinggi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-3xl shadow-lg p-8 border border-emerald-100">
                    <h3 class="text-2xl font-bold text-slate-800 mb-6">Keunggulan Paket</h3>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-truck text-emerald-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">Gratis Pengiriman</h4>
                                <p class="text-slate-600 text-sm">Area Jabodetabek</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm">
                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-emerald-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">Tepat Waktu</h4>
                                <p class="text-slate-600 text-sm">Pengiriman sesuai jadwal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Order Info -->
            <div class="space-y-8">
                <!-- Order Info Card -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 text-white rounded-3xl shadow-2xl p-8">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-shopping-bag text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Informasi Pesanan</h3>
                            <p class="text-slate-300 text-sm">Detail lengkap paket</p>
                        </div>
                    </div>

                    <!-- Info List -->
                    <div class="space-y-6">
                        <div class="flex justify-between items-center pb-4 border-b border-slate-700">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-emerald-400"></i>
                                </div>
                                <span class="text-slate-300">Jadwal Pengiriman</span>
                            </div>
                            <span class="font-bold">Setiap Hari</span>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-slate-700">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-emerald-400"></i>
                                </div>
                                <span class="text-slate-300">Minimal Order</span>
                            </div>
                            <span class="font-bold">{{ $paket->jumlah_pax }} Pax</span>
                        </div>

                        <div class="flex justify-between items-center pb-4 border-b border-slate-700">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-check-circle text-emerald-400"></i>
                                </div>
                                <span class="text-slate-300">Ketersediaan</span>
                            </div>
                            <span class="font-bold text-emerald-400">Tersedia</span>
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tag text-emerald-400"></i>
                                </div>
                                <span class="text-slate-300">Jenis Paket</span>
                            </div>
                            <span class="font-bold">{{ $paket->jenis }}</span>
                        </div>
                    </div>

                    <!-- Price Summary -->
                    <div class="mt-8 p-6 bg-gradient-to-r from-emerald-900/30 to-teal-900/30 rounded-2xl">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-slate-300">Harga {{ $paket->jumlah_pax }} Pax</span>
                            <span class="text-2xl font-bold">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-400">Termasuk PPN 10%</span>
                            <span class="text-emerald-400">Free Konsultasi</span>
                        </div>
                    </div>

                    <!-- Order Button -->
                    <a href="{{ route('user.pesan', $paket->id) }}"
                       class="mt-8 w-full inline-flex items-center justify-center gap-3
                              bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600
                              text-white font-bold text-lg py-4 rounded-2xl
                              shadow-lg hover:shadow-xl hover:scale-105
                              transition-all duration-300">
                        <i class="fas fa-shopping-cart"></i>
                        Pesan Paket Ini
                    </a>

                    <!-- Contact Info -->
                    <div class="mt-6 text-center">
                        <p class="text-slate-400 text-sm">
                            Ada pertanyaan? 
                            <a href="https://wa.me/6281234567890" target="_blank" 
                               class="text-emerald-400 hover:text-emerald-300 font-medium">
                                Chat kami via WhatsApp
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Quick Contact -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">
                    <h4 class="font-bold text-slate-800 mb-4">Butuh Bantuan?</h4>
                    <div class="space-y-3">
                        <a href="https://wa.me/6281234567890" target="_blank"
                           class="flex items-center gap-3 p-3 bg-emerald-50 text-emerald-700 rounded-xl hover:bg-emerald-100 transition-colors">
                            <i class="fab fa-whatsapp text-lg"></i>
                            <span class="font-medium">WhatsApp Admin</span>
                        </a>
                        <a href="tel:081234567890"
                           class="flex items-center gap-3 p-3 bg-blue-50 text-blue-700 rounded-xl hover:bg-blue-100 transition-colors">
                            <i class="fas fa-phone-alt"></i>
                            <span class="font-medium">Telepon Kami</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- 
<!-- ================= RELATED PACKAGES ================= -->
@if($relatedPakets->isNotEmpty())
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-800 mb-3">Paket Lainnya</h2>
            <p class="text-slate-600">Temukan paket catering lain yang mungkin Anda sukai</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($relatedPakets as $related)
                @php
                    $foto = $related->foto1 ?? $related->foto2 ?? $related->foto3;
                @endphp
                
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                    <div class="h-48 overflow-hidden">
                        @if($foto)
                            <img src="{{ asset('storage/' . $foto) }}" 
                                 alt="{{ $related->nama_paket }}"
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center">
                                <i class="fas fa-utensils text-emerald-300 text-4xl"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-5">
                        <h3 class="font-bold text-slate-800 mb-2">{{ $related->nama_paket }}</h3>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm text-slate-500">{{ $related->jenis }}</span>
                            <span class="text-sm font-bold text-emerald-600">{{ $related->jumlah_pax }} Pax</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-slate-800">
                                Rp {{ number_format($related->harga_paket, 0, ',', '.') }}
                            </span>
                            <a href="{{ route('paket.show', $related->id) }}"
                               class="text-sm font-medium text-emerald-600 hover:text-emerald-700">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif --}}

<style>
.prose {
    color: inherit;
}
.prose p {
    margin-top: 0;
    margin-bottom: 1em;
}
</style>

@endsection