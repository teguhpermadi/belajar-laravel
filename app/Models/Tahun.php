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

    public function kepalaSekolah()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
}
