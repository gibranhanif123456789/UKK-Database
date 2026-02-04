<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use App\Models\Paket;
use App\Models\JenisPembayaran;
use DB;

class PemesananController extends Controller
{

    public function create(Paket $paket)
    {
        return view('user.pemesanan.create', [
            'paket' => $paket,
            'pelanggan' => Auth::guard('pelanggan')->user(),
            'jenisPembayaran' => JenisPembayaran::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_paket'       => 'required|exists:pakets,id',
            'qty'            => 'required|integer|min:1',
            'alamat'         => 'required|string|max:255',
            'id_jenis_bayar' => 'required|exists:jenis_pembayarans,id',
        ]);

        DB::beginTransaction();

        try {
            $pelanggan = Auth::guard('pelanggan')->user();
            $paket = Paket::findOrFail($request->id_paket);
            $subtotal = $paket->harga_paket * $request->qty;

            $pemesanan = Pemesanan::create([
                'id_pelanggan'   => $pelanggan->id,
                'id_jenis_bayar' => $request->id_jenis_bayar,
                'no_resi'        => 'ORD-' . now()->timestamp,
                'tgl_pesan'      => now(),
                'status_pesan'   => 'Menunggu Konfirmasi',
                'total_bayar'    => $subtotal,
            ]);

            DetailPemesanan::create([
                'id_pemesanan' => $pemesanan->id,
                'id_paket'     => $paket->id,
                'qty'          => $request->qty,
                'subtotal'     => $subtotal,
            ]);

            DB::commit();

            return redirect()
    ->route('user.pesan.success', $pemesanan->id);

        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors('Terjadi kesalahan saat menyimpan pesanan');
        }
    }
    public function success(Pemesanan $pemesanan)
{
    return view('user.pemesanan.success', compact('pemesanan'));
}

public function riwayat()
{
    $pesanan = Pemesanan::with(['detailPemesanan.paket', 'jenisPembayaran'])
        ->where('id_pelanggan', Auth::guard('pelanggan')->id())
        ->latest()
        ->get();

    return view('user.pemesanan.riwayat', compact('pesanan'));
}

}
