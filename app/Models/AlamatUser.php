<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class AlamatUser extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'user_id',
        'alamat',
        'kodepos',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'long',
        'lat',
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
