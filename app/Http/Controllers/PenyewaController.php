<?php

namespace App\Http\Controllers;

use App\Models\penyewa;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewas = Penyewa::with(['pelanggan', 'kamar.kost'])->get();
        return view('admin.penyewa.index', compact('penyewas'));
    }
}
