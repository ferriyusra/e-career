<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sosmed;
use App\Loker;

class Perusahaan extends Model
{
    // use SoftDeletes;

    protected $table = 'perusahaan';

    protected $fillable = [
        'nama_perusahaan', 'tentang_perusahaan', 'lokasi_perusahaan', 'gambar'
    ];

    public function loker(){
        return $this->hasMany(Loker::class, 'perusahaan_id', 'id');
        // return $this->hasMany(Loker::class, 'perusahaan_id', 'id');
    }


}
