@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-utensils text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Tambah Paket Catering
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Lengkapi data paket yang akan ditampilkan ke pelanggan
                </p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
        <form action="{{ route('admin.paket.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-8">
            @csrf

            <!-- Nama Paket -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    Nama Paket
                </label>
                <input type="text" 
                       name="nama_paket"
                       value="{{ old('nama_paket') }}"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                              focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                              transition-all duration-200 bg-white
                              placeholder:text-slate-400"
                       placeholder="Masukkan nama paket catering"
                       required>
                @error('nama_paket')
                    <p class="text-sm text-red-500 mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Jenis & Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">
                        Jenis Paket
                    </label>
                    <select name="jenis"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                   focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                   transition-all duration-200 bg-white cursor-pointer"
                            required>
                        <option value="" disabled selected>-- Pilih Jenis Paket --</option>
                        <option value="Prasmanan" {{ old('jenis') == 'Prasmanan' ? 'selected' : '' }}>
                            Prasmanan
                        </option>
                        <option value="Box" {{ old('jenis') == 'Box' ? 'selected' : '' }}>
                            Box
                        </option>
                    </select>
                    @error('jenis')
                        <p class="text-sm text-red-500 mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">
                        Kategori Acara
                    </label>
                    <select name="kategori"
                            class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                   focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                   transition-all duration-200 bg-white cursor-pointer"
                            required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Pernikahan" {{ old('kategori') == 'Pernikahan' ? 'selected' : '' }}>
                            Pernikahan
                        </option>
                        <option value="Selamatan" {{ old('kategori') == 'Selamatan' ? 'selected' : '' }}>
                            Selamatan
                        </option>
                        <option value="Ulang Tahun" {{ old('kategori') == 'Ulang Tahun' ? 'selected' : '' }}>
                            Ulang Tahun
                        </option>
                        <option value="Studi Tour" {{ old('kategori') == 'Studi Tour' ? 'selected' : '' }}>
                            Studi Tour
                        </option>
                        <option value="Rapat" {{ old('kategori') == 'Rapat' ? 'selected' : '' }}>
                            Rapat
                        </option>
                    </select>
                    @error('kategori')
                        <p class="text-sm text-red-500 mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Pax & Harga -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">
                        Jumlah Pax (Orang)
                    </label>
                    <input type="number" 
                           name="jumlah_pax"
                           value="{{ old('jumlah_pax') }}"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  transition-all duration-200 bg-white
                                  placeholder:text-slate-400"
                           placeholder="Contoh: 50"
                           min="1"
                           required>
                    @error('jumlah_pax')
                        <p class="text-sm text-red-500 mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">
                        Harga Paket (Rp)
                    </label>
                    <input type="number" 
                           name="harga_paket"
                           value="{{ old('harga_paket') }}"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  transition-all duration-200 bg-white
                                  placeholder:text-slate-400"
                           placeholder="Masukkan harga paket"
                           min="0"
                           required>
                    @error('harga_paket')
                        <p class="text-sm text-red-500 mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    Deskripsi Paket
                </label>
                <textarea name="deskripsi" 
                          rows="4"
                          class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                 focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                 transition-all duration-200 bg-white resize-none
                                 placeholder:text-slate-400"
                          placeholder="Deskripsikan paket catering (menu, pelayanan, dll)">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-sm text-red-500 mt-2 flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Foto Section -->
            <div class="space-y-4 pt-4 border-t border-slate-100">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-images text-orange-500"></i>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800">
                        Foto Paket (Maksimal 3 Foto)
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach(['foto1', 'foto2', 'foto3'] as $foto)
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-700">
                                {{ ucfirst($foto) }} <span class="text-slate-400">(Opsional)</span>
                            </label>
                            <div class="relative">
                                <input type="file" 
                                       name="{{ $foto }}"
                                       accept="image/*"
                                       class="w-full rounded-xl border-2 border-dashed border-slate-200 px-4 py-4
                                              bg-white file:mr-4 file:py-2.5 file:px-4
                                              file:rounded-lg file:border-0
                                              file:bg-gradient-to-r file:from-orange-500 file:to-orange-600
                                              file:text-white file:font-medium
                                              hover:file:from-orange-600 hover:file:to-orange-700
                                              transition-all duration-200 cursor-pointer
                                              hover:border-orange-300">
                            </div>
                            @error($foto)
                                <p class="text-sm text-red-500 mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    @endforeach
                </div>
                <p class="text-xs text-slate-500">
                    Format: JPG, PNG (Maksimal 2MB per foto)
                </p>
            </div>

            <!-- Button -->
            <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-100">
                <a href="{{ route('admin.paket.index') }}"
                   class="px-6 py-3 rounded-xl border border-slate-300
                          text-slate-700 font-medium hover:bg-slate-50
                          transition-all duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>

                <button type="submit"
                        class="px-8 py-3 rounded-xl
                               bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                               text-white font-semibold
                               shadow-lg hover:shadow-xl
                               transition-all duration-200 active:scale-95 flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Simpak Paket
                </button>
            </div>

        </form>
    </div>
</div>
@endsection