<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPembayaran;
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

    public function store(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|max:30'
        ]);

        JenisPembayaran::create($request->all());

        return redirect()
            ->route('admin.jenis-pembayaran.index')
            ->with('success', 'Metode pembayaran berhasil ditambahkan');
    }

    public function edit(JenisPembayaran $jenis_pembayaran)
    {
        return view('admin.jenis_pembayaran.edit', compact('jenis_pembayaran'));
    }

    public function update(Request $request, JenisPembayaran $jenis_pembayaran)
    {
        $request->validate([
            'metode_pembayaran' => 'required|max:30'
        ]);

        $jenis_pembayaran->update($request->all());

        return redirect()
            ->route('admin.jenis-pembayaran.index')
            ->with('success', 'Metode pembayaran berhasil diperbarui');
    }

    public function destroy(JenisPembayaran $jenis_pembayaran)
    {
        $jenis_pembayaran->delete();

        return back()->with('success', 'Metode pembayaran dihapus');
    }
}
