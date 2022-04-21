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
        'walikelas_id',
        'level',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'walikelas_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}
