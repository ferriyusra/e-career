<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    protected $table = 'kategori_berita';

    protected $fillable = [
        'kategori_berita'
    ];

    protected $hidden = [];


    public function kategori_berita(){
        return $this->hasOne(KategoriBerita::class, 'kategori_id', 'id');
    }

}
