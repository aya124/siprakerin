<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionRequest extends FormRequest
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
            'name' => 'required|sometimes',
            'start_date' => 'required|date|sometimes',
            'finish_date' => 'required|date|after:start_date|sometimes',
            'upload' => 'required|mimes:jpeg,jpg,png,pdf|max:2048|file|sometimes',

        ];
    }
    public function messages()
    {
        return[
            'name.required'   => 'Kolom nama industri harus diisi!',
            'startdate.required' => 'Kolom tanggal mulai harus diisi!',
            'finishdate.required' => 'Kolom tanggal selesai harus diisi!',
            'finishdate.after'  => 'Tanggal selesai tidak sesuai!',
            'upload.required' => 'Wajib upload file!',
            'upload.mimes'    => 'Format file berupa jpeg/jpg/png/pdf',
            'upload.max'      => 'Ukuran file maksimal 2MB',
        ];
    }
}
