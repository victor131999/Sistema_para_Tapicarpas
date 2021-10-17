<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mano_de_obra extends Model
{
    use HasFactory;

    public function mano_obra_has_producto_f(){
        return $this->belongsToMany('App\Models\producto_finalizado');
    }
}
