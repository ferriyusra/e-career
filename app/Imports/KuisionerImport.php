<?php

namespace App\Imports;

use App\Kuisioner;
use Maatwebsite\Excel\Concerns\ToModel;

class KuisionerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kuisioner([
            'soal_kuisioner' => $row[0],
            'tipe_soal' => $row[1],
        ]);
    }
}
