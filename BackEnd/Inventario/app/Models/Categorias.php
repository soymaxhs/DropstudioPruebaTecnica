<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    /**
     * Relationship
     */
    public function productos()
    {
        return $this->belongsToMany(Productos::class, 'productos__categorias')->get();
    }
}
