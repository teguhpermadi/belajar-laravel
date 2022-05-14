<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class YearValidation implements ImplicitRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // return [
        //     'year' => 'required|digits:4|integer|min:2000|max:'.(date('Y')+1),
        // ];
        return $value >= 2000 && $value <= date('Y');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tahun pelajaran harus berisi antara tahun 2000 sampai dengan sekarang.';
    }
}
