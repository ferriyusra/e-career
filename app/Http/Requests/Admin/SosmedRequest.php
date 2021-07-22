<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SosmedRequest extends FormRequest
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
            'perusahaan_id'      => 'required|integer|exists:perusahaan,id',
            'url_sosial_media'           => 'required|string|max:255|unique:sosmed_perusahaan',
            'jenis_sosial_media'         => 'required',
        ];
    }
}
