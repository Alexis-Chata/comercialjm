<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'referencia_interna',
        'codigo_barra',
        'precio_caja',
        'precio_display',
        'precio_unidad',
        'cantidad_en_caja',
    ];
}
