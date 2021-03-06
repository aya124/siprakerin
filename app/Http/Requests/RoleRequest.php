<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'display' => 'required|string|max:255',
            'p' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'    => '*Kolom Role Name wajib diisi!',
            'name.string'      => '*Kolom berisi teks',
            'name.max'         => '*Maksimal 255 karakter!',
            'display.required' => '*Kolom Display Name wajib diisi!',
            'display.string'   => '*Kolom berisi teks',
            'display.max'      => '*Maksimal 255 karakter!',
            'p.required'       => '*Permission wajib dipilih!',
        ];
    }
}
