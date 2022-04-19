<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;
use Spatie\Permission\Traits\HasRoles;

class Siswa extends Model
{
    use HasFactory, HasRoles, Uuid;

    protected $guard_name = 'web';
    
    protected $fillable = [
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nik',
        'nisn',
        'asal_sekolah',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function provinsi()
    {
        return $this->belongsTo(Province::class);
    }
    public function kota()
    {
        return $this->belongsTo(City::class);

    }
    public function kecamatan()
    {
        return $this->belongsTo(District::class);

    }
    public function kelurahan()
    {
        return $this->belongsTo(Village::class);

    }
}
