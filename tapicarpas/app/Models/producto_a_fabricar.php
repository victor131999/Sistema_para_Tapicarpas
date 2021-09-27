<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_a_fabricar extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','fecha_inicio','fecha_fin','color','medida','material','id_categotia','id_responsable'];
    public function hpProductoFabricar(){
        return $this->hasMany('App\Models\hp_producto_fabricar');
    }

    public function categorias(){
        return $this->belongsTo('App\Models\categoria','id_categoria');
    }

    public function responsables(){
        return $this->belongsTo('App\Models\Responsable','id_responsable');
    }
}
