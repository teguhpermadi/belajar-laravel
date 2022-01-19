<?php

namespace Database\Factories;

use App\Models\ProfilSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfilSekolahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfilSekolah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->company(),
            'npsn' => $this->faker->randomNumber($nbDigits = 8, $strict = false),
            'alamat' => $this->faker->address(),
            'provinsi' => $this->faker->state(),
            'kota' => $this->faker->city(),
            'kecamatan' => $this->faker->citySuffix(),
            'kelurahan' => $this->faker->streetSuffix(),
            'telp' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'kodepos' => $this->faker->postcode(),
            'website' => $this->faker->domainName(),
        ];
    }
}
