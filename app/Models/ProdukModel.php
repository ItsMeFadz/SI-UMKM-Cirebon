<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_pengguna',
        'id_kategori',
        'id_satuan',
        'name',
        'stok',
        'harga',
        'deskripsi',
        'link',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'id_kategori');
    }
    public function satuan()
    {
        return $this->belongsTo(SatuanModel::class, 'id_satuan');
    }

    public function umkm()
    {
        return $this->belongsTo(UmkmModel::class, 'id_pengguna', 'id_pengguna');
    }


}
