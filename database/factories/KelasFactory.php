<?php

namespace Database\Factories;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        switch (env('JENJANG_SEKOLAH')) {
            case 'sma':
                $level = ['10', '11', '12'];
                break;
            case 'smp':
                $level = ['7', '8', '9'];
                break;
            case 'sd':
                $level = ['1', '2', '3', '4', '5', '6'];
                break;
            case 'tk':
                $level = ['a', 'b'];
                break;
        }

        return [
            'nama' => $this->faker->bothify('kelas ##??'),
            'tahun_id' => Tahun::all()->random(),
            'user_id' => User::role('guru')->get()->random()->id,
            'level' => $this->faker->randomElement($level),
        ];
    }
}
