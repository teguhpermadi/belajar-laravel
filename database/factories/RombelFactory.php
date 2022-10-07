<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rombel>
 */
class RombelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kelas_id' => Kelas::all()->random()->id,
            'user_id' => User::where('is_active', '1')->role('pd')->get()->random()->id,
        ];
    }
}
