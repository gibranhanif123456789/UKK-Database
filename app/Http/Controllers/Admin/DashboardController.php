<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPemesanan = Pemesanan::count();

        $menungguKonfirmasi = Pemesanan::where('status_pesan', 'Menunggu Konfirmasi')->count();

        $sedangDiproses = Pemesanan::where('status_pesan', 'Sedang Diproses')->count();

        $totalOmzet = Pemesanan::sum('total_bayar');

        $pesananTerbaru = Pemesanan::with('pelanggan')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalPemesanan',
            'menungguKonfirmasi',
            'sedangDiproses',
            'totalOmzet',
            'pesananTerbaru'
        ));
    }
}
