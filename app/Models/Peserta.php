<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mahasiswa',
        'kode',
        'id_sesi'
    ];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'id_sesi');
    }
}
