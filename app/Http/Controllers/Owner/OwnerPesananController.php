<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;

class OwnerPesananController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->level !== 'owner', 403);

        $pesanan = Pemesanan::with([
            'pelanggan',
            'pengiriman.user'
        ])->latest()->get();

        return view('owner.pesanan', compact('pesanan'));
    }

    public function show($id)
    {
        abort_if(auth()->user()->level !== 'owner', 403);

        $pesanan = Pemesanan::with([
            'pelanggan',
            'detailPemesanan.paket',
            'pengiriman.user'
        ])->findOrFail($id);

        return view('owner.detail-pesanan', compact('pesanan'));
    }
}
