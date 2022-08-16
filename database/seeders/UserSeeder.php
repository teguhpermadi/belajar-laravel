<?php

namespace Database\Seeders;

use App\Models\AlamatUser;
use App\Models\IdentitasUser;
use App\Models\NomorIdentitasUser;
use App\Models\OrangTuaUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

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
            ->has(OrangTuaUser::factory())
            ->create();
        $user->assignRole('user');
    }
}
