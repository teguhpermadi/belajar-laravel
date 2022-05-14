<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorIdentitasUser extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'user_id',
        'nik',
        'nkk',
        'nip',
        'niy',
        'nuptk',
        'nisn',
        'nis',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
