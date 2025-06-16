<?php

namespace App\Http\Controllers;

use App\Models\User; // Menggunakan model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    // Tampilkan login form
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Proses login
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $a = User::where('email', $request->email)->first();
        if ($a == null) {
            return redirect()->route('login')->with(
                'failed',
                'Email tidak terdaftar'
            );
        }

        if (Hash::check($request->password, $a->password) == false) {
            return redirect()->route('login')->with(
                'failed',
                'Password salah'
            );
        }

        Auth::login($a);

        return redirect()->route('kost.index')->with(
            'success',
            'Berhasil login'
        );
    }

    // Tampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('login.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:2|confirmed',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' =>  $validated['password'], // Pastikan password di-hash
        ]);

        Auth::login($user);

        return redirect()->route('welcome');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        session()->flush(); // Hapus semua session
        session()->regenerate(); // Regenerasi session ID untuk keamanan
        return redirect('/');
    }
}
