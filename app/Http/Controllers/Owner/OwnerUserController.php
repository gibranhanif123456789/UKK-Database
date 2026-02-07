<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OwnerUserController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->level !== 'owner', 403);

        $users = User::whereIn('level', ['admin', 'kurir'])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('owner.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(auth()->user()->level !== 'owner', 403);

        return view('owner.users.create');
    }

    public function store(Request $request)
    {
        abort_if(auth()->user()->level !== 'owner', 403);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level'    => 'required|in:admin,kurir',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'level'    => $request->level,
        ]);

        return redirect()
            ->route('owner.users.index')
            ->with('success', 'User berhasil ditambahkan');
    }
}
