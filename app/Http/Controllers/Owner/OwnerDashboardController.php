<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Pengiriman;

class OwnerDashboardController extends Controller
{


public function index()
{
    abort_if(auth()->user()->level !== 'owner', 403);

    $totalPesanan = Pemesanan::count();
    $totalOmzet   = Pemesanan::sum('total_bayar');
    $sedangKirim  = Pengiriman::where('status_kirim', 'Sedang Dikirim')->count();
    $selesai      = Pengiriman::where('status_kirim', 'Tiba Di Tujuan')->count();

    // 🔥 OMZET BULANAN
    $omzetBulanan = Pemesanan::selectRaw('MONTH(created_at) as bulan, SUM(total_bayar) as total')
        ->whereYear('created_at', now()->year)
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->pluck('total', 'bulan');

    return view('owner.dashboard', compact(
        'totalPesanan',
        'totalOmzet',
        'sedangKirim',
        'selesai',
        'omzetBulanan'
    ));
}

}
