@extends('layouts.admin')

@section('title', 'Edit Jenis Pembayaran')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-xl">

    <h1 class="text-xl font-bold mb-6">
        Edit Jenis Pembayaran
    </h1>

    <form action="{{ route('admin.jenis-pembayaran.update', $jenis_pembayaran->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Metode Pembayaran --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">
                Metode Pembayaran
            </label>
            <input type="text"
                   name="metode_pembayaran"
                   value="{{ old('metode_pembayaran', $jenis_pembayaran->metode_pembayaran) }}"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <hr class="my-5">

        <h2 class="font-semibold mb-3">
            Detail Jenis Pembayaran
        </h2>

        @forelse($details as $detail)
            {{-- No Rekening --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">
                    No Rekening
                </label>
                <input type="text"
                       name="no_rek"
                       value="{{ old('no_rek', $detail->no_rek) }}"
                       class="w-full border rounded p-2">
            </div>

            {{-- Tempat Bayar --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">
                    Tempat Bayar
                </label>
                <input type="text"
                       name="tempat_bayar"
                       value="{{ old('tempat_bayar', $detail->tempat_bayar) }}"
                       class="w-full border rounded p-2">
            </div>

            {{-- Logo --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">
                    Logo Pembayaran
                </label>

                @if($detail->logo ?? false)
                    <img src="{{ asset('storage/' . $detail->logo) }}"
                         class="w-24 mb-2 rounded border">
                @endif

                <input type="file"
                       name="logo"
                       class="w-full border rounded p-2">
            </div>
        @empty
            <p class="text-gray-500 italic">
                Detail pembayaran belum tersedia
            </p>
        @endforelse

        {{-- Action --}}
        <div class="flex items-center mt-6">
            <button class="bg-orange-500 text-white px-5 py-2 rounded hover:bg-orange-600">
                Update
            </button>

            <a href="{{ route('admin.jenis-pembayaran.index') }}"
               class="ml-3 text-gray-600 hover:underline">
                Kembali
            </a>
        </div>

    </form>
</div>
@endsection
