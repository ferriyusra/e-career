<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
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
            'kategori_id'      => 'required|integer|exists:kategori_berita,id',
            'judul_berita'         => 'required|min:10|max:255',
            'isi_berita'           => 'required',
            'gambar'               => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            // 'gambar'               => 'required|image',
        ];
    }
}
