<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class herramienta extends Model
{
    use HasFactory;
    protected $fillable = ['id','Nombre','marca','modelo','costo','id_area','id_clase','id_familia','codA','codC','codF','codI'];

    public function area()
    {
        return $this->belongsTo('App\Models\area','id_area');
    }

    public function clase()
    {
        return $this->belongsTo('App\Models\clase','id_clase');
    }

    public function familia()
    {
        return $this->belongsTo('App\Models\familia','id_familia');
    }

}
