<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory, Uuid;
    
    protected $fillable = [
        'tahun',
        'semester',
        'tanggal_awal',
        'tanggal_akhir',
        'kepala_sekolah',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
