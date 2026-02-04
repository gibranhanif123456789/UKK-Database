<x-guest-layout>

    <div class="h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6">

            {{-- HEADER --}}
            <div class="text-center mb-6">
                <div class="text-3xl mb-1">🔑</div>
                <h1 class="text-xl font-extrabold text-slate-800">
                    Lupa Password
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Masukkan email untuk reset password akunmu
                </p>
            </div>

            {{-- STATUS --}}
            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
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
                        class="w-full rounded-xl border-slate-300
                               focus:border-emerald-500 focus:ring-emerald-500"
                    >
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="w-full bg-emerald-500 hover:bg-emerald-600
                           text-slate-900 font-semibold py-2.5 rounded-xl transition">
                    Kirim Link Reset Password
                </button>
            </form>

            {{-- BACK TO LOGIN --}}
            <p class="text-center text-sm text-slate-500 mt-6">
                Ingat password?
                <a href="{{ route('login') }}"
                   class="font-semibold text-emerald-600 hover:underline">
                    Kembali ke Login
                </a>
            </p>

        </div>
    </div>

</x-guest-layout>
