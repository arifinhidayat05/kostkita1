<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $primaryKey = 'kamar_id';

    protected $fillable = [
        'nama_kamar',
        'fasilitas',
        'harga',
        'status_kamar',
        'deskripsi',
        'gambar',
        'kost_id',
    ];

    // Relasi: Kamar dimiliki oleh satu Kost
    public function kost()
    {
        return $this->belongsTo(Kost::class, 'kost_id', 'kost_id');
    }


    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'kamar_id', 'kamar_id');
    }
}
