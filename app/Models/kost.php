<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'kost';

    /**
     * Kolom primary key.
     *
     * @var string
     */
    protected $primaryKey = 'kost_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Tipe data primary key.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Kolom yang bisa diisi massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = [
        'pemilik_id',
        'nama_kost',
        'alamat',
        'lokasi',
        'deskripsi',
        'fasilitas',
        'No_Wa',
        'Email',
        'Telepon',
        'gambar',
        'kategori',
    ];


    /**
     * Kolom yang harus disembunyikan dari array/JSON.
     *
     * @var array
     */
    protected $hidden = [
        // Tambahkan kolom yang ingin disembunyikan jika diperlukan
    ];

    /**
     * Kolom yang harus di-cast ke tipe data tertentu.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function kamars()
    {
        return $this->hasMany(Kamar::class, 'kost_id', 'kost_id');
    }

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'pemilik_id', 'pemilik_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'kost_id', 'kost_id');
    }
}
