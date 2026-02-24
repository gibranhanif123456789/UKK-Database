<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan; // GANTI DARI User KE Pelanggan
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:pelanggans'],
        'telepon' => ['required', 'string', 'max:15'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $pelanggan = Pelanggan::create([
        'nama_pelanggan' => $request->name,
        'email' => $request->email,
        'telepon' => $request->telepon, // Ambil dari input
        'password' => Hash::make($request->password),
        'alamat1' => null,
        'alamat2' => null,
        'alamat3' => null,
        'kartu_id' => null,
        'foto' => null,
        'tgl_lahir' => null,
    ]);

    event(new Registered($pelanggan));

    Auth::guard('pelanggan')->login($pelanggan);

    return redirect(route('home', absolute: false));
}
}