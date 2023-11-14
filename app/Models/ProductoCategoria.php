<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCategoria extends Model
{
    use HasFactory;

    protected $table =  "producto_categorias";
    protected $primaryKey = "id";

    protected $fillable = ['nombre'];

}
