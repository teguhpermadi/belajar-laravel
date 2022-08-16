<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $keyType = 'uuid';
    
    protected $fillable = [
        'nama',
        'tahun_id',
        'user_id',
        'level',
    ];

    public function walikelas()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function rombel()
    {
        return $this->hasMany(Rombel::class);
    }

    public function siswa()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function tes()
    {
        return $this->hasMany(Rombel::class, );
    }
}
