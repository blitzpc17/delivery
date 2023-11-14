<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $table =  "productos";
    protected $primaryKey = "id";

    protected $fillable = ['clave', 'nombre', 'descripcion', 'precio', 'estado_id', 'producto_categorias_id', 'imagen', 'stock', 'proveedor_id'];
}
