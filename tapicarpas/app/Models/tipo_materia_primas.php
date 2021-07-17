<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_materia_primas extends Model
{
    use HasFactory;
    protected $fillable = ['id'];
        //realacion de uno a muchos(inversa)
        public function materia_prima(){
            return $this->hasMany('App\Models\materia_prima');
        }
}
