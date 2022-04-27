<?php

namespace Database\Factories;

use App\Models\OrangTuaUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrangTuaUser>
 */
class OrangTuaUserFactory extends Factory
{
    protected $model = OrangTuaUser::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_ayah' => $this->faker->name($gender = 'male'),
            'pekerjaan_ayah' => $this->faker->jobTitle(),
            'penghasilan_ayah' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nama_ibu' => $this->faker->name($gender = 'female'),
            'pekerjaan_ibu' => $this->faker->jobTitle(),
            'penghasilan_ibu' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nama_wali' => $this->faker->name($gender = 'male' | 'female'),
            'pekerjaan_wali' => $this->faker->jobTitle(),
            'penghasilan_wali' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ];
    }
}
