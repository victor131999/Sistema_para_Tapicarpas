<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hp_producto_fabricar extends Model
{
    use HasFactory;
    protected $fillable = ['id','cantidad','id_materia_prima','id_producto_a_fabricar'];
    public function materiaPrima(){
        return $this->belongsTo('App\Models\materia_prima','id_materia_prima');
    }
    public function produtoAFafricar(){
        return $this->belongsTo('App\Models\producto_a_fabricar','id_producto_a_fabricar');
    }
}
