<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['nombre'];

    public function modelos(){
        return $this->hasMany(Modelo::class);
    }

    public function dispositivos(){
        return $this->hasMany(Dispositivo::class);
    }
}
