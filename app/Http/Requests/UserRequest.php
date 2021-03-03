<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'username' => 'required|unique:users',
        ];
    }
    public function messages()
    {
        return[
            'name.required'     => '*Kolom nama wajib diisi',
            'name.string'       => '*Kolom nama berisi teks',
            'name.max'          => '*Kolom nama maks 255 karakter',
            'email.required'    => '*Kolom email wajib diisi',
            'email.string'      => '*Kolom email berisi teks',
            'email.email'       => '*Kolom email wajib berformat email',
            'email.max'         => '*Kolom email maks 255 karakter',
            'email.unique'      => '*Email sudah terdaftar',
            'password.required' => '*Kolom password wajib diisi',
            'password.string'   => '*Kolom password berisi teks',
            'password.min'      => '*Jumlah karakter minimal 8',
            'username.required' => '*Kolom wajib diisi',
            'username.unique'   => '*Username sudah terdaftar',
        ];
    }
}
