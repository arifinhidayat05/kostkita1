<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\Pemilik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PemilikAuthController extends Controller
{
    public function googleredirect()
    {
        Config::set('services.google.client_id', env('GOOGLE_CLIENT_ID_PEMILIK'));
        Config::set('services.google.client_secret', env('GOOGLE_CLIENT_SECRET_PEMILIK'));
        Config::set('services.google.redirect', env('GOOGLE_REDIRECT_URL_PEMILIK'));

        return Socialite::driver('google')->redirect();
    }

    public function googlecallback(Request $request)
    {
        Config::set('services.google.client_id', env('GOOGLE_CLIENT_ID_PEMILIK'));
        Config::set('services.google.client_secret', env('GOOGLE_CLIENT_SECRET_PEMILIK'));
        Config::set('services.google.redirect', env('GOOGLE_REDIRECT_URL_PEMILIK'));

        $googleUser = Socialite::driver('google')->stateless()->user();

        $googleId = $googleUser->getId();
        $email = $googleUser->getEmail();
        $name = $googleUser->getName();

        // Cari pemilik berdasarkan email
        $pemilik = Pemilik::where('email', $email)->first();

        if ($pemilik) {
            // Kalau sudah ada, update google_id jika belum ada
            if (!$pemilik->google_id) {
                $pemilik->update([
                    'google_id' => $googleId,
                ]);
            }
        } else {
            // Kalau belum ada, buat pemilik baru
            $pemilik = Pemilik::create([
                'google_id' => $googleId,
                'nama' => $name,
                'email' => $email,
                'role' => 'pemilik', // Jangan lupa, kamu butuh role di sini
            ]);
        }

        // Login dengan guard pemilik
        Auth::guard('pemilik')->login($pemilik);

        // Redirect ke dashboard
        return view('admin.dashboard')->with('success', 'Login berhasil sebagai pemilik');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
