<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mano_obra_has_producto_f extends Model
{
    use HasFactory;
    protected $fillable = ['id','mano_obra_id','producto_finalizado_id'];
}
