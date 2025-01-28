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

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
    /*************  ✨ Codeium Command ⭐  *************/
    /**
     * The sesi that this peserta belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
/******  f8e08fec-fe80-4016-86af-eec06cfc5ef9  *******/
    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'id_sesi');
    }
}
