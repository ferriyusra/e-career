<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kuisioner;
use App\TracerStudy;

class JawabanKuisioner extends Model
{

    protected $table = 'kuisioner_jawaban';

    protected $guarded = ['id'];

    public function soalKuisioner(){
        return $this->belongsTo(Kuisioner::class, 'id_kuisioner', 'id');
    }

    public function hasilJawabanMahasiswa(){
        return $this->hasOne(TracerStudy::class, 'id_jawaban', 'id');
    }

}


