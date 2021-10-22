<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hp_orden_trabajo_mano extends Model
{
    use HasFactory;
    protected $fillable = ['id','mano_obra_id'];
}
