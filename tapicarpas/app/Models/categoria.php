<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    public function produtoAFabricar(){
        return $this->hasMany('App\Models\producto_a_fabricar');
    }
}
