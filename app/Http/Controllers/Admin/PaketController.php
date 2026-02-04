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
        'jenis'       => 'required|in:Prasmanan,Box',
        'kategori'    => 'required|in:Pernikahan,Selamatan,Ulang Tahun,Studi Tour,Rapat',
        'jumlah_pax'  => 'required|integer|min:1',
        'harga_paket' => 'required|numeric|min:0',
        'deskripsi'   => 'nullable|string',
        'foto1'       => 'nullable|image',
        'foto2'       => 'nullable|image',
        'foto3'       => 'nullable|image',
    ]);

    $data = $request->only([
        'nama_paket',
        'jenis',
        'kategori',
        'jumlah_pax',
        'harga_paket',
        'deskripsi',
    ]);

    // upload foto
    foreach (['foto1','foto2','foto3'] as $foto) {
        if ($request->hasFile($foto)) {
            $data[$foto] = $request->file($foto)->store('paket', 'public');
        }
    }

    Paket::create($data);

    return redirect()
        ->route('admin.paket.index')
        ->with('success', 'Paket berhasil ditambahkan');
}



    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama_paket'  => 'required|max:50',
            'jenis'       => 'required|in:Prasmanan,Box',
            'kategori'    => 'required|in:Pernikahan,Selamatan,Ulang Tahun,Studi Tour,Rapat',
            'jumlah_pax'  => 'required|integer|min:1',
            'harga_paket' => 'required|integer|min:0',
             'deskripsi'   => 'nullable|string',
            'foto1'       => 'nullable|image',
            'foto2'       => 'nullable|image',
            'foto3'       => 'nullable|image',
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
