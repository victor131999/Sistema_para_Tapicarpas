<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_finalizado extends Model
{
    use HasFactory;
    protected $fillable = ['id','c_agua','c_luz','c_varios','c_admin','c_imprevistos','c_total','c_utilidad','c_iva','total','estado', 'id_orden','cliente_id'];
    public function mano_obra_has_producto_f(){
        return $this->belongsToMany('App\Models\mano_de_obra','mano_obra_has_producto_fs');
    }

    public function orden(){
        return $this->belongsTo('App\Models\producto_a_fabricar','id_orden');
    }
    public function cliente(){
        return $this->belongsTo('App\Models\cliente','cliente_id');
    }
    public function hp_producto_finalizado_materia(){
        return $this->belongsToMany('App\Models\materia_prima','hp_producto_finalizado_materias')->withPivot('cantidad');
    }


}
