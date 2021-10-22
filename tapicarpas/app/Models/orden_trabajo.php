<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orden_trabajo extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','color','medida','material','id_s_categoria','id_responsable', 'total_pf',
    'subtotal_pf','c_agua','c_luz','c_varios','c_admin','c_imprevistos','c_total','c_utilidad','c_iva','total'];

    public function hp_orden_trabajo_materia(){
        return $this->belongsToMany('App\Models\materia_prima','hp_orden_trabajo_materias')->withPivot('cantidad');
    }

    public function sub_categorias(){
        return $this->belongsTo('App\Models\subcategoria_producto','id_s_categoria');
    }

    public function responsables(){
        return $this->belongsTo('App\Models\Responsable','id_responsable');
    }

    public function hp_orden_trabajo_mano(){
        return $this->belongsToMany('App\Models\mano_de_obra','hp_orden_trabajo_manos');
    }

}
