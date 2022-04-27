<?php

namespace Database\Seeders;

use App\Models\IdentitasUser;
use App\Models\User;
use Database\Factories\AlamatUserFactory;
use Database\Factories\NomorIdentitasUserFactory;
use Database\Factories\OrangTuaUserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()
            ->hasIdentitasUser()
            // ->has(AlamatUserFactory::factory())
            // ->has(NomorIdentitasUserFactory::factory())
            // ->has(OrangTuaUserFactory::factory())
            ->count(1)->create();
        // $user->assignRole('active', 'siswa');

    }
}
