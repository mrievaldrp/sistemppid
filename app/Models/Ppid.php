<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ppid extends Model
{
    use HasFactory;
    protected $table = 'ppid';
    protected $guarded = [];

    public function rangkum()
    {
        $sql1 = ' select date_format( tgl_permintaan , "%Y-%m" ) as dekade, 
                count(*) as jumlah 
        from ppid group by dekade';
        $r = DB::select($sql1);
        $result = [];
        foreach($r as $b){
            $result['dekade'][] = $b->dekade;
            $result['jumlah'][] = $b->jumlah;
        }
        return $result;
    }
}

