<?php

namespace App\Http\Requests;

use App\Rules\YearValidation;
use Illuminate\Foundation\Http\FormRequest;

class TahunRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tahun' => ['required', new YearValidation()],
            'semester' => 'required',
            'tanggal_awal' => 'date',
            'user_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'tanggal_awal' => 'tanggal awal',
            'user_id' => 'Kepala Sekolah',
        ];
    }
}
