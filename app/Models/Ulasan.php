<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';
    protected $fillable = ['kost_id', 'pelanggan_id', 'rating', 'komentar'];

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'kost_id', 'kost_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'user_id');
    }
}
