<?php

namespace Database\Factories;

use App\Models\AlamatUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlamatUser>
 */
class AlamatUserFactory extends Factory
{
    protected $model = AlamatUser::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'alamat' => $this->faker->address(),
            'provinsi_id' => Province::all()->random()->id,
            'kota_id' => City::all()->random()->id,
            'kecamatan_id' => District::all()->random()->id,
            'kelurahan_id' => Village::all()->random()->id,
            'long' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
        ];
    }
}
