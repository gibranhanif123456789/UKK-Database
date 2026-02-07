@extends('layouts.owner')

@section('title', 'Tambah User')

@section('content')
<div class="max-w-xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-user-plus text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Tambah User
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Tambahkan user baru untuk sistem
                </p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
        <form method="POST" action="{{ route('owner.users.store') }}" class="space-y-6">
            @csrf

            <!-- Nama -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    <i class="fas fa-user mr-2 text-amber-500"></i>
                    Nama Lengkap
                </label>
                <input type="text" 
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                              focus:ring-2 focus:ring-amber-500 focus:border-amber-500
                              transition-all duration-200 bg-white
                              placeholder:text-slate-400"
                       placeholder="Masukkan nama lengkap"
                       required>
                @error('name')
                    <p class="text-sm text-red-500 mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    <i class="fas fa-envelope mr-2 text-amber-500"></i>
                    Email
                </label>
                <input type="email" 
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                              focus:ring-2 focus:ring-amber-500 focus:border-amber-500
                              transition-all duration-200 bg-white
                              placeholder:text-slate-400"
                       placeholder="contoh@email.com"
                       required>
                @error('email')
                    <p class="text-sm text-red-500 mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    <i class="fas fa-lock mr-2 text-amber-500"></i>
                    Password
                </label>
                <input type="password" 
                       name="password"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                              focus:ring-2 focus:ring-amber-500 focus:border-amber-500
                              transition-all duration-200 bg-white
                              placeholder:text-slate-400"
                       placeholder="Minimal 8 karakter"
                       required>
                @error('password')
                    <p class="text-sm text-red-500 mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </p>
                @enderror
                <p class="text-xs text-slate-500 mt-2">
                    Password harus minimal 8 karakter
                </p>
            </div>

            <!-- Role -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    <i class="fas fa-user-tag mr-2 text-amber-500"></i>
                    Role / Peran
                </label>
                <select name="level"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                               focus:ring-2 focus:ring-amber-500 focus:border-amber-500
                               transition-all duration-200 bg-white cursor-pointer
                               appearance-none"
                        required>
                    <option value="" disabled selected>-- Pilih Role --</option>
                    <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}
                            class="text-blue-600">
                        👨‍💼 Admin
                    </option>
                    <option value="kurir" {{ old('level') == 'kurir' ? 'selected' : '' }}
                            class="text-emerald-600">
                        🚚 Kurir
                    </option>
                </select>
                @error('level')
                    <p class="text-sm text-red-500 mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Role Information -->
            <div class="bg-amber-50 border border-amber-100 rounded-xl p-4">
                <div class="flex items-center mb-2">
                    <i class="fas fa-info-circle text-amber-500 mr-2"></i>
                    <span class="font-medium text-slate-700">Informasi Role</span>
                </div>
                <div class="space-y-2 text-sm text-slate-600">
                    <div class="flex items-center">
                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                        <span class="font-medium">Admin:</span>
                        <span class="ml-2">Akses penuh ke sistem</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></span>
                        <span class="font-medium">Kurir:</span>
                        <span class="ml-2">Hanya untuk pengiriman pesanan</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-100">
                <a href="{{ route('owner.users.index') }}"
                   class="px-6 py-3 rounded-xl border border-slate-300
                          text-slate-700 font-medium hover:bg-slate-50
                          transition-all duration-200 flex items-center">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>

                <button type="submit"
                        class="px-8 py-3 rounded-xl
                               bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700
                               text-white font-semibold
                               shadow-lg hover:shadow-xl
                               transition-all duration-200 active:scale-95 flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Simpan User
                </button>
            </div>

        </form>
    </div>
</div>
@endsection