<?php

namespace Database\Seeders;

use App\Models\AlamatUser;
use App\Models\IdentitasUser;
use App\Models\NomorIdentitasUser;
use App\Models\OrangTuaUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 5; $i++) { 
            # code...
            $user = User::factory()
                ->has(OrangTuaUser::factory())
                ->create();
            $user->assignRole('user','pd');
        }
        
        // $students = Siswa::factory()->count(3)->hasUser()->create();
        // $chunks = array_chunk($students, 1);
        // foreach ($chunks as $chunk) {
        //     Siswa::insert($chunk);
        // }

        //$students = Siswa::factory()->count(5)->create();
        // foreach ($students as $student) {
        //     $student->assignRole('active','siswa');
        // }
        // $faker = Faker::create('id_ID');
        // $data = [];
        // $user = User::factory()->create();
        // $user->assignRole('active', 'siswa');
        // $provinsi = collect(Province::all()->modelKeys());
        // $kota = collect(City::all()->modelKeys());
        // $kec = collect(District::all()->modelKeys());
        // $kel = collect(Village::all()->modelKeys());

        // for ($i = 0; $i < 100; $i++) {
        //     $data[] = [
        //         'user_id' => $user->id,
        //         'tempat_lahir' => $faker->city(),
        //         'tanggal_lahir' => $faker->date(),
        //         'jenis_kelamin' => $faker->randomElement($array = array('laki-laki', 'perempuan')),
        //         'nik' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        //         'nisn' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        //         'asal_sekolah' => $faker->word(),
        //         'alamat' => $faker->address(),

        //         'provinsi_id' => $provinsi->random(),
        //         'kota_id' => $kota->random(),
        //         'kecamatan_id' => $kec->random(),
        //         'kelurahan_id' => $kel->random(),

        //         'nama_ayah' => $faker->name($gender = 'male'),
        //         'pekerjaan_ayah' => $faker->jobTitle(),
        //         'penghasilan_ayah' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        //         'nama_ibu' => $faker->name($gender = 'female'),
        //         'pekerjaan_ibu' => $faker->jobTitle(),
        //         'penghasilan_ibu' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        //         'nama_wali' => $faker->name($gender = 'male' | 'female'),
        //         'pekerjaan_wali' => $faker->jobTitle(),
        //         'penghasilan_wali' => $faker->randomNumber($nbDigits = NULL, $strict = false),

        //         // 'created_at' => now()->toDateTimeString(),
        //         // 'updated_at' => now()->toDateTimeString(),
        //     ];
        // }

        // $chunks = array_chunk($data, 10);
        // foreach ($chunks as $chunk) {
        //     Siswa::insert($chunk);
        // }
    }
}
