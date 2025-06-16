<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Models\Ulasan;
use App\Models\Pemesanan;


class Pelanggan extends Authenticatable
{
    use HasFactory;

    protected $table = 'pelanggan'; // Nama tabel

    protected $primaryKey = 'user_id'; // Primary key custom (pastikan nama kolom benar)

    protected $fillable = [
        'google_id',
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public $timestamps = true; // timestamps aktif (created_at dan updated_at)

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'user_id', 'user_id');
    }
}
