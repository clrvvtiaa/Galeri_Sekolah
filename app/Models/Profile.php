<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'profiles';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'judul',
        'isi',
    ];

    // Jika Anda memiliki relasi, Anda bisa mendefinisikannya di sini
    // Contoh: Jika Profile memiliki relasi dengan User
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}