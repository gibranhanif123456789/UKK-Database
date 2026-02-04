@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">
            Tambah Paket Catering
        </h1>
        <p class="text-gray-500 text-sm">
            Lengkapi data paket yang akan ditampilkan ke pelanggan
        </p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.paket.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <!-- Nama Paket -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Paket
                </label>
                <input type="text" name="nama_paket"
                       class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                       required>
            </div>

            <!-- Jenis & Kategori -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Paket
                    </label>
                    <select name="jenis"
                            class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                            required>
                        <option value="">-- Pilih --</option>
                        <option value="Prasmanan">Prasmanan</option>
                        <option value="Box">Box</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kategori
                    </label>
                    <select name="kategori"
                            class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                            required>
                        <option value="">-- Pilih --</option>
                        <option value="Pernikahan">Pernikahan</option>
                        <option value="Selamatan">Selamatan</option>
                        <option value="Ulang Tahun">Ulang Tahun</option>
                        <option value="Studi Tour">Studi Tour</option>
                        <option value="Rapat">Rapat</option>
                    </select>
                </div>
            </div>

            <!-- Pax & Harga -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jumlah Pax
                    </label>
                    <input type="number" name="jumlah_pax"
                           class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Harga Paket
                    </label>
                    <input type="number" name="harga_paket"
                           class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                           required>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Deskripsi
                </label>
                <textarea name="deskripsi" rows="3"
                          class="w-full rounded-lg border-gray-300 focus:border-orange-500 focus:ring-orange-500"></textarea>
            </div>

            <!-- Foto -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Foto 1
                    </label>
                    <input type="file" name="foto1"
                           class="w-full text-sm text-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Foto 2
                    </label>
                    <input type="file" name="foto2"
                           class="w-full text-sm text-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Foto 3
                    </label>
                    <input type="file" name="foto3"
                           class="w-full text-sm text-gray-600">
                </div>
            </div>

            <!-- Button -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.paket.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Kembali
                </a>

                <button type="submit"
                        class="px-5 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600">
                    Simpan Paket
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
