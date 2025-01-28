<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaImport implements ToModel
{
    protected $kode;
    protected $id_sesi;

    public function __construct($kode, $id_sesi)
    {
        $this->kode = $kode;
        $this->id_sesi = $id_sesi;
    }

    public function model(array $row)
    {
        // Gunakan upsert untuk melakukan create or update
        Peserta::updateOrCreate(
            [
                'id_mahasiswa' => $row[0],
                'kode' => $this->kode,
                'id_sesi' => $this->id_sesi,
            ]
        );
    }
}
