<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemilikAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KostController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PenyewaController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\ProfilController;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Route untuk login pengguna dengan Google
Route::get('/auth/google/login', [AuthController::class, 'googleRedirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback'])->name('auth.google.callback');

// Route untuk login pemilik dengan Google
Route::get('/pemilik/login', [PemilikAuthController::class, 'googleRedirect'])->name('auth.google.redirect.pemilik');
Route::get('/pemilik/auth/google/callback', [PemilikAuthController::class, 'googleCallback'])->name('auth.google.callback.pemilik');



// Route Login/Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login']); // Proses login

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form'); // Menampilkan form registrasi
Route::post('/register', [AuthController::class, 'register'])->name('register'); // Proses registrasi

Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); // Logout


Route::get('/', function () {
    return view('login.login
    ');
});

// admin
Route::prefix('pemilik')->middleware([AuthMiddleware::class])->group(function () {

    // =================== KOST ===================
    Route::get('admin/kost', [KostController::class, 'index'])->name('kost.index');
    Route::get('/create/kost', [KostController::class, 'create'])->name('kost.create');
    Route::post('/store', [KostController::class, 'store'])->name('kost.store');

    Route::get('admin/kost/{id}', [KostController::class, 'edit'])->name('kost.edit');
    Route::post('update/kost/{id}', [KostController::class, 'update'])->name('kost.update');
    Route::get('delete/kost/{id}', [KostController::class, 'delete'])->name('kost.delete');

    // =================== KAMAR ===================
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::post('/kamar/update-status/{kamar}', [KamarController::class, 'updateStatus'])->name('kamar.updateStatus');

    Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
    Route::put('update/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
    Route::get('/kamar/{id}/delete', [KamarController::class, 'destroy'])->name('kamar.delete');
    Route::get('/create/kamar', [KamarController::class, 'create'])->name('kamar.create');
    Route::post('/kamar/store', [KamarController::class, 'store'])->name('kamar.store');
    route::get('/admin/dashboard', [PemilikAuthController::class, 'dashboard'])->name('admin.dashboard'); // Dashboard pemilik
    Route::get('/admin/pemesanan', [PemesananController::class, 'index'])->name('admin.pemesanan.index');
});


route::prefix('pelanggan')->middleware([AuthMiddleware::class])->group(function () {
    // pelanggan

    Route::get('/kost', [KostController::class, 'indexkost'])->name('kost.indexkost');  // Untuk menampilkan daftar kost
    Route::get('/kost/{kost_id}', [KostController::class, 'showkost'])->name('kost.show'); // Untuk menampilkan detail kost
    Route::get('/kost/{kost_id}/kamars', [KostController::class, 'showKamar'])->name('kost.showKamar');  // Untuk menampilkan kamar berdasarkan kost
    Route::get('/kamar/{kamar_id}', [KamarController::class, 'pesanKamar'])->name('kamar.show');
    route::get("/contact", function () {
        return view('kost.contact');
    })->name('contact');
    route::get('pelanggan/beranda', function () {
        return view('kost.beranda');
    })->name('beranda');

    route::get('pelanggan/tentang', function () {
        return view('kost.tentangkami');
    })->name('tentang');
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
    // Menampilkan ulasan untuk satu kost
    Route::get('/kost/{kost_id}/ulasan', [UlasanController::class, 'show'])->name('ulasan.show');
    // Pelanggan pesan langsung kamar
    Route::post('/pemesanan/pesan', [PemesananController::class, 'pesanLangsung'])->name('pemesanan.pesan');
    Route::put('/pemesanan/{id}/update-status', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');
    Route::get('/penyewa', [PenyewaController::class, 'index'])->name('penyewa.index');
    Route::get('/pelanggan/pemesanan', [PemesananController::class, 'pelangganIndex'])->name('pelanggan.pemesanan.index');
    Route::put('/pelanggan/pemesanan/{pemesanan_id}/batalkan', [PemesananController::class, 'batalkanPemesanan'])->name('pelanggan.pemesanan.batalkan');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    Route::put('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});
