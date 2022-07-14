<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_a_fabricar extends Model
{
    use HasFactory;
    protected $fillable = ['id','fecha_inicio','fecha_fin','orden_trabajo_id','id_responsable','estado','cliente_id'];
    public function hpProductoFabricar(){
        return $this->belongsToMany('App\Models\materia_prima','hp_producto_fabricars')->withPivot('cantidad');;
    }

    public function sub_categorias(){
        return $this->belongsTo('App\Models\subcategoria_producto','id_s_categoria');
    }

    public function responsables(){
        return $this->belongsTo('App\Models\Responsable','id_responsable');
    }

    public function producto_finalizado(){
        return $this->hasOne('App\Models\producto_finalizado');
    }
    //relacion con orden de trabajo 1 a 1
    public function orden_de_trabajo() {
        return $this->belongsTo('App\Models\orden_trabajo','orden_trabajo_id');
      }
}
