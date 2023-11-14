<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoEstado extends Model
{
    use HasFactory;

    protected $table =  "producto_estados";
    protected $primaryKey = "id";

    protected $fillable = ['nombre'];
}
