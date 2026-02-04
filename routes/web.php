<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\JenisPembayaranController;
use App\Http\Controllers\Admin\PemesananController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PaketController as UserPaketController;
use App\Http\Controllers\User\PemesananController as UserPemesananController;
use App\Http\Controllers\Auth\PelangganAuthController;

/*
|--------------------------------------------------------------------------
| USER / PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/paket', [UserPaketController::class, 'index'])
    ->name('paket.index');

Route::get('/paket/{paket}', [UserPaketController::class, 'show'])
    ->name('paket.show');


/*
|--------------------------------------------------------------------------
| USER PESAN (WAJIB LOGIN PELANGGAN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:pelanggan')->group(function () {
    Route::get('/pesan/{paket}', [UserPemesananController::class, 'create'])
        ->name('user.pesan');

    Route::post('/pesan', [UserPemesananController::class, 'store'])
        ->name('user.pesan.store');

    
    // ✅ PESANAN BERHASIL
    Route::get('/pesanan/berhasil/{pemesanan}', [UserPemesananController::class, 'success'])
        ->name('user.pesan.success');

    // ✅ RIWAYAT PESANAN
    Route::get('/riwayat-pesanan', [UserPemesananController::class, 'riwayat'])
        ->name('user.pesanan.riwayat');

        
Route::post('/logout-pelanggan', [PelangganAuthController::class, 'logout'])
    ->name('pelanggan.logout');

    
});



/*
|--------------------------------------------------------------------------
| ADMIN AREA (BREEZE)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:web')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('paket', PaketController::class);
        Route::resource('jenis-pembayaran', JenisPembayaranController::class);
        Route::resource('pemesanan', PemesananController::class)
            ->except(['create', 'store']);
            Route::get(
    'jenis-pembayaran/{jenis-pembayaran}/detail',
    [JenisPembayaranController::class, 'detail']
)->name('jenis-pembayaran.detail');
    });


/*
|--------------------------------------------------------------------------
| PROFILE (ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:web')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| AUTH BREEZE
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
