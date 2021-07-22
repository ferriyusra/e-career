<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    // use SoftDeletes;

    protected $table = 'berita';

    protected $fillable = [
        'kategori_id', 'judul_berita', 'slug', 'isi_berita', 'gambar'
    ];

    protected $hidden = [];

    public function berita() {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'id');
    }
    
}
