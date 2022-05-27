<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdentitasUserRequest extends FormRequest
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
            'fullname' => 'required',
            'nickname' => 'required',
            // 'avatar',
            // 'phone',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ];
    }
}
