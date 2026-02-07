<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class KurirPesananController extends Controller
{
   public function index()
{
    abort_if(auth()->user()->level !== 'kurir', 403);

    $pesanan = Pemesanan::with([
            'pengiriman' => function ($q) {
                $q->where('id_user', auth()->id());
            }
        ])
        ->join('pelanggans', 'pelanggans.id', '=', 'pemesanans.id_pelanggan')
        ->select(
            'pemesanans.*',
            'pelanggans.nama_pelanggan as nama_pelanggan'
        )
        ->where('pemesanans.status_pesan', 'Menunggu Kurir')
        ->orderBy('pemesanans.id', 'desc')
        ->get();

    return view('kurir.pesanan', compact('pesanan'));
}



    public function ambil($id)
{
    abort_if(auth()->user()->level !== 'kurir', 403);

    $pesanan = Pemesanan::where('id', $id)
        ->where('status_pesan', 'Menunggu Kurir')
        ->firstOrFail();

    Pengiriman::create([
        'id_pesan'    => $id,
        'id_user'     => auth()->id(),
        'tgl_kirim'   => now(),
        'status_kirim'=> 'Sedang Dikirim',
    ]);


    return back()->with('success', 'Pesanan diambil');
}





  public function selesai(Request $request, $id)
{
    abort_if(auth()->user()->level !== 'kurir', 403);

    $request->validate([
        'bukti_foto' => 'required|image|max:2048',
    ]);

    $pengiriman = Pengiriman::where('id_pesan', $id)
        ->where('id_user', auth()->id())
        ->where('status_kirim', 'Sedang Dikirim')
        ->firstOrFail();

    $path = $request->file('bukti_foto')
        ->store('bukti-pengiriman', 'public');

    $pengiriman->update([
        'tgl_tiba'     => now(),
        'status_kirim' => 'Tiba Di Tujuan',
        'bukti_foto'   => $path,
    ]);


    return back()->with('success', 'Pesanan selesai');
}




}
