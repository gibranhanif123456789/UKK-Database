<x-guest-layout>

    <div class="h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6">

            {{-- HEADER --}}
            <div class="text-center mb-6">
                <div class="text-3xl mb-1">🍱</div>
                <h1 class="text-xl font-extrabold text-slate-800">
                    Selamat Datang
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Login untuk melanjutkan pemesanan catering
                </p>
            </div>

            {{-- SESSION STATUS --}}
            <x-auth-session-status class="mb-4 text-sm text-emerald-600"
                                   :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

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
                        autofocus
                        class="w-full rounded-xl border-slate-300 focus:border-emerald-500
                               focus:ring-emerald-500"
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
                        required
                        placeholder="••••••••"
                        class="w-full rounded-xl border-slate-300 focus:border-emerald-500
                               focus:ring-emerald-500"
                    >
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                {{-- REMEMBER & LUPA PASSWORD --}}
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-slate-300 text-emerald-600
                                   focus:ring-emerald-500"
                        >
                        <span class="text-slate-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-emerald-600 hover:underline">
                            Lupa password?
                        </a>
                    @endif
                </div>

                {{-- BUTTON LOGIN --}}
                <button
                    type="submit"
                    class="w-full bg-emerald-500 hover:bg-emerald-600
                           text-slate-900 font-semibold py-2.5 rounded-xl transition">
                    Login
                </button>
            </form>

            {{-- REGISTER --}}
            <p class="text-center text-sm text-slate-500 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}"
                   class="font-semibold text-emerald-600 hover:underline">
                    Daftar sekarang
                </a>
            </p>

        </div>
    </div>

</x-guest-layout>
