<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturaCompra extends Model
{
    use HasFactory;
    protected $fillable = ['id','bienes_servicios_sinIva_fac','bienes_conIva_fac','servicios_conIva_fac','subtotal_fac','total_fac','descripcion_fac','id_resp','id_prov'];
    public function responsable(){
        return $this->belongsTo('App\Models\Responsable','id_resp');
    }
    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor','id_prov');
    }
    public function detail(){
        return $this->hasMany('App\Models\factura_detalle_compra_materia');
    }
}
