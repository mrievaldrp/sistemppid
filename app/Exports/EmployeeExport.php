<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::select('id', 'nama', 'nomorsurat', 'tanggalsurat', 'tgl_kgt', 'perihal', 'jenis_layanan') // Add other columns you want to include
            ->get();
    }
}
