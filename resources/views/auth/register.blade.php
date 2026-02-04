<x-guest-layout>

    <div class="h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6">

            {{-- HEADER --}}
            <div class="text-center mb-6">
                <div class="text-3xl mb-1">🍱</div>
                <h1 class="text-xl font-extrabold text-slate-800">
                    Daftar Akun
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Buat akun untuk mulai memesan catering
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                {{-- NAMA --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Nama
                    </label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Nama lengkap"
                        required
                        autofocus
                        class="w-full rounded-xl border-slate-300
                               focus:border-emerald-500 focus:ring-emerald-500"
                    >
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
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
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
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
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
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
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                {{-- BUTTON REGISTER --}}
                <button
                    type="submit"
                    class="w-full bg-emerald-500 hover:bg-emerald-600
                           text-slate-900 font-semibold py-2.5 rounded-xl transition">
                    Daftar
                </button>
            </form>

            {{-- LINK LOGIN --}}
            <p class="text-center text-sm text-slate-500 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                   class="font-semibold text-emerald-600 hover:underline">
                    Login di sini
                </a>
            </p>

        </div>
    </div>

</x-guest-layout>
