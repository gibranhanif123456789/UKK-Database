<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PemesananController extends Controller
{
    
    // PemesananController.php
public function index()
{
    $pemesanans = Pemesanan::with('pelanggan', 'jenisPembayaran', 'detailPemesanan.paket')
                          ->latest()
                          ->get();
    return response()->json($pemesanans);
}

public function show($id)
{
    $pemesanan = Pemesanan::with('pelanggan', 'jenisPembayaran', 'detailPemesanan.paket', 'pengiriman')
                         ->findOrFail($id);
    return response()->json($pemesanan);
}

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_jenis_bayar' => 'required|exists:jenis_pembayarans,id',
            'items' => 'required|array|min:1',
            'items.*.id_paket' => 'required|exists:pakets,id',
            'items.*.subtotal' => 'required|integer|min:1000',
        ]);

        // Hitung total
        $totalBayar = collect($request->items)->sum('subtotal');

        // Buat pemesanan
        $pemesanan = Pemesanan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_jenis_bayar' => $request->id_jenis_bayar,
            'no_resi' => 'RESI-' . strtoupper(Str::random(8)),
            'tgl_pesan' => now(),
            'status_pesan' => 'Menunggu Konfirmasi', // ✅ SPASI
            'total_bayar' => $totalBayar,
        ]);

        // Simpan detail
        foreach ($request->items as $item) {
            DetailPemesanan::create([
                'id_pemesanan' => $pemesanan->id,
                'id_paket' => $item['id_paket'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        // ✅ Perbaikan di sini: sesuaikan nama relasi
        $pemesanan->load('pelanggan', 'jenisPembayaran', 'detailPemesanan.paket');

        return response()->json([
            'message' => 'Pemesanan berhasil dibuat',
            'data' => $pemesanan
        ], 201);
    }
}