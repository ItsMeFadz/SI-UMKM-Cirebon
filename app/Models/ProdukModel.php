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

}
