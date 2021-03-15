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
            'upload' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            
        ];
    }
    public function messages()
    {
        return[
            'upload.required' => 'Wajib upload file!',
            'upload.mimes'    => 'Format file berupa jpeg/jpg/png/pdf',
            'upload.max'      => 'Ukuran file maksimal 2MB',
        ];
    }
}
