<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan'; // Tambahkan ini supaya pakai tabel yang benar
    protected $primaryKey = 'pemesanan_id';

    protected $fillable = [
        'status_pemesanan',
        'user_id',
        'kamar_id',
    ];

    protected $casts = [
        'tanggal_pesan' => 'datetime',
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date'
    ];


    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'user_id', 'user_id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id', 'kamar_id');
    }
}
