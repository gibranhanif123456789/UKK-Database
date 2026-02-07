<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // 1️⃣ Coba login ADMIN (users)
        if (Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::guard('web')->user();

        return match ($user->level) {
            'admin' => redirect()->route('admin.dashboard'),
            'kurir' => redirect()->route('kurir.dashboard'),
            'owner' => redirect()->route('owner.dashboard'),
            default => redirect('/login'),
        };
    }

     /**
     * 2️⃣ LOGIN PELANGGAN
     */
    if (Auth::guard('pelanggan')->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('home');
    }

      /**
     * 3️⃣ GAGAL SEMUA
     */
    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
{
    if (Auth::guard('web')->check()) {
        Auth::guard('web')->logout();
    }

    if (Auth::guard('pelanggan')->check()) {
        Auth::guard('pelanggan')->logout();
    }

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}

}
