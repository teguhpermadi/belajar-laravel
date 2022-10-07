<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GuruRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'unique:username',
            'email' => 'email',
            'password' => 'min:6',
            'fullname' => 'required',
            'nickname' => 'required',
            'avatar' => 'image',
            'ttd' => 'image',
            'phone' => 'numeric',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required|exists:indonesia_cities,id',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'kodepos' => 'required|postal_code:ID',
            'kelurahan_id' => 'required|exists:indonesia_villages,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'postal_code' => 'Masukkan kodepos wilayah Indonesia',
        ];
    }
}
