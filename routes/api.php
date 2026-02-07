<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PemesananController;
use App\Http\Controllers\Api\PaketController;   

Route::get('/test', function () {
    return response()->json([
        'status' => 'API OK'
    ]);
});

Route::post('/pemesanan', [PemesananController::class, 'store']);
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::get('/kurir/pesanan', [PemesananController::class, 'forKurir']);