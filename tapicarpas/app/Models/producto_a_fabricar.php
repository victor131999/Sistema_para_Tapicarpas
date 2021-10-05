<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_a_fabricar extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','fecha_inicio','fecha_fin','color','medida','material','id_categoria','id_responsable'];
    public function hpProductoFabricar(){
        return $this->belongsToMany('App\Models\materia_prima','hp_producto_fabricars')->withPivot('cantidad');;
    }

    public function categorias(){
        return $this->belongsTo('App\Models\categoria','id_categoria');
    }

    public function responsables(){
        return $this->belongsTo('App\Models\Responsable','id_responsable');
    }
}
