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
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_umkm',
        'name',
        'email', 
        'role', // 0 == admin, 1 == penjual
        'password', 
        'disetujui', // 0 == tidak disetujui, 1 == disetujui 
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
        static::creating(function ($user) {
            $user->password = Hash::make($user->password); // Hash password sebelum disimpan
        });

        static::created(function ($user) {
            DB::transaction(function () use ($user) {
                $umkm = UmkmModel::create([
                    'nama_umkm' => $user->name . ' UMKM',
                    'nama_pemilik' => $user->name,
                    'id_pengguna' => $user->id
                ]);
                $user->update(['id_umkm' => $umkm->id_umkm]);
            });
        });

        static::deleting(function ($user) {
            // Hapus UMKM yang terkait
            if ($user->umkm) {
                $user->umkm->delete();
            }
        });
    }

    public function umkm()
    {
        return $this->hasOne(UmkmModel::class, 'id_pengguna', 'id');
    }

}
