<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
