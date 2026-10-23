<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class CaraBayar extends Model
{
    protected $table = 'm_cara_bayar';

    protected $fillable = ['name', 'jenis', 'nomor_rekening', 'atas_nama', 'status'];
}