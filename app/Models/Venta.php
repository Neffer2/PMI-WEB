<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';

    public function producto_inicial(){
        return $this->hasOne(Producto::class, 'id', 'interes_inicial');
    }

    public function producto_final(){
        return $this->hasOne(Producto::class, 'id', 'interes_final');
    }
}
