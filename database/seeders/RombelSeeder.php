<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Rombel;
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
        Rombel::factory()->count(20)->create();
    }
}
