<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_materia_primas extends Model
{
    use HasFactory;

        //realacion de uno a muchos(inversa)
        public function tipos(){
            return $this->belongsTo('App\Models\materia_prima');
        }
}
