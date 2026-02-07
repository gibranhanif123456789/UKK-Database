@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-edit text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Edit Paket Catering
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Perbarui data paket catering "{{ $paket->nama_paket }}"
                </p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-slate-100">
        <form action="{{ route('admin.paket.update', $paket->id) }}" 
              method="POST"
              enctype="multipart/form-data"
              class="space-y-8">
            @csrf
            @method('PUT')

            <!-- Nama Paket -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">
                    Nama Paket
                </label>
                <input type="text" 
                       name="nama_paket"
                       value="{{ old('nama_paket', $paket->nama_paket) }}"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                              focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                              transition-all duration-200 bg-white"
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
                        <option value="Prasmanan" {{ old('jenis', $paket->jenis) == 'Prasmanan' ? 'selected' : '' }}>
                            Prasmanan
                        </option>
                        <option value="Box" {{ old('jenis', $paket->jenis) == 'Box' ? 'selected' : '' }}>
                            Box
                        </option>
                    </select>
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
                        @foreach(['Pernikahan', 'Selamatan', 'Ulang Tahun', 'Studi Tour', 'Rapat'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategori', $paket->kategori) == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
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
                           value="{{ old('jumlah_pax', $paket->jumlah_pax) }}"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  transition-all duration-200 bg-white"
                           min="1"
                           required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-slate-700">
                        Harga Paket (Rp)
                    </label>
                    <input type="number" 
                           name="harga_paket"
                           value="{{ old('harga_paket', $paket->harga_paket) }}"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3.5
                                  focus:ring-2 focus:ring-orange-500 focus:border-orange-500
                                  transition-all duration-200 bg-white"
                           min="0"
                           required>
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
                                 transition-all duration-200 bg-white resize-none">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
            </div>

            <!-- Foto Previews -->
            @if($paket->foto1 || $paket->foto2 || $paket->foto3)
                <div class="space-y-4 pt-4 border-t border-slate-100">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-images text-orange-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">
                            Foto Saat Ini
                        </h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach(['foto1', 'foto2', 'foto3'] as $foto)
                            @if($paket->$foto)
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-slate-700">
                                        {{ ucfirst($foto) }}
                                    </label>
                                    <div class="relative">
                                        <div class="w-full h-48 bg-slate-100 rounded-xl border border-slate-200 overflow-hidden">
                                            <img src="{{ asset('storage/'.$paket->$foto) }}" 
                                                 alt="Foto {{ ucfirst($foto) }}"
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <div class="mt-2 text-sm text-slate-500">
                                            <p>Ganti file untuk memperbarui foto</p>
                                        </div>
                                        <input type="file" 
                                               name="{{ $foto }}"
                                               accept="image/*"
                                               class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-2
                                                      bg-white file:mr-4 file:py-2 file:px-4
                                                      file:rounded-lg file:border-0
                                                      file:bg-orange-100 file:text-orange-700
                                                      hover:file:bg-orange-200 transition-all duration-200">
                                    </div>
                                </div>
                            @else
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-slate-700">
                                        Tambah {{ ucfirst($foto) }} (Opsional)
                                    </label>
                                    <input type="file" 
                                           name="{{ $foto }}"
                                           accept="image/*"
                                           class="w-full rounded-xl border-2 border-dashed border-slate-200 px-4 py-4
                                                  bg-white file:mr-4 file:py-2.5 file:px-4
                                                  file:rounded-lg file:border-0
                                                  file:bg-gradient-to-r file:from-orange-500 file:to-orange-600
                                                  file:text-white file:font-medium
                                                  hover:file:from-orange-600 hover:file:to-orange-700
                                                  transition-all duration-200 cursor-pointer">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Button -->
            <div class="flex items-center justify-between pt-8 border-t border-slate-100">
                <a href="{{ route('admin.paket.index') }}"
                   class="px-6 py-3 rounded-xl border border-slate-300
                          text-slate-700 font-medium hover:bg-slate-50
                          transition-all duration-200 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>

                <div class="flex items-center space-x-4">
                    <button type="submit"
                            class="px-8 py-3 rounded-xl
                                   bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700
                                   text-white font-semibold
                                   shadow-lg hover:shadow-xl
                                   transition-all duration-200 active:scale-95 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Paket
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection