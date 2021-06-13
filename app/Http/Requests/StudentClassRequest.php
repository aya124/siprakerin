<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentClassRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'accro' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return[
            'name.required'   => '*Nama Kelas wajib diisi!',
            'name.string'     => '*Kolom berisi teks',
            'name.max'        => '*Maksimal 255 karakter!',
            'accro.required'  => '*Akronim wajib diisi!',
            'accro.string'    => '*Kolom berisi teks',
            'accro.max'       => '*Maksimal 255 karakter!',
        ];
    }
}
