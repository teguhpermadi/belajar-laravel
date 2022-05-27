<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlamatUserRequest extends FormRequest
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
            // 'user_id',
            'alamat' => 'required',
            'kodepos'=> 'required',
            'provinsi_id'=> 'required',
            'kota_id'=> 'required',
            'kecamatan_id'=> 'required',
            'kelurahan_id'=> 'required',
            // 'long',
            // 'lat',
        ];
    }
}
