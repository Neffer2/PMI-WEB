<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCiudad extends Model
{
    use HasFactory;
    protected $table = 'productos_ciudad';

    public function producto(){
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
}
