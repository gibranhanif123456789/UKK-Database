<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPembayaran;
use App\Models\DetailJenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        $data = JenisPembayaran::latest()->get();
        return view('admin.jenis_pembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jenis_pembayaran.create');
    }

    /**
     * STORE
     * - tetap simpan jenis_pembayarans
     * - tambahan simpan detail_jenis_pembayarans (sesuai PDM)
     */
    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|max:30',
            'no_rek'            => 'required|max:25',
            'tempat_bayar'      => 'required|max:50',
            'logo'              => 'nullable|image|max:2048',
        ]);

        // 1. simpan jenis pembayaran (TETAP)
        $jenis = JenisPembayaran::create([
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        // 2. handle logo (opsional)
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo-pembayaran', 'public');
        }

        // 3. simpan detail jenis pembayaran (BARU, sesuai PDM)
        DetailJenisPembayaran::create([
            'id_jenis_pembayaran' => $jenis->id,
            'no_rek'              => $request->no_rek,
            'tempat_bayar'        => $request->tempat_bayar,
            'logo'                => $logoPath,
        ]);

        return redirect()
            ->route('admin.jenis-pembayaran.index')
            ->with('success', 'Metode pembayaran berhasil ditambahkan');
    }

    public function edit(JenisPembayaran $jenis_pembayaran)
{
    $details = \DB::table('detail_jenis_pembayarans')
        ->where('id_jenis_pembayaran', $jenis_pembayaran->id)
        ->get();

    return view(
        'admin.jenis_pembayaran.edit',
        compact('jenis_pembayaran', 'details')
    );
}


    public function update(Request $request, JenisPembayaran $jenis_pembayaran)
{
    $request->validate([
        'metode_pembayaran' => 'required|max:30',
        'no_rek'            => 'required|max:25',
        'tempat_bayar'      => 'required|max:50',
        'logo'              => 'nullable|image|max:2048',
    ]);

    // 1. update jenis pembayaran
    $jenis_pembayaran->update([
        'metode_pembayaran' => $request->metode_pembayaran,
    ]);

    // 2. ambil detail (kalau ada)
    $detail = DetailJenisPembayaran::where(
        'id_jenis_pembayaran',
        $jenis_pembayaran->id
    )->first();

    // 3. handle logo
    $logoPath = $detail->logo ?? null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')
            ->store('logo-pembayaran', 'public');
    }

    // 4. update / create detail (AMAN)
    DetailJenisPembayaran::updateOrCreate(
        ['id_jenis_pembayaran' => $jenis_pembayaran->id],
        [
            'no_rek'       => $request->no_rek,
            'tempat_bayar' => $request->tempat_bayar,
            'logo'         => $logoPath,
        ]
    );

    return redirect()
        ->route('admin.jenis-pembayaran.index')
        ->with('success', 'Metode pembayaran berhasil diperbarui');
}


    public function destroy(JenisPembayaran $jenis_pembayaran)
    {
        $jenis_pembayaran->delete();

        return back()->with('success', 'Metode pembayaran dihapus');
    }

    /**
     * DETAIL
     * - tampilkan detail jenis pembayaran
     * - TIDAK mengganggu flow lama
     */
   public function detail(JenisPembayaran $jenis_pembayaran)
{
    $jenis = $jenis_pembayaran;

    $details = \DB::table('detail_jenis_pembayarans')
        ->where('id_jenis_pembayaran', $jenis->id)
        ->get();

    return view(
        'admin.jenis_pembayaran.detail',
        compact('jenis', 'details')
    );
}
}
