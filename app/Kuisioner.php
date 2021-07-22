<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JawabanKuisioner;

class Kuisioner extends Model
{

    protected $table = 'soal_kuisioner';

    protected $guarded = ['id'];

    public function JawabanKuisioner(){
        return $this->hasMany(JawabanKuisioner::class, 'id_kuisioner', 'id');
    }

    public function soalJawabanKuisionerMahasiswa(){
        return $this->hasOne(JawabanKuisioner::class, 'id_kuisioner', 'id');
    }

}


