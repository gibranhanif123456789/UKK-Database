<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganAuthController extends Controller
{
    /**
     * Tampilkan form login pelanggan
     */
    public function showLoginForm()
    {
        return view('auth.pelanggan.login');
    }

    /**
     * Proses login pelanggan
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            $request->session()->regenerate();

            // setelah login pelanggan → ke halaman pemesanan
            return redirect()->route('pemesanan.create');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }
    public function showRegisterForm()
{
    return view('auth.pelanggan.register'); // Path sesuai struktur kamu
}
public function register(Request $request)
{
    $request->validate([
        'nama_pelanggan' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:pelanggans'],
        'telepon' => ['required', 'string', 'max:15'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $pelanggan = Pelanggan::create([
        'nama_pelanggan' => $request->nama_pelanggan,
        'email' => $request->email,
        'telepon' => $request->telepon,
        'password' => Hash::make($request->password),
    ]);

    // Login otomatis setelah register
    Auth::guard('pelanggan')->login($pelanggan);

    return redirect()->route('home'); // Arahkan ke home page
}
    /**
     * Logout pelanggan
     */
    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
