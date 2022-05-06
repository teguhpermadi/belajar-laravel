<?php

namespace Database\Seeders;

use App\Models\AlamatUser;
use App\Models\IdentitasUser;
use App\Models\NomorIdentitasUser;
use App\Models\OrangTuaUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            # code...
            $user = User::factory()
                ->has(IdentitasUser::factory())
                ->has(AlamatUser::factory())
                ->has(NomorIdentitasUser::factory())
                ->has(OrangTuaUser::factory())
                ->create();
            $user->assignRole('guru');
        }
    }
}
