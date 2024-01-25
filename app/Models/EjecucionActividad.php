<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjecucionActividad extends Model
{
    use HasFactory;
    protected $table = 'ejecuciones_actividad';

    public function abordaje(){
        return $this->hasOne(VentaAbordaje::class, 'ejecucion_id', 'id');
    }
}
