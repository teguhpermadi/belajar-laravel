<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            // identitas user
            // 'user_id',
            'fullname' => 'required',
            'nickname' => 'required',
            // 'avatar',
            // 'phone',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',

            // alamat user
            // 'user_id',
            'alamat' => 'required',
            // 'kodepos'=> 'required',
            'provinsi_id'=> 'required',
            'kota_id'=> 'required',
            'kecamatan_id'=> 'required',
            'kelurahan_id'=> 'required',
            // 'long',
            // 'lat',
        ];
    }
}
