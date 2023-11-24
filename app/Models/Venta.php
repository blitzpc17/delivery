<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table =  "ventas";
    protected $primaryKey = "id";

    protected $fillable = ['folio', 
                            'fecha_emision', 
                            'cliente_id', 
                            'proveedor_id', 
                            'estado_id' , 
                            'fecha_cancelacion', 
                            'usuario_cancelo_id', 
                            'fecha_entrega',
                            'punto_entrega'    
                        ];

}
