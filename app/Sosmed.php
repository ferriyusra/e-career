<?php

namespace App;

use App\Perusahaan;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $table = 'sosmed_perusahaan';

    protected $fillable = [
        'perusahaan_id', 'url_sosial_media', 'jenis_sosial_media',
    ];

    public function perusahaan(){

        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id');

    }

}
