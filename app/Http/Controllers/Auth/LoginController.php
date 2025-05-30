<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Cek role hanya antara pembeli dan penjual
        if ($user->role === 'pembeli') {
            return redirect()->route('dashboard.pembeli');
        } elseif ($user->role === 'penjual') {
            return redirect()->route('dashboard.penjual');
        } else {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Role tidak dikenali. Hubungi administrator.'
            ]);
        }
    }

    // Jika gagal login
    return redirect()->back()
        ->withErrors(['email' => 'Email atau password salah.'])
        ->withInput($request->only('email'));
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/welcome');
    }

}
