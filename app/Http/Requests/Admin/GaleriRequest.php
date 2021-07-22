<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GaleriRequest extends FormRequest
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
            'judul_kegiatan'      => 'required|min:10|max:255',
            'isi_kegiatan'         => 'required|min:10|max:255',
            'gambar'               => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
