<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenModel extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';
    protected $primaryKey = 'id_kabupaten';

    protected $fillable = [
        'nama_kabupaten',
    ];
}
