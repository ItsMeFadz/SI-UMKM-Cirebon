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
        'alamat',
        'nama_pemilik',
        'foto_profil_umkm',
        'link_wa',
        'link_marketplace',
        'link_gmaps'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }
    
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori', 'id_kategori');
    }

    public function kabupaten()
    {
        return $this->belongsTo(KabupatenModel::class, 'id_kabupaten', 'id_kabupaten');
    }

    public function kecamatan()
    {
        return $this->belongsTo(KecamatanModel::class, 'id_kecamatan', 'id_kecamatan');
    }

    public function produk()
    {
        return $this->hasMany(ProdukModel::class, 'id_pengguna', 'id_pengguna');
    }

}
