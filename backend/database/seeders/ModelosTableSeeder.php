<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modelos')->insert([
            //telefonos
            ['nombre_modelo' => 'iPhone 12', 'marca_id' => 1],
            ['nombre_modelo' => 'iPhone 14 SE', 'marca_id' => 1],

            ['nombre_modelo' => 'Galaxy S21', 'marca_id' => 2],
            ['nombre_modelo' => 'Galaxy A72', 'marca_id' => 2],

            ['nombre_modelo' => 'Mate 40 Pro', 'marca_id' => 3],
            ['nombre_modelo' => 'P50 Pro', 'marca_id' => 3],

            ['nombre_modelo' => 'Redmi 9', 'marca_id' => 4],
            ['nombre_modelo' => 'Moto G60', 'marca_id' => 4],

            //tablets
            ['nombre_modelo' => 'iPad Pro 11', 'marca_id' => 1],
            ['nombre_modelo' => 'iPad Air', 'marca_id' => 1],
            
            ['nombre_modelo' => 'Galaxy Tab A7', 'marca_id' => 2],
            ['nombre_modelo' => 'S8 Ultra', 'marca_id' => 2],

            ['nombre_modelo' => 'MatePad T10S', 'marca_id' => 3],
            ['nombre_modelo' => 'MatePad Pro 12', 'marca_id' => 3],

            ['nombre_modelo' => 'Pad 5', 'marca_id' => 4],
            ['nombre_modelo' => 'Redmi Pad', 'marca_id' => 4],

            //audifonos
            ['nombre_modelo' => 'AirPods 2da Generación', 'marca_id' => 1],
            ['nombre_modelo' => 'AirPods con Conector Lightning', 'marca_id' => 1],

            ['nombre_modelo' => 'Galaxy Buds2 Pro', 'marca_id' => 2],
            ['nombre_modelo' => 'EO-IC100 Con Conector Tipo C', 'marca_id' => 2],

            ['nombre_modelo' => 'FreeBuds Pro 2', 'marca_id' => 3],
            ['nombre_modelo' => 'FreeBuds 5', 'marca_id' => 3],

            ['nombre_modelo' => 'Redmi Buds 3', 'marca_id' => 4],
            ['nombre_modelo' => 'FlipBuds Pro', 'marca_id' => 4],
        ]);
    }
}
