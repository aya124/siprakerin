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
            'phone' => 'required|digits_between:10,14',
            'detail' => 'required|max:255',
            
        ];
    }
    public function messages()
    {
        return[
            'name.required'         => '*Nama Industri wajib diisi!',
            'name.string'           => '*Kolom Nama Industri berisi teks!',
            'name.max'              => '*Maksimal 255 karakter!',
            'address.required'      => '*Alamat wajib diisi!',
            'address.max'           => '*Maksimal 255 karakter!',
            'city.required'         => '*Kota wajib diisi!',
            'city.max'              => '*Maksimal 255 karakter!',
            'phone.required'        => '*Phone wajib diisi!',
            // 'phone.numeric'         => '*Hanya boleh diisi angka dan tanpa spasi!',
            'phone.digits_between'  => '*Hanya boleh diisi dengan angka antara 10-14 digit dan tanpa spasi atau simbol!',
            'detail.required'       => '*Link wajib diisi!',
            'detail.max'            => '*Maksimal 255 karakter!',
    
        ];
    }
}
