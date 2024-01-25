<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifu extends Model
{
    use HasFactory;
    protected $table = 'gifus';

    public function producto(){
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
}
