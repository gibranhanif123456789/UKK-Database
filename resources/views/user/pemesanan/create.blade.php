@extends('layouts.user')

@section('title', 'Konfirmasi Pesanan')

@section('content')
<section class="py-24 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Progress Steps -->
        <div class="mb-12">
            <div class="flex items-center justify-center">
                <!-- Step 1 -->
                <div class="flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center shadow-lg">
                        <i class="fas fa-check text-white text-lg"></i>
                    </div>
                    <span class="mt-2 text-sm font-medium text-emerald-600">Pilih Paket</span>
                </div>
                
                <!-- Step Line -->
                <div class="w-32 h-1 bg-gradient-to-r from-emerald-500 to-emerald-300 mx-4"></div>
                
                <!-- Step 2 -->
                <div class="flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold">2</span>
                    </div>
                    <span class="mt-2 text-sm font-medium text-emerald-600">Konfirmasi</span>
                </div>
                
                <!-- Step Line -->
                <div class="w-32 h-1 bg-slate-200 mx-4"></div>
                
                <!-- Step 3 -->
                <div class="flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center">
                        <span class="text-slate-400 font-bold">3</span>
                    </div>
                    <span class="mt-2 text-sm font-medium text-slate-400">Pembayaran</span>
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="mb-12 text-center">
            <div class="inline-flex items-center gap-3 mb-4">
                <div class="w-14 h-14 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-shopping-cart text-white text-xl"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800">
                    Konfirmasi Pesanan
                </h1>
            </div>
            <p class="text-slate-600 max-w-2xl mx-auto text-lg">
                Pastikan detail pesanan dan informasi pengiriman sudah benar sebelum melanjutkan
            </p>
        </div>

        <div class="grid lg:grid-cols-5 gap-8 items-start">

            <!-- ===================== -->
            <!-- ORDER SUMMARY -->
            <!-- ===================== -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Package Card -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-slate-100 sticky top-28">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-slate-800">
                            Ringkasan Paket
                        </h2>
                        <div class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm font-medium">
                            {{ $paket->kategori }}
                        </div>
                    </div>

                    <!-- Package Info -->
                    <div class="space-y-6">
                        <!-- Package Header -->
                        <div class="flex items-start gap-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-utensils text-emerald-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-slate-800 mb-1">
                                    {{ $paket->nama_paket }}
                                </h3>
                                <p class="text-sm text-slate-500">
                                    {{ $paket->jenis }} • {{ $paket->jumlah_pax }} Pax
                                </p>
                                <div class="flex items-center gap-2 mt-2">
                                    <i class="fas fa-star text-amber-400 text-sm"></i>
                                    <span class="text-xs text-slate-500">4.9/5 rating</span>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="bg-slate-50 rounded-2xl p-4">
                            <p class="text-sm text-slate-600 leading-relaxed">
                                {{ Str::limit($paket->deskripsi, 120) }}
                            </p>
                        </div>

                        <!-- Price Details -->
                        <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl p-5 border border-emerald-100">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <p class="text-sm font-medium text-emerald-700">Harga per {{ $paket->jumlah_pax }} Pax</p>
                                    <p class="text-xs text-slate-500">Termasuk PPN 10%</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-emerald-600">
                                        Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}
                                    </p>
                                    <p class="text-xs text-slate-500 mt-1">Harga dasar</p>
                                </div>
                            </div>
                            <div class="mt-3 pt-3 border-t border-emerald-100">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-600">Free delivery*</span>
                                    <span class="font-medium text-emerald-600">Gratis</span>
                                </div>
                            </div>
                        </div>

                        <!-- Estimated Delivery -->
                        <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-2xl border border-blue-100">
                            <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-truck text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700">Estimasi Pengiriman</p>
                                <p class="text-xs text-blue-600">1-2 jam setelah konfirmasi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Support -->
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-headset text-white"></i>
                        </div>
                        <h3 class="font-bold text-slate-800">Butuh Bantuan?</h3>
                    </div>
                    <p class="text-sm text-slate-600 mb-4">
                        Hubungi customer service kami untuk bantuan pemesanan
                    </p>
                    <div class="space-y-3">
                        <a href="https://wa.me/6281234567890" target="_blank"
                           class="flex items-center justify-center gap-2 p-3 bg-emerald-50 text-emerald-700 rounded-xl hover:bg-emerald-100 transition-colors">
                            <i class="fab fa-whatsapp text-lg"></i>
                            <span class="font-medium">Chat WhatsApp</span>
                        </a>
                        <a href="tel:081234567890"
                           class="flex items-center justify-center gap-2 p-3 bg-blue-50 text-blue-700 rounded-xl hover:bg-blue-100 transition-colors">
                            <i class="fas fa-phone-alt"></i>
                            <span class="font-medium">Telepon Sekarang</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- ===================== -->
            <!-- ORDER FORM -->
            <!-- ===================== -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-3xl shadow-2xl p-10 border border-slate-100">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-user-edit text-white text-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-slate-800">
                                Formulir Pemesanan
                            </h2>
                            <p class="text-slate-500 text-sm">
                                Lengkapi data di bawah ini
                            </p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('user.pesan.store') }}" class="space-y-8" id="orderForm">
                        @csrf
                        <input type="hidden" name="id_paket" value="{{ $paket->id }}">

                        <!-- Customer Info -->
                        <div class="bg-gradient-to-r from-slate-50 to-slate-100 rounded-2xl p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user text-emerald-600"></i>
                                </div>
                                <h3 class="font-bold text-slate-800">Data Pelanggan</h3>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        Nama Lengkap
                                    </label>
                                    <input type="text" 
                                           value="{{ $pelanggan->nama_pelanggan }}"
                                           class="w-full rounded-xl border border-slate-200 px-4 py-3 bg-slate-50 text-slate-600"
                                           readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">
                                        No. Telepon
                                    </label>
                                    <input type="text" 
                                           value="{{ $pelanggan->no_hp }}"
                                           class="w-full rounded-xl border border-slate-200 px-4 py-3 bg-slate-50 text-slate-600"
                                           readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                <i class="fas fa-hashtag text-emerald-500 mr-2"></i>
                                Jumlah Pesanan (Pax)
                            </label>
                            <div class="relative">
                                <input
                                    type="number"
                                    name="qty"
                                    id="qtyInput"
                                    min="1"
                                    value="1"
                                    class="w-full rounded-xl border-2 border-slate-200 px-4 py-4
                                           focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20
                                           transition-all duration-200 text-lg font-semibold text-center"
                                    required
                                >
                                <div class="absolute right-4 top-1/2 -translate-y-1/2">
                                    <span class="text-slate-500 font-medium">Orang</span>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 mt-2">
                                Minimum {{ $paket->jumlah_pax }} pax per pesanan
                            </p>
                        </div>

                        <!-- Delivery Address -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                <i class="fas fa-map-marker-alt text-emerald-500 mr-2"></i>
                                Alamat Pengiriman
                            </label>
                            <textarea
                                name="alamat"
                                rows="4"
                                class="w-full rounded-xl border-2 border-slate-200 px-4 py-4
                                       focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20
                                       transition-all duration-200 resize-none"
                                placeholder="Masukkan alamat lengkap untuk pengiriman..."
                                required
                            >{{ $pelanggan->alamat1 }}</textarea>
                            <div class="flex items-start gap-2 text-sm text-slate-500">
                                <i class="fas fa-info-circle text-emerald-500 mt-0.5"></i>
                                <p>Pastikan alamat akurat untuk ketepatan pengiriman</p>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                <i class="fas fa-credit-card text-emerald-500 mr-2"></i>
                                Metode Pembayaran
                            </label>
                            <div class="relative">
                                <select
                                    name="id_jenis_bayar"
                                    id="paymentMethod"
                                    class="w-full appearance-none rounded-xl border-2 border-slate-200 px-4 py-4 pr-12
                                           bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20
                                           transition-all duration-200 cursor-pointer"
                                    required
                                >
                                    <option value="" disabled selected>Pilih metode pembayaran</option>
                                    @foreach ($jenisPembayaran as $jp)
                                        <option value="{{ $jp->id }}" data-logo="{{ $jp->logo }}">
                                            {{ $jp->metode_pembayaran }} - {{ $jp->tempat_bayar }}
                                        </option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                            
                            <!-- Payment Info -->
                            <div id="paymentInfo" class="hidden mt-4 bg-slate-50 rounded-xl p-4 border border-slate-200">
                                <div class="flex items-center gap-3">
                                    <div id="paymentLogo" class="w-12 h-12 bg-white rounded-lg border border-slate-200 p-2">
                                        <i class="fas fa-credit-card text-slate-400 text-lg"></i>
                                    </div>
                                    <div>
                                        <p id="paymentName" class="font-medium text-slate-700"></p>
                                        <p id="paymentAccount" class="text-sm text-slate-500"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200">
                            <h3 class="font-bold text-slate-800 mb-4">Ringkasan Pesanan</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-slate-600">Harga per {{ $paket->jumlah_pax }} pax</span>
                                    <span class="font-medium">Rp {{ number_format($paket->harga_paket, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-slate-600">Jumlah pesanan</span>
                                    <span id="qtyDisplay" class="font-medium">1 pax</span>
                                </div>
                                <div class="flex justify-between items-center border-t border-slate-200 pt-3">
                                    <span class="text-slate-600">Subtotal</span>
                                    <span class="text-lg font-bold text-slate-800">
                                        Rp <span id="subtotalDisplay">{{ number_format($paket->harga_paket, 0, ',', '.') }}</span>
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-slate-600">PPN 10%</span>
                                    <span id="taxDisplay" class="font-medium text-emerald-600">
                                        Rp {{ number_format($paket->harga_paket * 0.1, 0, ',', '.') }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center border-t border-slate-300 pt-4">
                                    <span class="text-lg font-bold text-slate-800">Total Bayar</span>
                                    <span class="text-2xl font-bold text-emerald-600">
                                        Rp <span id="totalDisplay">{{ number_format($paket->harga_paket * 1.1, 0, ',', '.') }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-slate-200">
                                <div class="flex items-center gap-2 text-sm text-slate-500">
                                    <i class="fas fa-info-circle"></i>
                                    <p>Harga sudah termasuk PPN 10% dan biaya pengiriman</p>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full
                                   bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600
                                   text-white font-bold text-lg tracking-wide
                                   py-5 px-8 rounded-2xl
                                   shadow-xl hover:shadow-2xl
                                   transition-all duration-300
                                   flex items-center justify-center gap-3
                                   active:scale-95 group">
                            
                            <i class="fas fa-lock"></i>
                            <span>Konfirmasi & Lanjutkan Pembayaran</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                        </button>

                        <!-- Terms -->
                        <div class="text-center">
                            <p class="text-xs text-slate-500">
                                Dengan menekan tombol di atas, Anda menyetujui
                                <a href="#" class="text-emerald-600 hover:text-emerald-700 font-medium">
                                    Syarat & Ketentuan
                                </a>
                                kami
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const qtyInput = document.getElementById('qtyInput');
    const basePrice = {{ $paket->harga_paket }};
    const taxRate = 0.1; // 10%
    
    function calculateTotal() {
        const qty = parseInt(qtyInput.value) || 1;
        const subtotal = basePrice * qty;
        const tax = subtotal * taxRate;
        const total = subtotal + tax;
        
        // Update displays
        document.getElementById('qtyDisplay').textContent = qty + ' pax';
        document.getElementById('subtotalDisplay').textContent = subtotal.toLocaleString('id-ID');
        document.getElementById('taxDisplay').textContent = 'Rp ' + Math.round(tax).toLocaleString('id-ID');
        document.getElementById('totalDisplay').textContent = Math.round(total).toLocaleString('id-ID');
    }
    
    // Calculate on input change
    qtyInput.addEventListener('input', calculateTotal);
    
    // Payment method selection
    const paymentMethod = document.getElementById('paymentMethod');
    const paymentInfo = document.getElementById('paymentInfo');
    const paymentLogo = document.getElementById('paymentLogo');
    const paymentName = document.getElementById('paymentName');
    const paymentAccount = document.getElementById('paymentAccount');
    
    paymentMethod.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const logo = selectedOption.dataset.logo;
        
        if (logo) {
            paymentLogo.innerHTML = `<img src="{{ asset('storage/') }}/${logo}" alt="Logo" class="w-full h-full object-contain">`;
        } else {
            paymentLogo.innerHTML = '<i class="fas fa-credit-card text-slate-400 text-lg"></i>';
        }
        
        paymentName.textContent = selectedOption.text.split(' - ')[0];
        paymentAccount.textContent = selectedOption.text.split(' - ')[1] || '';
        paymentInfo.classList.remove('hidden');
    });
    
    // Initial calculation
    calculateTotal();
});
</script>

<style>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    opacity: 1;
    height: 40px;
}

.sticky {
    position: sticky;
}
</style>

@endsection