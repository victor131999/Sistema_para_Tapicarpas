<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturas_venta extends Model
{
    use HasFactory;
    protected $fillable = ['id','total_fv','cliente_id'];
    public function cliente(){
        return $this->belongsTo('App\Models\cliente','cliente_id');
    }
    public function hp_facturas(){
        return $this->belongsToMany('App\Models\producto_finalizado','hp_facturas_ventas');
    }
}
