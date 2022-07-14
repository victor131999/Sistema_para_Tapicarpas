<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class familia extends Model
{
    use HasFactory;
    public function herramientas(){
        return $this->hasMany('App\Models\herramienta');
    }
}
