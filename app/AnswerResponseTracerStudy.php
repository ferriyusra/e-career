<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TracerStudy;

class AnswerResponseTracerStudy extends Model

{

    protected $table = 'response_kuisioner';

    // protected $guarded = ['id'];
    // protected $fillable =['id_mhs', 'soal_kuisioner', 'jawaban_response'];
    // protected $fillable =['id_mhs', 'soal_kuisioner', 'jawaban_pilihan', 'jawaban_essai',];
    protected $fillable = ['id_mhs', 'soal_kuisioner', 'jawaban'];

    public function responseNameMhs(){
        return $this->belongsTo(TracerStudy::class, 'id_mhs', 'id');
    }
}
