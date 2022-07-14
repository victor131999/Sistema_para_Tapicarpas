<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hp_producto_fabricar extends Model
{
    use HasFactory;
    protected $fillable = ['id','cantidad','materia_prima_id','producto_a_fabricar_id'];
}
