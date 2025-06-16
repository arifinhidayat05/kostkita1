<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        // Ambil data dari Google
        $googleUser = Socialite::driver('google')->stateless()->user();

        $googleId = $googleUser->getId();
        $email = $googleUser->getEmail();
        $name = $googleUser->getName();

        // Cari pengguna berdasarkan google_id atau email
        $pelanggan = Pelanggan::where('google_id', $googleId)
            ->orWhere('email', $email)
            ->first();

        if ($pelanggan) {
            // Kalau sudah ada, update google_id jika perlu (kalau dulu daftar manual misal)
            if (!$pelanggan->google_id) {
                $pelanggan->update([
                    'google_id' => $googleId,
                ]);
            }
        } else {
            // Kalau belum ada, buat pengguna baru
            $pelanggan = Pelanggan::create([
                'google_id' => $googleId,
                'nama' => $name,
                'email' => $email,
            ]);
        }

        // Login pengguna
        // Auth::login($pelanggan);
        Auth::guard('pelanggan')->login($pelanggan);

        // Redirect ke halaman setelah login
        return redirect('pelanggan/pelanggan/beranda');
    }

    //login manual
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


        $pelanggan = Pelanggan::where('email', $request->email)->first();
        if ($pelanggan == null) {
            return redirect()->route('login')->with(
                'failed',
                'Email tidak terdaftar'
            );
        }

        if (Hash::check($request->password, $pelanggan->password) == false) {
            return redirect()->route('login')->with(
                'failed',
                'Password salah'
            );
        }

        Auth::guard('pelanggan')->login($pelanggan);

        return redirect()->route('beranda')->with(
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
            'nama' => 'required|string|max:255|unique:pelanggan,nama',
            'email' => 'required|email|unique:pelanggan,email',
            'password' => 'required|min:2|confirmed',
        ]);

        $pelanggan = Pelanggan::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' =>  $validated['password'], // Pastikan password di-hash
        ]);

        Auth::guard('pelanggan')->login($pelanggan);

        return redirect()->route('login')->with(
            'success',
            'Berhasil registrasi dan login'
        );
    }

    public function logout()
    {
        Auth::logout();
        session()->flush(); // Hapus semua session
        session()->regenerate(); // Regenerasi session ID untuk keamanan
        return redirect('/');
    }
}
