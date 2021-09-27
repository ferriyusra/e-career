<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\JawabanKuisioner;
// use App\Kuisioner;

use App\AnswerResponseTracerStudy;

class TracerStudy extends Model
{

    protected $table = 'response_mahasiswa';

    // protected $guarded = ['id'];
    protected $fillable =['nama_mahasiswa', 'npm_mahasiswa', 'tempat_lahir_mahasiswa', 
                        'tgl_lahir_mahasiswa', 'nik_mahasiswa', 'npwp_mahasiswa', 'no_telp_mahasiswa',
                        'email_mahasiswa', 'tahun_lulus', 'program_studi'];



    public function responseAnswer(){
        return $this->hasMany(AnswerResponseTracerStudy::class, 'id_mhs', 'id');
    }

}


