<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
    //obtiene las bodegas para elegirlas en el combobox
    Route::get('/bodegas', [ApiController::class, 'getBodegas']);

    //obtener las marcas para elegirlas en el combobox
    Route::get('/marcas', [ApiController::class, 'getMarcas']);

    //obtiene los modelos de las marca elegida en el combobox
    Route::get('/marcas/{marca_id}/modelos', [ApiController::class, 'getModelosByMarca']);
    
    //obtiene los dispositivos con toda su información para ser filtrada en los combobox
    Route::get('/dispositivos', [ApiController::class, 'getDispositivos']);
    
    //obtener dispositivos por bodega elegida
    Route::get('/bodega/{bodega_id}/dispositivos', [ApiController::class, 'getDispositivosByBodega']);

    //filtrar por la marca elegida a los dispositivos
    Route::get('/marcas/{marca_id}/dispositivos', [ApiController::class, 'getDispositivosByMarca']);

    //obtiene los dispositivos que hay por modelo de una marca
    Route::get('/marcas/{marca_id}/modelos/{modelo_id}/dispositivos', [ApiController::class, 'getDispositivosByModeloDeMarca']);
