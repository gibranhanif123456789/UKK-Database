@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Paket Catering</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.paket.create') }}" class="btn btn-primary mb-3">
        + Tambah Paket
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Paket</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Pax</th>
                <th>Harga</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakets as $paket)
            <tr>
                <td>{{ $paket->nama_paket }}</td>
                <td>{{ $paket->jenis }}</td>
                <td>{{ $paket->kategori }}</td>
                <td>{{ $paket->jumlah_pax }}</td>
                <td>Rp {{ number_format($paket->harga_paket) }}</td>
                <td>
                    <a href="{{ route('admin.paket.edit', $paket->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.paket.destroy', $paket->id) }}"
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus paket ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($pakets->count() == 0)
            <tr>
                <td colspan="6" class="text-center">Data kosong</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
