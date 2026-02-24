<x-guest-layout>
    <div class="h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6">

            {{-- HEADER --}}
            <div class="text-center mb-6">
                <div class="text-3xl mb-1">🍱</div>
                <h1 class="text-xl font-extrabold text-slate-800">
                    Daftar Akun Pelanggan
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Buat akun untuk mulai memesan catering
                </p>
            </div>

            {{-- PERUBAHAN PENTING: ganti route dan tambahkan field --}}
            <form method="POST" action="{{ route('pelanggan.register.submit') }}" class="space-y-4">
                @csrf

                {{-- NAMA PELANGGAN --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Nama Pelanggan
                    </label>
                    <input
                        type="text"
                        name="nama_pelanggan"  {{-- PERUBAHAN: name menjadi nama_pelanggan --}}
                        value="{{ old('nama_pelanggan') }}"
                        placeholder="Nama lengkap"
                        required
                        autofocus
                        class="w-full rounded-xl border-slate-300
                               focus:border-emerald-500 focus:ring-emerald-500"
                    >
                    @error('nama_pelanggan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="email@contoh.com"
                        required
                        class="w-full rounded-xl border-slate-300
                               focus:border-emerald-500 focus:ring-emerald-500"
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TELEPON (FIELD BARU) --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Nomor Telepon
                    </label>
                    <input
                        type="text"
                        name="telepon"
                        value="{{ old('telepon') }}"
                        placeholder="08123456789"
                        required
                        class="w-full rounded-xl border-slate-300
                               focus:border-emerald-500 focus:ring-emerald-500"
                    >
                    @error('telepon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        required
                        class="w-full rounded-xl border-slate-300
                               focus:border-emerald-500 focus:ring-emerald-500"
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Konfirmasi Password
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                        class="w-full rounded-xl border-slate-300
                               focus:border-emerald-500 focus:ring-emerald-500"
                    >
                </div>

                {{-- BUTTON REGISTER --}}
                <button
                    type="submit"
                    class="w-full bg-emerald-500 hover:bg-emerald-600
                           text-slate-900 font-semibold py-2.5 rounded-xl transition">
                    Daftar sebagai Pelanggan
                </button>
            </form>

            {{-- LINK LOGIN --}}
            <p class="text-center text-sm text-slate-500 mt-6">
                Sudah punya akun pelanggan?
                <a href="{{ route('pelanggan.login') }}"
                   class="font-semibold text-emerald-600 hover:underline">
                    Login di sini
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>