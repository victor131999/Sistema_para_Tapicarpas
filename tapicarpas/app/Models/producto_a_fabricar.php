<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_a_fabricar extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','fecha_inicio','fecha_fin','color','medida','material','id_s_categoria','id_responsable','estado', 'total_pf',
    'subtotal_pf'];
    public function hpProductoFabricar(){
        return $this->belongsToMany('App\Models\materia_prima','hp_producto_fabricars')->withPivot('cantidad');;
    }

    public function sub_categorias(){
        return $this->belongsTo('App\Models\subcategoria_producto','id_s_categoria');
    }

    public function responsables(){
        return $this->belongsTo('App\Models\Responsable','id_responsable');
    }
}
