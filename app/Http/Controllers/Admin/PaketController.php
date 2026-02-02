<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->get();
        return view('admin.paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket'  => 'required|max:50',
            'jenis'       => 'required',
            'kategori'    => 'required',
            'jumlah_pax'  => 'required|integer|min:1',
            'harga_paket' => 'required|integer|min:0',
        ]);

        Paket::create($request->all());

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama_paket'  => 'required',
            'jenis'       => 'required',
            'kategori'    => 'required',
            'jumlah_pax'  => 'required|integer',
            'harga_paket' => 'required|integer',
        ]);

        $paket->update($request->all());

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket berhasil diupdate');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return back()->with('success', 'Paket dihapus');
    }
}
