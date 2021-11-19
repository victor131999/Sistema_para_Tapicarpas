<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hp_producto_finalizado_materia extends Model
{
    use HasFactory;
    protected $fillable = ['id','cantidad','materia_prima_id','producto_finalizado_id'];
    public function productoFinalizado()
    {
        return $this->hasOne(producto_finalizado::class,'id','producto_finalizado_id');
    }
    public function materiaPrima()
    {
        return $this->hasOne(materia_prima::class,'id','materia_prima_id');
    }
}
