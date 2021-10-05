<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia_prima extends Model
{
    use HasFactory;
    protected $fillable = ['id_tipo'];
    //realacion de uno a muchos
    public function tipos(){
        return $this->belongsTo('App\Models\tipo_materia_primas','id_tipo');
    }

    public function facturaC(){
        return $this->hasMany('App\Models\facturaCompra');
    }


    public function hpFabricarProducto(){
        return $this->belongsToMany('App\Models\producto_a_fabricar');
    }
    
}

