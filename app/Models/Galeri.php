<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'description',
        'status',
    ];
}
