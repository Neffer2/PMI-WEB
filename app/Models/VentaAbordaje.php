<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaAbordaje extends Model
{
    use HasFactory;
    protected $table = 'ventas_abordaje';

    public function ventas(){
        return $this->hasMany(Venta::class, 'ventas_abordaje_id', 'id');
    }

    public function gifus(){
        return $this->hasMany(Gifu::class, 'ventas_abordaje_id', 'id');
    }
}
 