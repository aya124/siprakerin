<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'submission_id' => 'required|sometimes',
            'report' => 'required|file|mimes:doc,docx,pdf|max:4096|sometimes',
            'report2' => 'required|file|mimes:jpeg,jpg,png,pdf|max:1024|sometimes'
        ];
    }
    public function messages()
    {
        return[
            'report.required'  => 'Wajib upload file!',
            'report.mimes'     => 'Format file berupa doc/docx/pdf',
            'report.max'       => 'Ukuran file maksimal 4MB',
            'report2.required' => 'Wajib upload file!',
            'report2.mimes'    => 'Format file berupa jpeg/jpg/png/pdf',
            'report2.max'      => 'Ukuran file maksimal 1MB',
        ];
    }
}
