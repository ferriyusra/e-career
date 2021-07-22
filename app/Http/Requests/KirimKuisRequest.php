<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class KirimKuisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'soal_kuisioner.*'          => 'required|array|exists:response_kuisioner,soal_kuisioner',
            'jawaban_pilihan.*'         => 'required|array|exists:response_kuisioner,jawaban_pilihan',
            'jawaban_essai.*'           => 'required|array|exists:response_kuisioner,jawaban_essai',
            'nama_mahasiswa'            => 'required',
            'npm_mahasiswa'             => 'required|integer|digits:8',
            'tempat_lahir_mahasiswa'    => 'required|string|max:50',
            'tgl_lahir_mahasiswa'       => 'required',
            'nik_mahasiswa'             => 'required|integer|digits:16',
            'npwp_mahasiswa'            => 'required|integer',
            'no_telp_mahasiswa'         => 'required|digits_between:10,12',
            'email_mahasiswa'           => 'required|string|email',
            'tahun_lulus'               => 'required',
            'program_studi'             => 'required',
        ];
    }
    // protected function failedValidation(Validator $validator)
    // {
    
    //     throw new HttpResponseException(response()->json($validator->errors(), 422)); 
    // }
}
