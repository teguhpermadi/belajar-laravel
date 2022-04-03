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
        return [
            'user_id' => User::factory()->create()->id,
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->randomElement($array = array('laki-laki', 'perempuan')),
            'nik' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nisn' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'asal_sekolah' => $this->faker->word(),
            'alamat' => $this->faker->address(),
            
            'provinsi_id' => Province::all()->random()->id,
            'kota_id' => City::all()->random()->id,
            'kecamatan_id' => District::all()->random()->id,
            'kelurahan_id' => Village::all()->random()->id,
            
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
