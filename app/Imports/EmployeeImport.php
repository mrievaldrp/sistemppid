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
            'jeniskelamin' => $row[2], // Sesuaikan indeks kolom
            'notelpon' => $row[3],    // Sesuaikan indeks kolom
            'foto' => $row[4],        // Sesuaikan indeks kolom
        ]);
    }
}
