<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employee([
            'nama' => $row[1], // Ganti '=' dengan '=>'
            'nomorsurat' => $row[2],
            'tanggalsurat' => $row[3],
            'tgl_kgt' => $row[4],
            'perihal' =>  $row[5],
            'jenis_layanan' => $row[6],
            // Sesuaikan indeks kolom
            // 'foto' => $row[4],        // Sesuaikan indeks kolom
        ]);
    }
}
