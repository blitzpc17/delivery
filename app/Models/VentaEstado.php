<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaEstado extends Model
{
    use HasFactory;

    protected $table =  "venta_estados";
    protected $primaryKey = "id";

    protected $fillable = ['nombre'];

}
