<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodegaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        for ($i = 1; $i <= 3; $i++){
            DB::table('bodegas')->insert(
                ['id' => $i, 'nombre' => 'Bodega '.$i]
            );
        }
    }
}
