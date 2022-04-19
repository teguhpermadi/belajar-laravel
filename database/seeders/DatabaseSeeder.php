<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // ProfilSekolahSeeder::class,
            RolesAndPermissionsSeeder::class,
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
            SiswaSeeder::class,
            GuruSeeder::class,
            KelasSeeder::class,
            TahunSeeder::class,
        ]);
    }
}
