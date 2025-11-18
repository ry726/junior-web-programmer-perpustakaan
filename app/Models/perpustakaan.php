<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_buku',
        'nama_buku',
        'ketersediaan',
        'author',
        'genre_buku',
    ];
}