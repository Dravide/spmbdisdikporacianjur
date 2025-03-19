<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'token',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getRole()
    {
        return self::select('role')->distinct()->get();
    }

    public function dataPendaftar()
    {
        return $this->hasOne(DataPendaftar::class, 'id_users', 'id');
    }

    public function sekolah()
    {
        return $this->hasOne(Sekolah::class, 'npsn', 'username');
    }

    public function hasAnyRole($roles): bool
    {
        return in_array($this->role, $roles);
    }

    public function verval()
    {
        return $this->hasOne(Verval::class,'id_pendaftar','username');
    }

}
