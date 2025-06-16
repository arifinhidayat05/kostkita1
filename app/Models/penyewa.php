<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyewa extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'penyewa'; // Nama tabel
    protected $fillable = [
        'pelanggan_id',
        'kamar_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'status'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
