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

class Guru extends Model
{
    use HasFactory, HasRoles, Uuid;
    
    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $guard_name = 'web';
    
    protected $fillable = [
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nik',
        'nip',
        'niy',
        'status_pegawai',
        'ttd',
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

    public function kepala_sekolah()
    {
        return $this->hasMany(Tahun::class, 'kepala_sekolah');
    }
}
