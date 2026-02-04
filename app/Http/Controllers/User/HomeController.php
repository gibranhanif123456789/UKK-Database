<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;

class HomeController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->take(6)->get();

        return view('user.home', compact('pakets'));
    }
}
