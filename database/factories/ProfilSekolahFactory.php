<?php

namespace Database\Factories;

use App\Models\ProfilSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravolt\Indonesia\Models\Village;

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
            'kelurahan_id' => Village::all()->random()->id,
            'telp' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'kodepos' => $this->faker->postcode(),
            'website' => $this->faker->domainName(),
        ];
    }
}
