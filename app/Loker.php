<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perusahaan;

class Loker extends Model
{

    protected $table = 'loker';

    protected $guarded = ['id'];

    public function lokerPerusahaan(){
        // dd($this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id'));
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id', 'id');
    }

}


