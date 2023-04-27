<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modelo;
use App\Models\Bodega;
use App\Models\Dispositivo;

class DispositivosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelos = Modelo::all();
        $bodega = Bodega::all();
        $disp_por_modelo = 3;
        $lastId = Dispositivo::max('id') ?? 0;

        foreach ($modelos as $modelo){
            for ($i=1; $i <= $disp_por_modelo; $i++){
                $dispositivo = new Dispositivo([
                    'id' => $lastId + $i,
                    'nombre' => $modelo->marca->nombre . ' ' . $modelo->nombre_modelo . ' - N°' . $i,
                    'modelo_id' => $modelo->id,
                    'marca_id' => $modelo->marca->id,
                    'bodega_id' => $bodega->random()->id
                ]);

                $dispositivo->save();
            }
            $lastId += $disp_por_modelo;
        }
    }
}
