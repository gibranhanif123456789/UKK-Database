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
use App\Http\Controllers\Kurir\KurirDashboardController;
use App\Http\Controllers\Kurir\KurirPesananController;
use App\Http\Controllers\Owner\OwnerDashboardController;
use App\Http\Controllers\Owner\OwnerPesananController;
use App\Http\Controllers\Owner\OwnerUserController;


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

Route::middleware('auth:web')
    ->prefix('kurir')
    ->name('kurir.')
    ->group(function () {

        Route::get('/dashboard', function () {
            abort_if(auth()->user()->level !== 'kurir', 403);
            return view('kurir.dashboard');
        })->name('dashboard');
          Route::get('/dashboard', [KurirDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/pesanan', [KurirPesananController::class, 'index'])
            ->name('pesanan');

        Route::get('/pesanan/{id}', [KurirPesananController::class, 'show'])
            ->name('pesanan.detail');

        Route::post('/pesanan/{id}/ambil', [KurirPesananController::class, 'ambil'])
            ->name('pesanan.ambil');

        Route::post('/pesanan/{id}/selesai', [KurirPesananController::class, 'selesai'])
            ->name('pesanan.selesai');
    });

Route::middleware('auth:web')
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {

        Route::get('/dashboard', [OwnerDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/pesanan', [OwnerPesananController::class, 'index'])
            ->name('pesanan');

        Route::get('/pesanan/{id}', [OwnerPesananController::class, 'show'])
            ->name('pesanan.detail');

        Route::get('/users', [OwnerUserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/create', [OwnerUserController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [OwnerUserController::class, 'store'])
            ->name('users.store');
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
