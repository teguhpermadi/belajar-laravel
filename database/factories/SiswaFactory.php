<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Siswa::class;

    public function definition()
    {
        // $user = User::factory()->create();
        // $user->assignRole('active', 'siswa');
        return [
            // 'user_id' => $user->id,
            'nik' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nisn' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'asal_sekolah' => $this->faker->word(),
            

            // 'created_at' => now()->toDateTimeString(),
            // 'updated_at' => now()->toDateTimeString(),
        ];
    }
}
