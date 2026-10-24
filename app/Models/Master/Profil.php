<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'm_profil';

    protected $fillable = [
        'website',
        'developer',
        'email',
        'whatsapp',
        'alamat',
        'instagram',
        'youtube',
        'tiktok',
        'facebook',
    ];
}