<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table =  "roles_permisos";
    protected $primaryKey = "id";

    protected $fillable = ['usuario_id', 'rol_id', 'modulo_id', 'baja'];
}
