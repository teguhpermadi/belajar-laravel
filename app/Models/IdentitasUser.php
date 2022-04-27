<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasUser extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'user_id',
        'fullname',
        'nickname',
        'avatar',
        'phone',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'ttd,'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
