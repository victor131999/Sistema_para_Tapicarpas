<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturaCompra extends Model
{
    use HasFactory;
    protected $fillable = ['id_resp','id_prov'];
    public function responsable(){
        return $this->belongsTo('App\Models\Responsable','id_resp');
    }
    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor','id_prov');
    }
}
