<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hp_facturas_venta extends Model
{
    use HasFactory;
    protected $fillable = ['id','producto_finalizado_id','facturas_venta_id'];
}