<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PerusahaanRequest extends FormRequest
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
            'nama_perusahaan'    => 'required|min:5|max:255',
            'tentang_perusahaan' => 'required|min:5',
            'lokasi_perusahaan' => 'required|min:3|max:255',
            'gambar'             => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
