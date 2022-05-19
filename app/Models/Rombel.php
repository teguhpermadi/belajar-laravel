<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'user_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function identitasUser()
    {
        return $this->belongsTo(IdentitasUser::class, 'user_id', 'user_id');
    }

    public function jenis_kelamin()
    {
        return $this->hasMany(IdentitasUser::class, 'user_id', 'user_id')->count('jenis_kelamin', 'l');
    }
}
