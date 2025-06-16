<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::guard('pelanggan')->user();
        return view('kost/profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('pelanggan')->user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan,email,' . $user->user_id . ',user_id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);


        $user->nama = $request->nama;
        $user->email = $request->email;


        $user->save();

        return redirect()->route("profil")->with('success', 'Profil berhasil diperbarui!');
    }
}
