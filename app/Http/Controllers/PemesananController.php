<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PemesananController extends Controller
{
    // Tampilkan daftar pemesanan untuk pemilik kost yang login
    public function index()
    {
        $pemilikId = auth('pemilik')->id();

        $pemesananList = Pemesanan::with(['pelanggan', 'kamar.kost'])
            ->whereHas('kamar.kost', function ($query) use ($pemilikId) {
                $query->where('pemilik_id', $pemilikId);
            })
            ->get();

        // Debugging - bisa dihapus setelah verifikasi
        logger()->info('Pemilik ID: ' . $pemilikId);
        logger()->info('Jumlah Pemesanan: ' . $pemesananList->count());


        return view('admin.pemesanan.index', compact('pemesananList'));
    }
    // Proses pemesanan langsung tanpa input form
    public function pesanLangsung(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamar,kamar_id',
        ]);

        $pelangganId = auth('pelanggan')->id();

        $pemesanan = Pemesanan::create([
            'tanggal_pesan' => now()->format('Y-m-d'),
            'tanggal_masuk' => null,
            'tanggal_keluar' => null,
            'status_pemesanan' => 'belum di proses',
            'user_id' => $pelangganId,
            'kamar_id' => $request->kamar_id,
        ]);

        return redirect()->route('pelanggan.pemesanan.index')->with('success', 'Pemesanan berhasil dibuat!');
    }

    // Update status pemesanan, otomatis set tanggal masuk dan keluar saat diterima
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status_pemesanan' => 'required|in:diterima,dibatalkan,ditolak,belum di proses',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);

        // Handle rejected status
        if ($validated['status_pemesanan'] === 'ditolak') {
            $pemesanan->delete();
            return redirect()
                ->back()
                ->with('success', 'Pemesanan berhasil ditolak dan dihapus!');
        }

        // Update status for other cases
        $pemesanan->status_pemesanan = $validated['status_pemesanan'];

        // Handle dates based on new status
        if ($validated['status_pemesanan'] === 'diterima') {
            $pemesanan->tanggal_masuk = now()->addDay();
            $pemesanan->tanggal_keluar = now()->addDays(31); // 30 days after tomorrow
        } else {
            // Reset dates if status changes from 'diterima' to something else
            $pemesanan->tanggal_masuk = null;
            $pemesanan->tanggal_keluar = null;
        }

        $pemesanan->update();

        return redirect()
            ->back()
            ->with('success', 'Status pemesanan berhasil diperbarui!');
    }

    // =================================user pemesanan========================================
    public function pelangganIndex()
    {
        $pelangganId = auth('pelanggan')->id();

        $pemesanans = Pemesanan::with(['kamar.kost'])
            ->where('user_id', $pelangganId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Debug the first pemesanan's ID
        if ($pemesanans->count() > 0) {
            logger()->info('First pemesanan ID: ' . $pemesanans->first()->id);
        }

        return view('kost.pesanan', compact('pemesanans'));
    }

    public function batalkanPemesanan($pemesanan_id)
    {
        $pemesanan = Pemesanan::where('user_id', auth('pelanggan')->id())
            ->where('pemesanan_id', $pemesanan_id) // ← diubah dari 'id'
            ->firstOrFail();

        // Hanya bisa membatalkan jika status belum diproses
        if ($pemesanan->status_pemesanan !== 'belum di proses') {
            return back()->with('error', 'Hanya bisa membatalkan pemesanan yang belum diproses');
        }

        $pemesanan->update([
            'status_pemesanan' => 'dibatalkan',
            'tanggal_masuk' => null,
            'tanggal_keluar' => null
        ]);
        return redirect()->route('pelanggan.pemesanan.index')->with('success', 'Pemesanan berhasil dibatalkan   !');
    }
}
