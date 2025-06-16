<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    // Menampilkan ulasan untuk suatu kost
    public function show($kost_id)
    {
        $kost = Kost::with('ulasan.pelanggan')->findOrFail($kost_id);
        $ratingRata = $kost->ulasan->avg('rating');

        return view('kost.ulasan', [
            'kost' => $kost,
            'ulasan' => $kost->ulasan,
            'ratingRata' => $ratingRata,
        ]);
    }

    // Menyimpan ulasan dari pelanggan
    public function store(Request $request)
    {
        // dd(auth('pelanggan')->user());
        // dd('$request->all()'); // Debugging untuk melihat data yang dikirim

        $request->validate([
            'kost_id' => 'required|exists:kost,kost_id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
            // 'pelanggan_id' => 'required|exists:pelanggan,user_id',
        ]);

        $pelangganId = auth('pelanggan')->id(); // ambil id pelanggan login (langsung value, bukan array)
        Ulasan::create([
            'kost_id' => $request->kost_id,
            'pelanggan_id' => $pelangganId,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('kost.show', $request->kost_id)->with('success', 'Ulasan berhasil dikirim.');
    }
}
