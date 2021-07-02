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
            'submission_id' => 'required',
            'file_type' => 'required',
            'report' => 'required|file|mimes:doc,docx,pdf|max:2048',
        ];
    }
    public function messages()
    {
        return[
            'report.required'  => 'Wajib upload file!',
            'report.mimes'     => 'Format file berupa doc/docx/pdf',
            'report.max'       => 'Ukuran file maksimal 2MB',
        ];
    }
}
