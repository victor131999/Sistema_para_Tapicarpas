<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    public function findByName($q) {
        return $this->model->where('name', 'like', "%$q%")
                           ->get();
    }

    public function facturaC(){
        return $this->hasMany('App\Models\facturaCompra');
    }

    public function produtoAFabricar(){
        return $this->hasMany('App\Models\producto_a_fabricar');
    }
}
