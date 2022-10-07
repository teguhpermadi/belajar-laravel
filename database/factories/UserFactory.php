<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Village;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $village = Village::all()->random();
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->unique()->userName(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'fullname' => $this->faker->name(),
            'nickname' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'jenis_kelamin' => $this->faker->randomElement($array = array('l', 'p')),
            'tanggal_lahir' => $this->faker->date(),
            'tempat_lahir' => City::all()->random()->id,
            'alamat' => $this->faker->address(),
            'kelurahan_id' => $village->id,
            'kodepos' => $village->meta['pos'],
            // 'is_active' => $this->faker->randomElement(['1','0']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
