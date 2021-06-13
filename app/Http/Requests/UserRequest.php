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
            'email' => 'required|string|email|max:255|unique:users,email,'.\Request::instance()->hidden_id,
            'password' => 'sometimes|required|string|min:8',
            'username' => 'required|unique:users,username,'.\Request::instance()->hidden_id,
            'gender' => 'required|in:male,female',
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'     => '*Nama wajib diisi!',
            'name.string'       => '*Kolom Nama berisi teks',
            'name.max'          => '*Maksimal 255 karakter!',
            'email.required'    => '*Email wajib diisi!',
            'email.string'      => '*Kolom email berisi teks',
            'email.email'       => '*Format email salah!',
            'email.max'         => '*Maksimal 255 karakter!',
            'email.unique'      => '*Email sudah terdaftar!',
            'password.required' => '*Password wajib diisi!',
            'password.string'   => '*Kolom Password berisi teks',
            'password.min'      => '*Jumlah karakter minimal 8!',
            'username.required' => '*Username wajib diisi!',
            'username.unique'   => '*Username sudah terdaftar!',
            'gender.required'   => '*Jenis Kelamin wajib dipilih!',
            'role.required'     => '*Role wajib dipilih!',
        ];
    }
}
