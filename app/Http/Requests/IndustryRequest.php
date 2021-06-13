<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustryRequest extends FormRequest
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
            'address' => 'required|max:255',
            'city' => 'required||max:255',
            'phone' => 'required|numeric|digits_between:10,14',
            'detail' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return[
            'name.required'         => '*Kolom nama wajib diisi!',
            'name.string'           => '*Kolom nama berisi teks!',
            'name.max'              => '*Maksimal 255 karakter!',
            'address.required'      => '*Kolom alamat wajib diisi!',
            'address.max'           => '*Maksimal 255 karakter!',
            'city.required'         => '*Kolom kota wajib diisi!',
            'city.max'              => '*Maksimal 255 karakter!',
            'phone.required'        => '*Kolom phone wajib diisi!',
            'phone.numeric'         => '*Hanya boleh diisi angka!',
            'phone.digits_between'  => '*Kolom berisi 10-14 digit!',
            'detail.required'       => '*Kolom link wajib diisi!',
            'detail.max'            => '*Maksimal 255 karakter!',
        ];
    }
}
