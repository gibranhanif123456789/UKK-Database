@extends('layouts.user')

@section('title', 'Catering Harian & Acara')

@section('content')

<!-- ================= HERO SECTION ================= -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-32 w-96 h-96 bg-amber-400/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-teal-500/10 rounded-full blur-3xl -translate-x-1/2"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-32 lg:py-40">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <!-- Left Content -->
            <div class="text-white space-y-8">
                <!-- Badge -->
                <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20">
                    <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-crown text-white text-sm"></i>
                    </div>
                    <span class="font-semibold">Catering Premium #1</span>
                    <span class="text-slate-300">•</span>
                    <span class="text-slate-300 text-sm">⭐ 4.9/5 Rating</span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                    Makanan Enak,
                    <span class="text-emerald-400 block mt-2">Tanpa Repot Masak</span>
                </h1>

                <!-- Description -->
                <p class="text-lg text-slate-300 leading-relaxed max-w-2xl">
                    Solusi lengkap untuk kebutuhan catering harian, acara keluarga, hingga kebutuhan korporat. 
                    Bahan segar, chef berpengalaman, dan pengiriman tepat waktu.
                </p>

                <!-- Stats -->
                <div class="flex flex-wrap gap-8 pt-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-emerald-400">500+</div>
                        <div class="text-sm text-slate-300">Pelanggan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-emerald-400">1,000+</div>
                        <div class="text-sm text-slate-300">Pesanan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-emerald-400">4.9</div>
                        <div class="text-sm text-slate-300">Rating</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4 pt-8">
                    <a href="#paket"
                       class="group inline-flex items-center gap-3 px-8 py-4 rounded-2xl
                              bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600
                              text-white font-bold text-lg
                              shadow-2xl hover:shadow-emerald-500/25 hover:scale-105
                              transition-all duration-300">
                        <i class="fas fa-utensils"></i>
                        Lihat Paket Catering
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                    </a>

                    <a href="https://wa.me/6281234567890" target="_blank"
                       class="group inline-flex items-center gap-3 px-8 py-4 rounded-2xl
                              bg-white/10 backdrop-blur-sm border border-white/20
                              text-white hover:bg-white/20
                              transition-all duration-300">
                        <i class="fab fa-whatsapp"></i>
                        Konsultasi Gratis
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative">
                <!-- Floating Elements -->
                <div class="absolute -top-6 -left-6 z-10">
                    <div class="bg-gradient-to-r from-amber-500 to-amber-600 text-white px-5 py-3 rounded-2xl shadow-2xl">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-star"></i>
                            <div>
                                <div class="text-sm font-bold">Best Seller</div>
                                <div class="text-xs opacity-90">Paket Pernikahan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Image -->
                <div class="relative group">
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/30 to-amber-400/30 rounded-3xl blur-xl opacity-70 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Image Container -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img 
                            src="{{ asset('images/hero-food.jpg') }}" 
                            alt="Catering Premium"
                            class="w-full h-[500px] object-cover group-hover:scale-110 transition-transform duration-700"
                            loading="eager"
                        >
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    </div>
                </div>

                <!-- Floating Card -->
                <div class="absolute -bottom-6 -right-6 bg-white rounded-2xl p-5 shadow-2xl border border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-truck text-emerald-600 text-xl"></i>
                        </div>
                        <div>
                            <div class="font-bold text-slate-800">Gratis</div>
                            <div class="text-sm text-slate-500">Pengiriman</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= FEATURES SECTION ================= -->
<section class="py-28 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-medal text-white text-xl"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800">
                    Keunggulan Kami
                </h2>
            </div>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto">
                Mengapa ribuan pelanggan mempercayakan kebutuhan catering mereka kepada kami
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach ([
                ['fas fa-leaf', 'Bahan Premium', 'bg-emerald-500', 'Dari bahan segar pilihan, diproses dengan standar higienis tinggi untuk menjaga kualitas dan rasa.'],
                ['fas fa-clock', 'Tepat Waktu', 'bg-blue-500', 'Komitmen pengiriman sesuai jadwal, tidak pernah mengecewakan pelanggan.'],
                ['fas fa-money-bill-wave', 'Harga Terjangkau', 'bg-amber-500', 'Kualitas premium dengan harga yang masuk akal untuk semua kalangan.'],
                ['fas fa-user-chef', 'Chef Profesional', 'bg-purple-500', 'Ditangani oleh chef berpengalaman dengan resep spesial yang selalu disukai.'],
                ['fas fa-truck', 'Free Delivery', 'bg-teal-500', 'Gratis pengiriman untuk area tertentu dengan pelayanan terbaik.'],
                ['fas fa-headset', '24/7 Support', 'bg-indigo-500', 'Tim support siap membantu kapanpun Anda membutuhkan bantuan.']
            ] as $feature)
                <div class="group relative bg-white rounded-3xl p-8 shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                    <!-- Background Effect -->
                    <div class="absolute inset-0 bg-gradient-to-br {{ $feature[2] }}/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <div class="relative">
                        <!-- Icon -->
                        <div class="w-14 h-14 bg-gradient-to-r {{ $feature[2] }} {{ str_replace('bg-', 'to-', $feature[2]) }} rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                            <i class="{{ $feature[0] }} text-white text-xl"></i>
                        </div>
                        
                        <!-- Content -->
                        <h3 class="text-xl font-bold text-slate-800 mb-3">{{ $feature[1] }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $feature[3] }}</p>
                        
                        <!-- Hover Indicator -->
                        <div class="mt-6 pt-6 border-t border-slate-100 group-hover:border-transparent transition-colors">
                            <span class="inline-flex items-center text-sm font-medium text-slate-500 group-hover:text-emerald-600 transition-colors">
                                Pelajari lebih lanjut
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= PACKAGES SECTION ================= -->
<section id="paket" class="py-28 bg-gradient-to-b from-white to-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-gem text-white text-xl"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800">
                    Paket Unggulan
                </h2>
            </div>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto">
                Pilihan paket catering terbaik untuk berbagai kebutuhan
            </p>
        </div>

        @if($pakets->isNotEmpty())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($pakets->take(6) as $paket)
                    @php
                        $foto = $paket->foto1 ?? $paket->foto2 ?? $paket->foto3;
                        $badgeColor = match($paket->kategori) {
                            'Pernikahan' => 'bg-pink-500',
                            'Ulang Tahun' => 'bg-blue-500',
                            'Selamatan' => 'bg-purple-500',
                            default => 'bg-emerald-500'
                        };
                    @endphp

                    <!-- Package Card -->
                    <div class="group bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden">
                            @if($foto)
                                <img 
                                    src="{{ asset('storage/' . $foto) }}" 
                                    alt="{{ $paket->nama_paket }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                >
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center">
                                    <i class="fas fa-utensils text-emerald-300 text-5xl"></i>
                                </div>
                            @endif
                            
                            <!-- Badges -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                <span class="inline-flex items-center {{ $badgeColor }} text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg">
                                    {{ $paket->kategori }}
                                </span>
                                <span class="inline-flex items-center bg-white/90 backdrop-blur-sm text-slate-700 text-xs font-medium px-3 py-1.5 rounded-full">
                                    <i class="fas {{ $paket->jenis == 'Prasmanan' ? 'fa-users' : 'fa-box' }} mr-1.5"></i>
                                    {{ $paket->jenis }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-emerald-600 transition-colors line-clamp-2">
                                {{ $paket->nama_paket }}
                            </h3>
                            
                            <p class="text-slate-500 text-sm mb-6 leading-relaxed line-clamp-3">
                                {{ $paket->deskripsi }}
                            </p>

                            <!-- Info -->
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-slate-800">{{ $paket->jumlah_pax }}</div>
                                        <div class="text-xs text-slate-500">Pax</div>
                                    </div>
                                    <div class="h-8 w-px bg-slate-200"></div>
                                    <div class="text-center">
                                        <div class="text-lg font-bold text-emerald-600">
                                            Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}
                                        </div>
                                        <div class="text-xs text-slate-500">Paket</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action -->
                            <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                                <a href="{{ route('paket.show', $paket->id) }}"
                                   class="group/btn inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium">
                                    <span>Lihat Detail</span>
                                    <i class="fas fa-arrow-right group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                                
                                <a href="{{ route('paket.show', $paket->id) }}"
                                   class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm font-medium hover:shadow-lg transition-all">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-16">
                <a href="{{ route('paket.index') }}"
                   class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl
                          bg-gradient-to-r from-slate-800 to-slate-900 hover:from-slate-900 hover:to-slate-950
                          text-white font-bold text-lg
                          shadow-lg hover:shadow-xl transition-all duration-300">
                    <i class="fas fa-eye"></i>
                    Lihat Semua Paket
                </a>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-block p-10 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-3xl mb-8 border border-emerald-100">
                    <i class="fas fa-utensils text-emerald-400 text-6xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Paket Akan Segera Hadir</h3>
                <p class="text-slate-500 max-w-md mx-auto mb-8">
                    Kami sedang menyiapkan paket catering terbaik untuk Anda. Silakan hubungi kami untuk kebutuhan khusus.
                </p>
                <a href="https://wa.me/6281234567890" target="_blank"
                   class="inline-flex items-center gap-3 px-8 py-4 rounded-2xl
                          bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600
                          text-white font-bold shadow-lg hover:shadow-xl transition-all">
                    <i class="fab fa-whatsapp"></i>
                    Konsultasi via WhatsApp
                </a>
            </div>
        @endif
    </div>
</section>

<!-- ================= CTA SECTION ================= -->
<section class="py-20 bg-gradient-to-r from-emerald-600 to-teal-600">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6">
            <i class="fas fa-calendar-check text-white text-2xl"></i>
        </div>
        
        <h2 class="text-3xl font-bold text-white mb-4">Siap Pesan Paket Catering?</h2>
        <p class="text-emerald-100 text-lg mb-8 max-w-2xl mx-auto">
            Jangan ragu untuk menghubungi kami. Tim kami siap membantu Anda memilih paket yang tepat.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('paket.index') }}"
               class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-2xl
                      bg-white text-emerald-600 font-bold hover:bg-emerald-50 hover:shadow-xl transition-all duration-300">
                <i class="fas fa-utensils"></i>
                Lihat Semua Paket
            </a>
            <a href="https://wa.me/6281234567890" target="_blank"
               class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-2xl
                      border-2 border-white text-white font-bold hover:bg-white/10 transition-colors">
                <i class="fab fa-whatsapp"></i>
                Chat Sekarang
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
</style>

@endsection