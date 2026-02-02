@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Paket Catering</h1>

    <form action="{{ route('admin.paket.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Paket</label>
            <input type="text" name="nama_paket" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Paket</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Prasmanan">Prasmanan</option>
                <option value="Box">Box</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Pernikahan">Pernikahan</option>
                <option value="Selamatan">Selamatan</option>
                <option value="Ulang Tahun">Ulang Tahun</option>
                <option value="Studi Tour">Studi Tour</option>
                <option value="Rapat">Rapat</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Pax</label>
            <input type="number" name="jumlah_pax" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga Paket</label>
            <input type="number" name="harga_paket" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
