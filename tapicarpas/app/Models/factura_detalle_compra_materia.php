<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura_detalle_compra_materia extends Model
{

    use HasFactory;
    protected $fillable = ['id','cantidad_df','costoU_df','subtotal_df','id_fac','id_mp'];
    
}
