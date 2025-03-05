<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\UmkmModel;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_umkm',
        'name',
        'email',
        'role',
        'password',
        'disetujui',
    ];

    protected $appends = ['kelola_umkm'];

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
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            // Create UMKM entry within a database transaction
            DB::transaction(function () use ($user) {
                // Create UMKM entry directly after user creation
                $umkm = UmkmModel::create([
                    'nama_umkm' => $user->name . ' UMKM',
                    'nama_pemilik' => $user->name,
                    'id_pengguna' => $user->id
                ]);

                // Update user with the UMKM ID
                $user->update(['id_umkm' => $umkm->id_umkm]);
            });
        });
    }

    public function umkm()
    {
        return $this->hasOne(UmkmModel::class, 'id_pengguna', 'id');
    }

}
