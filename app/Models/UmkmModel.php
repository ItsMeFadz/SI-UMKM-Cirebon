<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmModel extends Model
{
    use HasFactory;
    protected $table = 'kelola_umkm';
    protected $primaryKey = 'id_umkm';

    protected $fillable = [
        'id_pengguna',
        'id_kategori',
        'id_kabupaten',
        'id_kecamatan',
        'nama_umkm',
        'deskripsi',
        'nama_pemilik',
        'foto_profil_umkm',
        'link_wa',
        'link_marketplace',
        'link_gmpas'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_pengguna', 'id');
    }
}
