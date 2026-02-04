<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with([
                'pelanggan',
                'jenisPembayaran'
            ])
            ->latest()
            ->get();

        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load([
            'pelanggan',
            'detailPemesanan.paket'
        ]);

        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        return view('admin.pemesanan.edit', compact('pemesanan'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'status_pesan' => 'required'
        ]);

        $pemesanan->update([
            'status_pesan' => $request->status_pesan
        ]);

        return redirect()
            ->route('admin.pemesanan.index')
            ->with('success', 'Status pesanan berhasil diperbarui');
    }
}
