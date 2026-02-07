@extends('layouts.user')

@section('title', 'Pesanan Berhasil')

@section('content')
<section class="py-32 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-2xl mx-auto">
        <!-- Success Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-500 to-teal-500 p-8 text-center text-white">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full mb-6">
                    <i class="fas fa-check-circle text-white text-4xl"></i>
                </div>
                <h1 class="text-3xl font-bold mb-3">Pesanan Berhasil 🎉</h1>
                <p class="text-emerald-100 text-lg">
                    Terima kasih telah memesan di CateringKu!
                </p>
            </div>

            <!-- Content -->
            <div class="p-8">
                <!-- Order Info -->
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-receipt text-emerald-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">Detail Pesanan</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500 mb-1">No. Resi</p>
                            <p class="font-bold text-lg text-slate-800 font-mono">
                                {{ $pemesanan->no_resi }}
                            </p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500 mb-1">Tanggal Pesan</p>
                            <p class="font-bold text-slate-800">
                                {{ $pemesanan->tgl_pesan->format('d M Y, H:i') }}
                            </p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500 mb-1">Status</p>
                            <span class="inline-flex items-center gap-2 px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium">
                                <i class="fas fa-clock"></i>
                                {{ $pemesanan->status_pesan }}
                            </span>
                        </div>
                        <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-4 border border-emerald-100">
                            <p class="text-sm text-emerald-600 mb-1">Total Bayar</p>
                            <p class="text-2xl font-bold text-emerald-600">
                                Rp {{ number_format($pemesanan->total_bayar, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-list-check text-blue-600"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">Langkah Selanjutnya</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mt-1">
                                <span class="text-white text-xs font-bold">1</span>
                            </div>
                            <div>
                                <p class="font-medium text-slate-700">Konfirmasi Pembayaran</p>
                                <p class="text-sm text-slate-600">Admin akan menghubungi Anda untuk konfirmasi pembayaran</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mt-1">
                                <span class="text-white text-xs font-bold">2</span>
                            </div>
                            <div>
                                <p class="font-medium text-slate-700">Proses Pesanan</p>
                                <p class="text-sm text-slate-600">Pesanan akan diproses setelah pembayaran dikonfirmasi</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mt-1">
                                <span class="text-white text-xs font-bold">3</span>
                            </div>
                            <div>
                                <p class="font-medium text-slate-700">Pengiriman</p>
                                <p class="text-sm text-slate-600">Pesanan akan dikirim sesuai jadwal yang disepakati</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <a href="{{ route('user.pesanan.riwayat') }}"
                       class="block w-full text-center py-4 px-6 rounded-xl
                              bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600
                              text-white font-bold text-lg
                              shadow-lg hover:shadow-xl transition-all duration-300">
                        <i class="fas fa-history mr-3"></i>
                        Lihat Riwayat Pesanan
                    </a>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('paket.index') }}"
                           class="flex items-center justify-center gap-3 py-3.5 px-6 rounded-xl
                                  bg-white border border-slate-200 text-slate-700 hover:bg-slate-50
                                  transition-colors font-medium">
                            <i class="fas fa-utensils"></i>
                            Pesan Paket Lain
                        </a>
                        <a href="https://wa.me/6281234567890?text=Halo, saya baru pesan dengan no. resi: {{ $pemesanan->no_resi }}" 
                           target="_blank"
                           class="flex items-center justify-center gap-3 py-3.5 px-6 rounded-xl
                                  bg-emerald-50 text-emerald-600 hover:bg-emerald-100
                                  transition-colors font-medium">
                            <i class="fab fa-whatsapp"></i>
                            Tanya Admin
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="mt-8 pt-8 border-t border-slate-100 text-center">
                    <p class="text-slate-500 mb-2">Butuh bantuan segera?</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="tel:081234567890"
                           class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                            <i class="fas fa-phone-alt"></i>
                            0812-3456-7890
                        </a>
                        <span class="hidden sm:inline text-slate-300">•</span>
                        <a href="mailto:info@cateringku.com"
                           class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                            <i class="fas fa-envelope"></i>
                            info@cateringku.com
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tips -->
        <div class="mt-8 bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-6 border border-amber-100">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-lightbulb text-amber-600"></i>
                </div>
                <h3 class="font-bold text-slate-800">Tips untuk Anda</h3>
            </div>
            <p class="text-slate-600">
                Simpan screenshot halaman ini atau catat nomor resi Anda untuk keperluan tracking pesanan.
                Admin akan menghubungi Anda dalam 1x24 jam untuk konfirmasi pembayaran.
            </p>
        </div>
    </div>
</section>
@endsection