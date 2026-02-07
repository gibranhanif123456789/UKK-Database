<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;

class KurirDashboardController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->level !== 'kurir', 403);

        return view('kurir.dashboard', [
            'menunggu' => Pengiriman::where('status_kirim', 'Menunggu Kurir')->count(),
            'dikirim'  => Pengiriman::where('status_kirim', 'Sedang Dikirim')->count(),
            'selesai'  => Pengiriman::where('status_kirim', 'Tiba Di Tujuan')
                                    ->whereDate('updated_at', today())
                                    ->count(),
        ]);
    }
}
