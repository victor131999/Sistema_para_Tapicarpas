<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material_reventa extends Model
{
    use HasFactory;

    public function facturaC(){
        return $this->hasMany('App\Models\facturaCompra');
    }
}
