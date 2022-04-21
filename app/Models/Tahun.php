<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    
    protected $fillable = [
        'tahun',
        'semester',
        'tanggal_awal',
        'tanggal_akhir',
        'kepala_sekolah',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'kepala_sekolah');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
}
