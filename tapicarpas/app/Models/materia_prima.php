<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materia_prima extends Model
{
    use HasFactory;
    //realacion de uno a muchos
    public function tipos(){
        return $this->hasMany('App\Models\tipo_materia_primas');
    }
}

