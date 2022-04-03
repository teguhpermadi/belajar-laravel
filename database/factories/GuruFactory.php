<?php

namespace Database\Factories;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Guru::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement($array = array('laki-laki', 'perempuan')),
            'nik' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nip' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'niy' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'status_pegawai' => $this->faker->randomElement(['pns', 'gty', 'gtt']),
            'alamat' => $this->faker->address(),
            'provinsi_id' => Province::all()->random()->id,
            'kota_id' => City::all()->random()->id,
            'kecamatan_id' => District::all()->random()->id,
            'kelurahan_id' => Village::all()->random()->id,
        ];
    }
}
