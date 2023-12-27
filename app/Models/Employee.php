<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $dates = 'tanggalsurat';
    protected $guarded = [];

    // protected $dates = ['created_at']; 


    public function rekap()
    {
        $sql = ' select date_format( tanggalsurat , "%m" ) as periode, 
                    count(*) as jml
            from employees
            group by periode';
        $r = DB::select($sql);
        $hasil = [];
        foreach($r as $b){
            $hasil['periode'][] = $b->periode;
            $hasil['jml'][] = $b->jml;
        }
        return $hasil;
    }
}
