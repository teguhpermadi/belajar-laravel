<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            Rombel::firstOrCreate([
                'kelas_id' => Kelas::all()->random()->id,
                'user_id' => User::where('is_active', '1')->role('pd')->get()->random()->id,
            ]);
        }
    }
}
