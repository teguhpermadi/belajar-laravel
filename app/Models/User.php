<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use App\Traits\Uuid;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Uuid, HasRoles;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        // return 'https://picsum.photos/300/300';
        $url = Storage::url('uploads/avatars/' . $this->avatar);
        return $url;
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        // return 'profile/username';
        return 'profile';
    }

    public function IdentitasUser()
    {
        return $this->hasOne(IdentitasUser::class);
    }

    public function AlamatUser()
    {
        return $this->hasOne(AlamatUser::class);
    }

    public function NomorIdentitasUser()
    {
        return $this->hasOne(NomorIdentitasUser::class);
    }

    public function OrangtuaUser()
    {
        return $this->hasOne(OrangTuaUser::class);
    }
}
