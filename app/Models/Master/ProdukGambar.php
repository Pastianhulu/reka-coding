<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class ProdukGambar extends Model
{
    protected $table = 'tbl_produk_gambar';

    protected $fillable = [
        'id_produk',
        'path',
        'urutan',
    ];
}