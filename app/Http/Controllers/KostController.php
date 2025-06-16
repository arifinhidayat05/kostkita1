<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemilik; // Pastikan model Pemilik sudah ada
use App\Models\Ulasan; // 

class KostController extends Controller
{
    // Menampilkan daftar kost
    public function indexkost()
    {
        $kosts = Kost::all(); // Mengambil semua data kost
        return view('kost.index', compact('kosts'));
    }

    // Menampilkan kamar berdasarkan kost_id
    public function showKamar($kost_id)
    {
        $kost = Kost::with(['ulasan.pelanggan', 'kamars'])->findOrFail($kost_id);

        // Hitung rating rata-rata
        $ratingRata = $kost->ulasan->avg('rating') ?? 0;

        return view('kost.detail', [
            'kost' => $kost,
            'kamars' => $kost->kamars,
            'ratingRata' => $ratingRata // Pastikan ini dikirim ke view
        ]);
    }
    public function showkost($id)
    {
        $kost = Kost::findOrFail($id);
        $kamar = Kamar::where('kost_id', $id)->get();

        return view('kost.detail', compact('kost', 'kamar'));
    }

    public function index()
    {
        $pemilikId = auth('pemilik')->id(); // ambil id pemilik yang login
        $kosts = Kost::where('pemilik_id', $pemilikId)->get(); // filter kost sesuai pemilik_id

        return view('admin.index', compact('kosts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kost' => 'required|max:255',
            'alamat' => 'required|max:255',
            'lokasi' => 'nullable|max:255',
            'deskripsi' => 'nullable|string',
            'fasilitas' => 'nullable|string',
            'No_Wa' => 'nullable|max:15',
            'Email' => 'nullable|email|max:255',
            'Telepon' => 'nullable|max:15',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|in:putra,putri,campur',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Ambil semua input kecuali 'gambar'
        $data = $request->except('gambar');

        // Tambahkan pemilik_id dari yang login
        $data['pemilik_id'] = auth('pemilik')->id();

        // Handle file upload ke public/images/kost
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

            // Simpan ke folder public/images/kost
            $file->move(public_path('images/kost'), $filename);

            // Simpan path relatif ke database
            $data['gambar'] = 'images/kost/' . $filename;
        }

        // Simpan ke database
        Kost::create($data);

        return redirect()->route('kost.index')->with('success', 'Data kost berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(kost $kost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kost = Kost::findOrFail($id);
        return view("admin.edit", compact('kost'));
        // dd($kost);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kost' => 'nullable|max:255',
            'alamat' => 'nullable|max:255',
            'lokasi' => 'nullable|max:255',
            'deskripsi' => 'nullable|string',
            'fasilitas' => 'nullable|string',
            'No_Wa' => 'nullable|max:15',
            'Email' => 'nullable|email|max:255',
            'Telepon' => 'nullable|max:15',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the kost to update
        $kost = Kost::findOrFail($id);
        $data = $request->except('gambar');

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($kost->gambar && file_exists(public_path($kost->gambar))) {
                unlink(public_path($kost->gambar));
            }

            $file = $request->file('gambar');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('images/kost'), $filename);
            $data['gambar'] = 'images/kost/' . $filename;
        }

        // Update the kost record
        $kost->update($data);

        return redirect()->route('kost.index')->with('success', 'Data kost berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(kost $kost, $id)
    {
        $kost = Kost::findOrFail($id);

        // Delete the kost record
        $kost->delete($kost);

        return redirect()->route('kost.index')->with('success', 'Data kost berhasil dihapus');
    }
}
