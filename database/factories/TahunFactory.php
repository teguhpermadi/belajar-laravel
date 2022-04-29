<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::role(['active', 'guru'])->get()->random()->id,
        ];
    }
}
