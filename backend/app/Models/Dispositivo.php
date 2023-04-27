<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $fillable = ['nombre', 'marca_id', 'modelo_id', 'bodega_id'];

    public $timestamps = false;

    public function bodega(){
        return $this->belongsTo(Bodega::class);
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class);
    }
}
