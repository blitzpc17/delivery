<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table =  "proveedores";
    protected $primaryKey = "id";

    protected $fillable = ['razon_social', 'slogan', 'logo', 'direccion', 'telefono', 'horario', 'baja', 'representante_id'];

}
