@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Paket Catering</h1>

    <form action="{{ route('admin.paket.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Paket</label>
            <input type="text" name="nama_paket"
                   value="{{ $paket->nama_paket }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Paket</label>
            <select name="jenis" class="form-control" required>
                <option value="Prasmanan" {{ $paket->jenis == 'Prasmanan' ? 'selected' : '' }}>
                    Prasmanan
                </option>
                <option value="Box" {{ $paket->jenis == 'Box' ? 'selected' : '' }}>
                    Box
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                @foreach(['Pernikahan','Selamatan','Ulang Tahun','Studi Tour','Rapat'] as $kat)
                    <option value="{{ $kat }}" {{ $paket->kategori == $kat ? 'selected' : '' }}>
                        {{ $kat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah Pax</label>
            <input type="number" name="jumlah_pax"
                   value="{{ $paket->jumlah_pax }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga Paket</label>
            <input type="number" name="harga_paket"
                   value="{{ $paket->harga_paket }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $paket->deskripsi }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
