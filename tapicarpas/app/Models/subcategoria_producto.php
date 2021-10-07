<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategoria_producto extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','id_categoria'];

    public function categoria()
    {
        return $this->belongsTo('App\Models\categoria','id_categoria');
    }
    public function produtoAFabricar(){
        return $this->hasMany('App\Models\producto_a_fabricar');
    }

}
