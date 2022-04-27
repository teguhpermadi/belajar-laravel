<?php

namespace Database\Factories;

use App\Models\IdentitasUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdentitasUser>
 */
class IdentitasUserFactory extends Factory
{
    protected $model = IdentitasUser::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'fullname' => $this->faker->name(),
            'nickname' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'jenis_kelamin' => $this->faker->randomElement($array = array('l', 'p')),
            'tanggal_lahir' => $this->faker->date(),
            'tempat_lahir' => $this->faker->city(),
        ];
            
    }
}
