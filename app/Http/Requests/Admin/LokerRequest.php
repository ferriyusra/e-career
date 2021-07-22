<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LokerRequest extends FormRequest
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
            'perusahaan_id'    => 'required|integer|exists:perusahaan,id',
            'lokasi_detail_lowongan'    => 'required|string',
            'posisi_lowongan'    => 'required|min:5',
            'deskripsi_lowongan' => 'required|min:5',
            'tipe_pekerjaan' => 'required',
            'kualifikasi_lowongan' => 'required|string|min:5',
            'cara_melamar' => 'required|min:5',
            'rentang_gaji_max' => 'required',
            'rentang_gaji_min' => 'required',
            'pendaftaran_mulai' => 'required',
            'pendaftaran_akhir' => 'required',
            'url_lamaran' => 'required',
        ];
    }
}
