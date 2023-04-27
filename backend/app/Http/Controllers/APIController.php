<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bodega;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Dispositivo;

class APIController extends Controller
{
    public function getDispositivos(){
        $dispositivos = Dispositivo::all();

        if ($dispositivos != null){
            $dispositivos->load('modelo.marca', 'bodega');
            return response()->json($dispositivos);
        } else {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
    }


    public function getBodegas(){
        $bodegas = Bodega::all();

        return response()->json($bodegas);
    }

    public function getDispositivosByBodega($bodega_id){
        $bodega = Bodega::findOrFail($bodega_id);
        $disp = $bodega->dispositivos;

        $disp->load('modelo.marca', 'bodega');
        return response()->json($disp);
    }


    public function getMarcas(){
        $marcas = Marca::all();
        return response()->json($marcas);
    }

    public function getDispositivosByMarca($marca_id){
        $dispositivos = Dispositivo::where('marca_id', $marca_id)->get();

        return response()->json($dispositivos);
    }


    public function getModelosByMarca($marca_id){
        $marca = Marca::findOrFail($marca_id);
        $modelos = $marca->modelos;

        $modelos->load('marca');
        return response()->json($modelos);
    }

    public function getDispositivosByModeloDeMarca($marca_id, $modelo_id){
        $dispositivos = Dispositivo::where('modelo_id', $modelo_id)->where('marca_id', $marca_id)->get();
        $dispositivos->load('modelo.marca', 'bodega');
        return response()->json($dispositivos);
    }
}
