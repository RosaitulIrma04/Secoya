<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $cart = session('cart', []); // Ambil cart dari session, default array kosong jika belum ada
        return view('pembeli', compact('cart'));
    }
}
