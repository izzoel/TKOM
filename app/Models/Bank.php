<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'banks';

    protected $fillable = [
        'nomor',
        'soal',
        'pilihan',
        'jawaban',
        'gambar',
        'teks_gambar'
    ];
}
