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

    protected $table = "users";
    protected $primaryKey = "nrp";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nrp',
        'username',
        'password',
        'role_id',
        'nama',
        'email',
        'fakultas_id',
        'program_studi_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
//    protected $casts = [
//        'password' => 'hashed',
//    ];

    public function isAdmin() {
        return $this->role_id === 1;
    }

    public function isFakultas() {
        return $this->role_id === 2;
    }
    public function isProdi()
    {
        return $this->role_id === 3;
    }

    public function isUser()
    {
        return $this->role_id === 4;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'program_studi_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
