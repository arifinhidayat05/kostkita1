<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kost;
use App\Models\GambarKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KamarController extends Controller
{
    public function pesanKamar($id)
    {
        $kamar = Kamar::with('kost')->findOrFail($id);
        return view('kost.kamar', compact('kamar'));
    }

    public function index()
    {
        // Ambil semua kost beserta kamar-kamarnya
        $pemilikId = auth('pemilik')->id();
        $kosts = Kost::where('pemilik_id', $pemilikId)->get();
        return view('admin.kamar.index', compact('kosts'));
    }


    public function updateStatus(Request $request, Kamar $kamar)
    {
        $request->validate([
            'status_kamar' => 'required|in:tersedia,tidak tersedia',
        ]);

        $kamar->status_kamar = $request->status_kamar;
        $kamar->save();

        return response()->json(['message' => 'Status kamar berhasil diperbarui']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemilikId = auth('pemilik')->id();
        $kosts = Kost::where('pemilik_id', $pemilikId)->get(); // hanya kost milik pemilik login

        return view('admin.kamar.create', compact('kosts'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kamar' => 'required|string',
            'fasilitas' => 'required|string',
            'harga' => 'required|numeric',
            'status_kamar' => 'required|in:tersedia,tidak tersedia',
            'deskripsi' => 'required|string',
            'kost_id' => 'required|exists:kost,kost_id',
            'gambar' => '|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();

            // Pindahkan ke folder public/gambar_kamar
            $file->move(public_path('gambar_kamar'), $namaFile);

            // Simpan path relatif ke database
            $validated['gambar'] = 'gambar_kamar/' . $namaFile;
        }


        Kamar::create($validated);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kamar $kamar, $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kosts = Kost::all(); // ambil semua kost untuk dropdown
        return view('admin.kamar.edit', compact('kamar', 'kosts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kamar $kamar)
    {
        $validated = $request->validate([
            'nama_kamar' => '|string',
            'fasilitas' => 'string',
            'harga' => 'numeric',
            'status_kamar' => 'in:tersedia,tidak tersedia',
            'deskripsi' => 'string',
            'kost_id' => 'exists:kost,kost_id',
            'gambar' => '|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();

            // Pindahkan ke folder public/gambar_kamar
            $file->move(public_path('gambar_kamar'), $namaFile);

            // Simpan path relatif ke database
            $validated['gambar'] = 'gambar_kamar/' . $namaFile;
        }


        $kamar = Kamar::findOrFail($request->id);
        $kamar->update($validated);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kamar $kamar, $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
