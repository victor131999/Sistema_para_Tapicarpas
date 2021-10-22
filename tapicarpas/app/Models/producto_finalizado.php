<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto_finalizado extends Model
{
    use HasFactory;
    protected $fillable = ['id','c_agua','c_luz','c_varios','c_admin','c_imprevistos','c_total','c_utilidad','c_iva','total', 'id_orden'];
    public function mano_obra_has_producto_f(){
        return $this->belongsToMany('App\Models\mano_de_obra','mano_obra_has_producto_fs');
    }

    public function orden(){
        return $this->belongsTo('App\Models\producto_a_fabricar');
    }
}
