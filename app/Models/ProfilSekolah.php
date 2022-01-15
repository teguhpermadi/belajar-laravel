<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'npsn',
        'alamat',
        'provinsi',
        'distrik',
        'kecamatan',
        'kelurahan',
        'kodepos',
        'telp',
        'email',
        'website',
    ];
}
