<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('pembeli.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('pembeli.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);



        return redirect()->route('myaccount')->with('success', 'Profil berhasil diperbarui.');
    }
}
