<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\JenisPembayaranController;
use App\Http\Controllers\Admin\PemesananController;


/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Authenticated User (Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // dashboard default (boleh dipakai / atau nanti dihapus)
    Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->level === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->level === 'owner') {
        return redirect('/owner/dashboard');
    }

    if ($user->level === 'kurir') {
        return redirect('/kurir/dashboard');
    }

    // default fallback
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

    // profile (bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Area
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('paket', PaketController::class);
        Route::resource('jenis-pembayaran', JenisPembayaranController::class);
        Route::resource('pemesanan', PemesananController::class)
            ->except(['create', 'store']);
    });

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
