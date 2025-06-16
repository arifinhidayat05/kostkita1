<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel yang terkait dengan model
     */
    protected $table = 'user';

    /**
     * Primary key untuk model
     */
    protected $primaryKey = 'user_id';

    /**
     * Kolom yang bisa diisi (mass assignable)
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * Kolom yang harus disembunyikan saat di-serialize
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Mutator untuk meng-hash password sebelum disimpan
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Relasi atau method lain bisa ditambahkan di bawah ini
     */
}
