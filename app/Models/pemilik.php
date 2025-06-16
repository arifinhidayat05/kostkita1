<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilik extends Authenticatable
{
    use HasFactory;

    protected $table = 'pemilik';

    protected $fillable = [
        'google_id',
        'nama',
        'email',
        'role',
        // 'foto' // Tambahkan jika kolom foto diaktifkan
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $attributes = [
        'role' => 'pemilik' // Nilai default
    ];

    public function kosts()
    {
        return $this->hasMany(Kost::class, 'pemilik_id', 'pemilik_id');
    }
}
