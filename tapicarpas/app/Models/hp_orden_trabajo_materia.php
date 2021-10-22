<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hp_orden_trabajo_materia extends Model
{
    use HasFactory;
    protected $fillable = ['id','cantidad','materia_prima_id','orden_trabajo_id'];
}
