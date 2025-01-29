<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (Mahasiswa::where('nim', $row[0])->exists()) {
            return null; // Jangan impor jika NIM sudah ada
        }
        $i = rand(0, 11);


        return new Mahasiswa([
            'nim' => $row[0],
            'password' => Hash::make($row[0]),
            'foto' => 'img/avatars/' . $i . '.png'
        ]);
    }
}
