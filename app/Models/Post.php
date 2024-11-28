<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mendefinisikan field yg boleh di isi
    protected $fillable = ['title', 'content', 'category_id', 'petugas_id', 'status'];

    // relasi post ke kategori one to one
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // POst ke petugas
    public function petugas() {
        return $this->belongsTo(Petugas::class);
    }

    // Post ke gallery
    public function galleries(){
        return $this->hasMany(Gallery::class);
    }
}
