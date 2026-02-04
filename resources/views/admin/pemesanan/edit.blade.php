@extends('layouts.admin')

@section('title', 'Update Status Pesanan')

@section('content')
<div class="max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Update Status Pesanan</h1>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('admin.pemesanan.update', $pemesanan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">No Resi</label>
                <input type="text"
                       value="{{ $pemesanan->no_resi }}"
                       readonly
                       class="w-full bg-gray-100 border rounded-lg px-3 py-2">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-1">Status Pesanan</label>
                <select name="status_pesan"
                        class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200"
                        required>
                    <option {{ $pemesanan->status_pesan == 'Menunggu Konfirmasi' ? 'selected' : '' }}>
                        Menunggu Konfirmasi
                    </option>
                    <option {{ $pemesanan->status_pesan == 'Sedang Diproses' ? 'selected' : '' }}>
                        Sedang Diproses
                    </option>
                    <option {{ $pemesanan->status_pesan == 'Menunggu Kurir' ? 'selected' : '' }}>
                        Menunggu Kurir
                    </option>
                </select>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.pemesanan.index') }}"
                   class="px-4 py-2 rounded-lg border">
                    Batal
                </a>
                <button class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
