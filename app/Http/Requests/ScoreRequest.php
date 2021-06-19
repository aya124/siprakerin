<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScoreRequest extends FormRequest
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
            'score_1' => 'numeric|between:0,100',
            'score_2' => 'numeric|between:0,100',
            'score_3' => 'numeric|between:0,100',
            'score_4' => 'numeric|between:0,100',
            'score_5' => 'numeric|between:0,100',
            'score_6' => 'numeric|between:0,100',
            'score_7' => 'numeric|between:0,100',
            'score_8' => 'numeric|between:0,100',
            'score_9' => 'numeric|between:0,100',
            'score_a' => 'required',
            'score_b' => 'required',
            'score_c' => 'required',
            'score_d' => 'required',
            'score_e' => 'required',
            'submission_id' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'score_1.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_2.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_3.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_4.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_5.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_6.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_7.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_8.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_9.numeric'   => '*Kolom hanya berisi angka skala 100',
            'score_1.between'   => '*Kolom diisi angka 0-100!',
            'score_2.between'   => '*Kolom diisi angka 0-100!',
            'score_3.between'   => '*Kolom diisi angka 0-100!',
            'score_4.between'   => '*Kolom diisi angka 0-100!',
            'score_5.between'   => '*Kolom diisi angka 0-100!',
            'score_6.between'   => '*Kolom diisi angka 0-100!',
            'score_7.between'   => '*Kolom diisi angka 0-100!',
            'score_8.between'   => '*Kolom diisi angka 0-100!',
            'score_9.between'   => '*Kolom diisi angka 0-100!',
            'score_a.required'  => '*Nilai belum dipilih!',
            'score_b.required'  => '*Nilai belum dipilih!',
            'score_c.required'  => '*Nilai belum dipilih!',
            'score_d.required'  => '*Nilai belum dipilih!',
            'score_e.required'  => '*Nilai belum dipilih!',
        ];
    }
}
