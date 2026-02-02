@extends('layouts.admin')

@section('title', 'Tambah Jenis Pembayaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-lg">
    <h1 class="text-xl font-bold mb-4">Tambah Jenis Pembayaran</h1>

    <form action="{{ route('admin.jenis-pembayaran.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran"
                   class="w-full border rounded p-2" required>
        </div>

        <button class="bg-orange-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
        <a href="{{ route('admin.jenis-pembayaran.index') }}"
           class="ml-2 text-gray-600">Kembali</a>
    </form>
</div>
@endsection
