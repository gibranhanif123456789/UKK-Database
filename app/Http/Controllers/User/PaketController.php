<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->get();
        return view('user.paket.index', compact('pakets'));
    }

    public function show(Paket $paket)
    {
        return view('user.paket.show', compact('paket'));
    }
}
