<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaPartida extends Model
{
    use HasFactory;

    protected $table =  "ventas_partidas";
    protected $primaryKey = "id";

    protected $fillable = [
                            'venta_id', 
                            'proveedor_id', 
                            'producto_id', 
                            'precio_venta', 
                            'cantidad' , 
                            'baja',     
                        ];
}
