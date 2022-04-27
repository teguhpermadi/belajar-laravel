<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTuaUser extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'user_id',
        'nik_ayah',
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nik_ibu',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nik_wali',
        'nama_wali',
        'pekerjaan_wali',
        'penghasilan_wali',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
