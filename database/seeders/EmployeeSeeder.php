<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'nama' => 'Muhammad Rievaldi Rendyansyah Putra',
            'nomorsurat' => '800/53/III/Labkes/2023',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
