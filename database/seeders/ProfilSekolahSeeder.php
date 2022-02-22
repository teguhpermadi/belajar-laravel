<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfilSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProfilSekolah::factory(1)->create();
        
    }
}
