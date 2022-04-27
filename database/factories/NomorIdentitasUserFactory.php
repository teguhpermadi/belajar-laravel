<?php

namespace Database\Factories;

use App\Models\NomorIdentitasUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NomorIdentitasUser>
 */
class NomorIdentitasUserFactory extends Factory
{
    protected $model = NomorIdentitasUser::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nip' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'niy' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nuptk' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nisn' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ];
    }
}
