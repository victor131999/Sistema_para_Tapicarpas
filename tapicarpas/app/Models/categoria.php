<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    public function sub_categorias(){
        return $this->hasMany('App\Models\subcategoria_producto');
    }
    
    
}
