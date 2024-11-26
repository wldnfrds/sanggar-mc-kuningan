<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan jika berbeda dengan nama model
    protected $table = 'articles';

    // Menentukan kolom yang bisa diisi secara massal
    protected $fillable = ['title', 'author', 'content', 'summary', 'img_url'];
}
