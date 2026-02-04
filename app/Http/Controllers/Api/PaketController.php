<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Paket::all()
        ]);
    }

    public function show($id)
    {
        $paket = Paket::findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => $paket
        ]);
    }
}
