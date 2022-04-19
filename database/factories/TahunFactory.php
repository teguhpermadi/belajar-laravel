<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

class TahunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun' => $this->faker->year($max = 'now'),
            'semester' => $this->faker->randomElement(['ganjil', 'genap']),
            'tanggal_awal' => $this->faker->date(),
            'kepala_sekolah' => Guru::all()->random()->id,
        ];
    }
}
