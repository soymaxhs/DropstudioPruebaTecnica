<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    /**
     * Relationship
     */
    public function categorias()
    {
        return $this->belongsToMany(Categorias::class, 'productos__categorias')->get();
    }

    public function productosCategorias()
    {
        return $this->hasMany(Productos_Categorias::class);
    }
}
