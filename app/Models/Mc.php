<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mc extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'kategori',
        'kota',
        'pengalaman',
        'media_sosial',
        'foto',
    ];
}
